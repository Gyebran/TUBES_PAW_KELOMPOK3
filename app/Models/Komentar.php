<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    use HasFactory;

     protected $table = 'komentar';

    protected $fillable = [
        'user_id',
        'karya_id',
        'content',
    ];
}
