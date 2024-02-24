<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // protected $guarded = ['id'];
    protected $fillable = ['title', 'excerpt', 'body'];

    // default for every POST query performed
    protected $with = ['category', 'author'];

    // alternative which removes necessity of :slug in routes
    
    // public function getRouteKeyName() {
    //     return 'slug';
    // }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function author() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
