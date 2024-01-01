<?php
namespace App;

use App\Basic\Post;
use App\Issuer\Card;
use App\Issuer\Location;

class Issuer extends Post
{
    protected $table = "issuers";

    protected $fillable = [
      'title', 'content', 'user_id','media_id',
      'address','email','website','phone','status'];

    public $EnumTypes =[ 'free','premium' ];

    public function start()
    {
        if( !$this->id ) return;
        $this->card();
        $this->location();
    }

    public static function findBy( $uId ){
        return Issuer::where('user_id',$uId);
    }

    function card(){
        $card         = new Card;
        $card->name   = 'Basic';
        $card->code   = 'basic';
        $card->parent = 0;
        $card->status = 'active';
        $card->save();
    }

    function location(){
        $loca           = new Location;
        $loca->name     = 'Official';
        $loca->code     = 'official';
        $loca->address  = $this->address ;
        $loca->status   = 'active';
        $loca->save();
    }
}
