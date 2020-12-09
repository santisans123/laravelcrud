<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function addData($data){
        Post::table('posts')->insert($data);
    }
    use HasFactory;
    protected $fillable = [
        'title', 'kategori', 'content', 'ket', 'foto'
    ];

}

