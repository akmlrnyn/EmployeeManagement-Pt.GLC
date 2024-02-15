<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PotonganBonus extends Model
{
    use HasFactory;

    protected $fillable = [
        'bonus_overtime', 'potongan_terlambat'
    ];
}
