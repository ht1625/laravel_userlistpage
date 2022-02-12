<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class users extends Model
{
    use HasFactory;
    use Sortable;
    public $timestamps=false;


    protected $fillable = [ 'first_name', 'id' ];


	public $sortable = ['id', 'first_name', 'last_name', 'birth_place', 'birth_date'];
}
