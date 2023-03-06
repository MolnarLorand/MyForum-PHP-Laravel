<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public function post()//col name post_id based on the function name
    {
        return $this->belongsTo(Post::class);
    }

    public function author() //if the name and the class is not the same always add the column
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
