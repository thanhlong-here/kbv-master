<?php
namespace App\Models\Issuer;
use App\Models\Issuer\Issuer;
use App\Models\Issuer\Genitive;

class Card extends Genitive
{
    protected $table = "cards";
    //protected $fillable = ['issuer_id','code','name','parent','status'];

    public static function default( $iss_id ){
        $iss  = Issuer::find($iss_id);
        if($iss->id){
            $card   = Card::where('issuer_id',$iss->id)
                      ->where('parent',0)->first();

            if($card) return $card;
            $card = new Card;

            $card->issuer_id  = $iss->id;
            $card->title      = $iss->title;
            $card->code       = 'newbie';
            $card->parent     = 0;
            $card->status     = 'active';
            $card->save();

            return $card;
        }
    }
}
