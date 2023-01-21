<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InputIku extends Model
{
    use HasFactory;

    protected $table = 'input_iku';

    public function iku()
    {
        return $this->belongsTo(Iku::class);
    }

}