<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
    //
     protected $fillable = [
        'name', 'user_id', 'category_id','file'
    ];
}
