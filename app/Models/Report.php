<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $primaryKey = 'report_id';
    protected $fillable = [
        'reporter_id',
        'karya_id',
        'alasan',
        'status',
        'handled_by',
    ];

    public function karya() {
        return $this->belongsTo(Karya::class, 'karya_id');
    }

    public function reporter() {
        return $this->belongsTo(User::class, 'reporter_id');
    }

    public function handler() {
        return $this->belongsTo(User::class, 'handled_by');
    }

}
