<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailIku extends Model
{
    use HasFactory;

    protected $table = 'detail_iku';

    public function iku()
    {
        return $this->belongsTo(Iku::class, 'id_iku', 'id');
    }

    public function pengukuran()
    {
        return $this->hasMany(Pengukuran::class);
    }
}