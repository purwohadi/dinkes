<?php

namespace App\model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Registrasi extends Model
{
    protected $table = 'registrasi';
    public $timestamps = true;

    protected $fillable = [
        'no_rawat',
        'tgl_regis',
        'no_rkm_medis',
        'kd_dokter',
        'kd_poli',
        'jenis_bayar'
    ];
}
