<?php
namespace App\Models\Issuer;
use App\Models\Issuer\Promotional;
use App\Models\Issuer\PromotionPoint;
use App\Models\Issuer\Genitive;
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
