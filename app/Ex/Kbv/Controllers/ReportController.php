<?php namespace App\Ex\Kbv\Controllers;
use App\Ex\Kbv\Controllers\KbvController;

use App\Basic\Sys\Domain;
use App\Seed\Member;

use App\Ex\Kbv\Model\KbvMission;
use App\Ex\Kbv\Model\KbvLotteries;
use App\Ex\Kbv\Model\KbvRelease;
use App\Ex\Kbv\Model\KbvLucky;
use App\Basic\Sys\City;
use App\Basic\Media;
use App\Ex\Kbv\Helper;

use Illuminate\Http\Request;
use Session;
use Validator;
use DB;
use PHPExcel;
use PHPExcel_IOFactory;
class ReportController extends KbvController
{
    function index(){
      if( !$this->access())
          return redirect('/');

      $cities = City::where('country','VN')->get();

      $search = $this->se();

      $query  = $this->query( $search );

      $total  = KbvRelease::total();//KbvRelease::total();

      $query  = $query->paginate(6);

      $rows   = $query->map(function($r){
            $mem         = Member::find($r->mem_id);
            $p           = KbvMission::Where('product_id',$r->product_id)->first();
            $r->name     = $mem->name;
            $r->code     = $mem->code;
            $r->city     = City::find($mem->area);
            $r->product  = $p ? $p->product_name : '';
            $r->point    = $p ? $p->points:'';
            return $r;
        });


      return view('ex.kbv.report',compact('query','rows','search','cities','total'));
    }

    function detail( $id )
    {
        if( !$this->access())
          return redirect('/');

    }

    function search(Request $req){
        session(['search_report'  =>  [
          'name'      =>  $req->name,
          'city'      =>  $req->city,
          'number'    =>  $req->number,
          'product'   =>  $req->product,
          'seri_no'  =>   $req->seri_no,
        ]
      ]);

      return redirect()->back();
    }

    function action(Request $req){
        $this->back($req->release_id);
        return redirect()->back();
    }

    function import(){
      return view('ex.kbv.csv');
    }

    function export(){
        $query  = $this->query($this->se());
        $rows   = $query->get()->map(function($r){
               $mem         = Member::find($r->mem_id);
               $p           = KbvMission::Where('product_id',$r->product_id)->first();
               $r->name     = $mem->name;
               $r->code     = $mem->code;

               $city        = City::find($mem->area);

               $r->city     = $city ? $city->name :'';

               $r->product  = $p ? $p->product_name : '';
               $r->point    = $p ? $p->points:'';
               return $r;
        });

        $excel = new PHPExcel();
        //Chọn trang cần ghi (là số từ 0->n)
        $excel->setActiveSheetIndex(0);

        //Tạo tiêu đề cho trang. (có thể không cần)
        $excel->getActiveSheet()->setTitle('Báo cáo');

        $cols = [
          'A1'  =>  'Thành viên',
          'B1'  =>  'Số điện thoại',
          'C1'  =>  'Khu vực',
          'D1'  =>  'Sản phẩm',
          'E1'  =>  'Seri No',
          'F1'  =>  'Điểm',
        ];

        foreach ( $cols as $key => $value) {
            $excel->getActiveSheet()->setCellValue($key, $value);
        }
        $excel->getActiveSheet()->getStyle('A1:F1')->getFont()->setBold(true);

        $numRow = 2;
        foreach ($rows as $row) {
              $excel->getActiveSheet()->setCellValue('A' . $numRow, $row->name);
              $excel->getActiveSheet()->setCellValue('B' . $numRow, $row->code);
              $excel->getActiveSheet()->setCellValue('C' . $numRow, $row->city);
              $excel->getActiveSheet()->setCellValue('D' . $numRow, $row->product);
              $excel->getActiveSheet()->setCellValue('E' . $numRow, $row->seri_no);
              $excel->getActiveSheet()->setCellValue('F' . $numRow, $row->point);
              $numRow++;
        }
        header('Content-type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename="report.xls"');
        PHPExcel_IOFactory::createWriter($excel, 'Excel2007')->save('php://output');
        session([
          'message'  => 'Xuất dữ liệu thành công',
          'flag'     => 'susscess',
          ]
        );
    }
    function csv( Request $req ){
        if($req->hasFile('file')){
            $src  = $req->file;
            $release = array();
            $file = fopen( $src,"r" );
            while(!feof($file)){
              $s  = fgetcsv($file)[0];
              $r  = KbvRelease::where('seri_no',$s)->first();
              if(isset($r)){
                $miss = KbvMission::where('product_id',$r->product_id)->first();
                $mem  = Member::find($r->mem_id);

                $release[]   = (object) [
                    'release'  => $r->id,
                    'seri'     => $s,
                    'product'  => $miss->product_name,
                    'name'     => $mem->name,
                    'number'   => $mem->code,
                    'points'   => $miss->points,
                ];
              }
            }
          fclose($file);
          return view('ex.kbv.csv',compact('release'));
        }
    }
    function change( Request $req ){
        $release  =  $req->release;
        foreach ($release as $re) {
            $this->back($re);
        }
        return redirect(url('report'))
        ->with(['flag'=>'success','message'=>'Đổi trả thành công']);
    }


    function back($id){

      $release  = KbvRelease::find($id);

      if(!$release) return;

      $mem      = Member::find($release->mem_id);
      $mission  = KbvMission::where('product_id',$release->product_id)->first();

      $release->delete();
      $mess = 'Đổi trả SN: #'.$release->seri_no;
      $mem->withdraw($mission->points,$mess);

      Helper::push($mem->phone, [
                           "en" =>$mess,
                           "vi" =>$mess
                        ]);
    }

    /******No load data*************/

    function query($search){

        $query  = KbvRelease::orderby('created_at','desc');

        if($search['product']){
              $word  =  $search['product'];
              $terms = explode(" ",$word);

              $query = $query->whereIn('product_id', function($q) use ( $search,$terms){
                  $q  = $q->select('product_id')->from('kbv_missions')
                        ->where('product_name',$search['product'])
                        ->orWhere(function ($query) use ($terms) {
                          foreach ($terms as $term) {
                            $query->where('product_name', 'like', '%' . $term . '%');
                          }
                      });
              });
        }

        if($search['seri_no'])
            $query  =  $query->where('seri_no',$search['seri_no']);

        if($search['name'] || $search['city'] || $search['number']){
            $query = $query->whereIn('mem_id', function($q) use ( $search ){
                $q  =  $q->select('id')->from('members');

                if($search['name'])
                  $q  =  $q->where('name','like','%' .$search['name']. '%');
                if($search['city'])
                  $q  =  $q->where('area',$search['city']);
                if($search['number'])
                  $q  =  $q->where('code','like','%'. $search['number'] .'%');
            });
        }

        return $query;
    }

    function se(){
        $search = ["name"=>'',"city" => '',"number"=>'',"product"=>'',"seri_no"=>''];
        $s      = session('search_report');
        if( $s ){
            foreach ($s as $key => $value) {
                if($value)
                  $search[$key] = $value;
            }
        }
        return $search;
    }
}
