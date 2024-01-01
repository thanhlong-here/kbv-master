<?php
namespace App\Ex\Kbv\Model;

use Illuminate\Database\Eloquent\Model;
use App\Ex\Kbv\Helper;


use DB;

class KbvSetting extends Model{
    protected $table = "kbv_setting";

    public static function byCode( $code ){
        return KbvSetting::where('code', $code)->first();

    }

    public static function upsave($key,$name,$value){
        if(is_null($value)) return;

        $item = KbvSetting::byCode($key);

        if(empty($item)){
            $item       = new KbvSetting;
            $item->code = $key;
            $item->name = $name;
        }
        $item->content  = $value;

        $item->save();

    }
}
