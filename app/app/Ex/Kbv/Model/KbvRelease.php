<?php
namespace App\Ex\Kbv\Model;

use Illuminate\Database\Eloquent\Model;
use App\Ex\Kbv\Helper;
use DB;

class KbvRelease extends Model{
    protected $table = "kbv_release";

    public static function total(){

        $select="SELECT sum( points ) as ps
        FROM kbv_release,kbv_missions
        where kbv_release.product_id	=	kbv_missions.product_id";

        return DB::select(DB::raw($select))[0]->ps;
    }
}
