<?php

namespace App\model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Poli extends Model
{
    protected $table = 'poli';
    public $timestamps = true;

    protected $fillable = [
        'kd_poli',
        'nm_poli'
    ];

}
