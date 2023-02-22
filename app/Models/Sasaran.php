<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sasaran extends Model
{
    use HasFactory;
    protected $table = 'sasaran';
    protected $fillable = ['id_tujuan', 'isi_sasaran', 'periode'];


    public function tujuan()
    {
        return $this->belongsTo(Tujuan::class, 'id_tujuan', 'id');
    }

    public function iku()
    {
        return $this->hasMany(Iku::class);
    }
}