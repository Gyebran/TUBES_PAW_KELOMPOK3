<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Komentar extends Model
{
    use HasFactory;

    protected $table = 'komentar';

    protected $fillable = ['user_id', 'karya_id', 'content'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function karya()
    {
        return $this->belongsTo(Karya::class);
    }
}
