<?php
namespace App\Issuer;
use App\Issuer\Promotional;
use App\Issuer\PromotionPoint;
use App\Issuer\Genitive;
use DB;

class Redeem extends Promotional{

    public static function newfresh(...$pa){
        DB::beginTransaction();
        $p  = parent::newfresh($pa[0],$pa[1]);
        if( $p->id ){
          $po  = new PromotionPoint();
          $po->promotion_id  = $p->id;
          $po->type          = 'redeem';
          $po->issuer_id     = $p->issuer_id;
          $po->point         = $pa[2];
          $po->save();
          DB::commit();
          return $p;
        }
        else{
            DB::rollBack();
        }
    }
}
