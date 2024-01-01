<?php
namespace App\Models\Basic;

use App\Models\Basic\Simple;

use Illuminate\Support\Facades\DB;

class Post extends Simple
{
    protected $table = "Posts";
    protected $fillable = ['title', 'content', 'user_id','media_id'];
    
    public function media()
    {
        return  $this->belongsTo('App\Basic\Media')->first();
    }
}
