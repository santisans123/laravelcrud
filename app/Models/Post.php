<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'kategori', 'content', 'ket', 'foto'
    ];
}
class Gambar extends Model
{
    protected $table = "gambar";

    protected $fillable = ['file','keterangan'];
}
