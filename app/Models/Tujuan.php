<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tujuan extends Model
{
    use HasFactory;
    protected $table = 'tujuan';
    protected $fillable = ['isi_tujuan'];

    public function sasaran()
    {
        return $this->hasMany(Sasaran::class);
    }
}