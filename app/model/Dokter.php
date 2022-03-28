<?php

namespace App\model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    protected $table = 'dokter';
    public $timestamps = true;

    protected $fillable = [
        'kd_dokter',
        'nm_dokter'
    ];

}
