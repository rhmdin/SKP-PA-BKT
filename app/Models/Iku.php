<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Iku extends Model
{
    use HasFactory;

    protected $table = 'iku';
    protected $fillable = ['id_sasaran', 'jenis', 'isi_iku', 'penanggung_jawab', 'target', 'sumber_data']
;

    public function sasaran()
    {
        return $this->belongsTo(Sasaran::class, 'id_sasaran', 'id');
    }

    public function detailIku()
    {
        return $this->hasMany(DetailIku::class, 'id_iku', 'id');
    }

    public function inputIku()
    {
        return $this->hasMany(InputIku::class, 'id_iku', 'id');
    }
}
