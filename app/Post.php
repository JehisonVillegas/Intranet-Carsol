<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Post extends Model
{
    protected $fillable = [
        'user_id', 'category_id', 'name', 'slug', 'excerpt', 'body', 'status', 'file'
    ];

    use SoftDeletes;

   protected $dates=['deleted_at'];

   protected $table ='posts';

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
