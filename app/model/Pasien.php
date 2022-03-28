<?php

namespace App\model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    protected $table = 'pasien';
    public $timestamps = true;

    protected $casts = [
        'jk' => 'enum'
    ];

    protected $fillable = [
        'no_rkm_medis',
        'nm_pasien',
        'jk',
        'alamat',
        'tempat_lahir',
        'tgl_lahir'
    ];
}
