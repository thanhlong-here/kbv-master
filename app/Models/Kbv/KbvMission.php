<?php
namespace App\Models\Kbv;

use Illuminate\Database\Eloquent\Model;
use App\Helper;


use DB;

class KbvMission extends Model{
    protected $table = "kbv_missions";

    protected static $limit = 6;
    protected static $begin = '2019-03-01';

    public static function find_id( $product_id ){
      return KbvMission::where('product_id', $product_id )->first();
    }
    public static function missions($search = null){
        return  array_map(function($p){
            $m   = KbvMission::find_id($p->oid);
            $p->points = $m ? $m->points : 0;
            return $p;
        }, KbvMission::query( $search ));
    }

    public static function serialsBy($id){
      /*
        $select  = " select * FROM SERIAL_NO
        Where product_id ='".$id."' ";
      */
        $select  = " select s.*
        FROM

        SERIAL_NO s, WS_ReceiptDetailNormal_Serial rds,
        WS_Receipt r, WS_ReceiptDetailNormal rd

        Where

        s.product_id ='".$id."'
        and s.Oid = rds.SERIAL_NO
        and rds.WS_ReceiptDetailNormal = rd.Oid
        and rd.WS_RECEIPT = r.Oid
        and r.ISSUE_DATE  > '" .KbvMission::$begin. "'
        and left(r.CODE,2)='BH' ";
        return Helper::DB()->select(DB::raw($select));
    }

    public static function redeem( $code ){
        $select  = " select top 1 s.*
        FROM

        SERIAL_NO s, WS_ReceiptDetailNormal_Serial rds,
        WS_Receipt r, WS_ReceiptDetailNormal rd

        Where

        s.SERIAL_NO ='".$code."'
        and s.Oid = rds.SERIAL_NO
        and rds.WS_ReceiptDetailNormal = rd.Oid
        and rd.WS_RECEIPT = r.Oid
        and r.ISSUE_DATE  > '" .KbvMission::$begin. "'
        and left(r.CODE,2)='BH' ";


        $p  = Helper::DB()->select(DB::raw($select));
        return $p ? $p[0] : null;

    }

    public static function productBy($id){
        try {
          $select = "select * FROM PRODUCT Where Oid = '".$id."'";
          $p  = Helper::DB()->select(DB::raw($select));
          return $p[0];
        } catch (Exception $e) {

              return null;
        }
    }

    static function ids_str($arr,&$bg,$i = 0 ){
        if($i == count($arr)) return;

        if($i)  $bg .= ',';
          $bg .= "'".$arr[$i]['product_id']."'";
        $i++;
        KbvMission::ids_str($arr,$bg,$i);
    }

    static function query( $search = null ){
        $status = "'deactive' as status";
        $arr    = KbvMission::all('product_id')->toArray();
        $active = '';
        KbvMission::ids_str( $arr, $active);

        $select = "select top ".KbvMission::$limit."
        oid,product_code,product_name,barcode,".$status."
        FROM PRODUCT WHERE oid NOT IN (".$active.") ";

        if($search['name'] || $search['code'] ){

              $select .=" And ";
              if($search['name'])
                $select.=" product_name like '%".$search['name']."%'";
              if($search['code']){
                if($search['name']) $select.=" And";
                $select.=" product_code like '%".$search['code']."%'";
              }
        }

        return Helper::DB()->select(DB::raw($select));
    }

    static function ser(){
      $select  = " Select top 1 * FROM SERIAL_NO  ";

      return Helper::DB()->select(DB::raw($select));

    }
}
