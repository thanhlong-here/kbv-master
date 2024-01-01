<?php
namespace App\Basic;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cell extends Model
{
    public $is;
    use SoftDeletes;
}
