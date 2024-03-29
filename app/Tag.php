<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model

{

	use SoftDeletes;

	protected $table = 'tags';

    protected $fillable = [
        'name', 'slug'
    ];

   protected $dates=['deleted_at'];
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
