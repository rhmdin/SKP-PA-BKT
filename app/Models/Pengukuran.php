<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengukuran extends Model
{
    use HasFactory;
    protected $table = 'pengukuran';

    protected $fillable = ['id_detail', 'bulan', 'input_satu', 'input_dua', 'sumber_data', 'realisasi', 'capaian'];

    public function detailIku()
    {
        return $this->belongsTo(DetailIku::class, 'id_detail', 'id');
    }
    
}
