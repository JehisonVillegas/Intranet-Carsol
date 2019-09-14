<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Category extends Model
{


	use SoftDeletes;

protected $table ='categories';
    protected $fillable = [
        'name', 'slug', 'body'
    ];
protected $dates=['deleted_at'];


    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
