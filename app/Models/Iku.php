<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Iku extends Model
{
    use HasFactory;

    protected $table = 'iku';

    public function sasaran()
    {
        return $this->belongsTo(Sasaran::class, 'id_sasaran', 'id');
    }

    public function detailIku()
    {
        return $this->hasMany(DetailIku::class, 'id_iku', 'id');
    }
}