<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Comment extends Model
{
    // declaring massAssignble fields
    protected $fillable = ['content', 'user_id', 'post_id', 'user_name'];
}
