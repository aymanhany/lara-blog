<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // declaring massAssignble fields
    protected $fillable = [
        'title',
        'body',
    ];

    // Making relation between post and comments ( one to many )
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
