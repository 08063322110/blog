<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;





class Post extends Model
{
    use HasFactory, SoftDeletes;
    
    public function category()
    {
    return $this->belongsTo(Category::class);
    }

    protected $fillable = ['title', 'content', 'category_id'];

    // public function category()
    // {
    //     return $this->belongsTo(Category::class);
    // }
}
