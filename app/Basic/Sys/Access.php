<?php
namespace App\Basic\Sys;

use Illuminate\Database\Eloquent\Model;

class Access extends Model
{
    protected $table = 'accesss';
    public $timestamps  = false;

    public function domain()
    {
        return $this->belongsTo('App\Basic\Sys\Domain')->first();
    }
    public function user()
    {
        return $this->belongsTo('App\Basic\Sys\User')->first();
    }
}
