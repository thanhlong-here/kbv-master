<?php namespace App\Ex\Kbv\Controllers;
use App\Ex\Kbv\Controllers\KbvController;

use App\Basic\Sys\Domain;
use App\Basic\Sys\City;
use App\Seed\Member;

use App\Ex\Kbv\Model\KbvMission;
use App\Ex\Kbv\Model\KbvLucky;
use App\Ex\Kbv\Model\KbvLotteries;

use App\Basic\Media;

use Illuminate\Http\Request;
use Session;
use Validator;
use DB;
use Carbon\Carbon;
use PHPExcel;
use PHPExcel_IOFactory;

class LottController extends KbvController
{

    public function index(){
        if( !$this->access())
          return redirect('/');


        $cities = City::where('country','VN')->get();

        $search = $this->se();

        $query  = $this->query($search);

        $query  = $query->paginate(6);

        $luckies  = $query->map(function($lu){

          $mem         = Member::find($lu->member_id);
          $lottery     = KbvLotteries::find($lu->lottery_id);

          if(!$lottery) return;

          $lu->name    = $mem->name;
          $lu->phone   = $mem->code;
          $lu->points  = $mem->redeempoint;
          $lu->area    = City::find($mem->area)['name'];

          $lu->title   = $lottery->title;
          $lu->end     = date('Y-m-d',strtotime($lottery->end_at));
          $lu->status  = $lottery->status;

          $end =  date('Y-m-d',strtotime($lottery->end_at));
          $today = Carbon::today();
          if( $end <$today || $lottery->result ) {
              $lu->status   = 'close';
          }
          return $lu;
        });
      return view('ex.kbv.lott',compact('luckies','search','query','cities'));
    }
    //POST
    function search(Request $req){

      session(['search_lott'  =>  [
        'name'      =>  $req->name,
        'area'      =>  $req->area,
        'number'    =>  $req->number,
        'title'     =>  $req->title,
        'lucky'     =>  $req->lucky,
      ]]);

      return redirect()->back();
    }

    function export(){
      $query  = $this->query($this->se());

      $rows   = $query->get()->map(function($lu){
          $mem         = Member::find($lu->member_id);
          $lottery     = KbvLotteries::find($lu->lottery_id);

          if(!$lottery) return;

          $lu->name    = $mem->name;
          $lu->phone   = $mem->code;
          $lu->points  = $mem->redeempoint;
          $lu->area    = City::find($mem->area)['name'];

          $lu->title   = $lottery->title;
          $lu->end     = date('Y-m-d',strtotime($lottery->end_at));
          $lu->status  = $lottery->status;

          $end =  date('Y-m-d',strtotime($lottery->end_at));
          $today = Carbon::today();
          if( $end <$today || $lottery->result ) {
              $lu->status   = 'close';
          }
          return $lu;
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
        'D1'  =>  'Chiến dịch',
        'E1'  =>  'Ngày xổ',
        'F1'  =>  'Số may mắn',
        'G1'  =>  'Điểm khả dụng',
      ];

      foreach ( $cols as $key => $value) {
          $excel->getActiveSheet()->setCellValue($key, $value);
      }
      $excel->getActiveSheet()->getStyle('A1:G1')->getFont()->setBold(true);

      $numRow = 2;
      foreach ($rows as $row) {
            $excel->getActiveSheet()->setCellValue('A' . $numRow, $row->name);
            $excel->getActiveSheet()->setCellValue('B' . $numRow, $row->phone);
            $excel->getActiveSheet()->setCellValue('C' . $numRow, $row->area);
            $excel->getActiveSheet()->setCellValue('D' . $numRow, $row->title);
            $excel->getActiveSheet()->setCellValue('E' . $numRow, $row->end);
            $excel->getActiveSheet()->setCellValue('F' . $numRow, $row->number);
            $excel->getActiveSheet()->setCellValue('G' . $numRow, $row->points);
            $numRow++;
      }
      header('Content-type: application/vnd.ms-excel');
      header('Content-Disposition: attachment; filename="lott.xls"');
      PHPExcel_IOFactory::createWriter($excel, 'Excel2007')->save('php://output');
      session([
        'message'  => 'Xuất dữ liệu thành công',
        'flag'     => 'susscess',
        ]
      );
    }
    /***********No load***************/

    function query($search){
      $query  = KbvLucky::orderby('created_at','desc');

      if($search['title']){
          $query = $query->whereIn('lottery_id', function($q) use ( $search ){
              $q  =  $q->select('id')->from('kbv_lotteries');
              if($search['title'])
                $q  =  $q->where('title','like','%' .$search['name']. '%');
          });
      }
      if($search['name'] || $search['area'] || $search['number']){
          $query = $query->whereIn('member_id', function($q) use ( $search ){
              $q  =  $q->select('id')->from('members');
              if($search['name'])
                $q  =  $q->where('name','like','%' .$search['name']. '%');
              if($search['area'])
                $q  =  $q->where('area',$search['area']);
              if($search['number'])
                $q  =  $q->where('code','like','%'. $search['number'] .'%');
          });
      }

      if($search['lucky'])
          $query  =  $query->where('number',$search['lucky']);

      return $query;
    }

    function se(){
      $search = ["name"=>'',"area" => '',"number"=>'',"title"=>'',"lucky"=>''];
      $s      = session('search_lott');

      if( $s ){
          foreach ($s as $key => $value) {
              $search[$key] = $s[$key];
          }
      }
      return $search;
    }
}
