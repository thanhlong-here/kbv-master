<?php
namespace App\Models\Basic\Sys;

use App\Models\Basic\Sys\Access;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Domain extends Model
{
    protected $table = 'domains';
    public $timestamps  = false;
    protected $fillable = ['name','secret','user_id'];


    public static function exits( $domain )
    {
        $dm = Domain::where('name', $domain )->first();
        return $dm ? true : false;
    }
    public static  function accesss()
    {
        return $this->hasMany('App\Models\Basic\Sys\Access')->get();
    }
    public function user()
    {
        return $this->belongsTo('App\Models\Basic\Sys\User')->first();
    }

}
