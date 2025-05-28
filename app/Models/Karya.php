<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Karya extends Model
{
    // use HasFactory;

    // protected $fillable = [
    //     'judul', // sesuaikan ini dengan kolom yang ada di tabel 'karyas'
    //     'deskripsi',
    //     'user_id', // jika ada relasi ke user
    //     // tambahkan kolom lain jika ada
    // ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }


    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }
}
