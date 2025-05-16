<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenyelenggaraModel extends Model
{
    //  protected $table = 'penyelenggara';
    // protected $primaryKey = 'id_penyelenggara';

    // protected $fillable = [
    //     'nama_penyelenggara',
    //     'logo_penyelenggara',
    //     'alamat_penyelenggara',
    //     'nohp_penyelenggara',
    //     'email_penyelenggara',
    //     'dokumen_ktp',
    //     'dokumen_npwp',
    // ];

    protected $table = 'penyelenggara';
    protected $primaryKey = 'id_penyelenggara';
    // public $incrementing = true; // atau false jika bukan auto-increment
    // protected $keyType = 'int'; // atau 'string' kalau pakai NIK/UUID

    protected $fillable = [
        'nama_penyelenggara',
        'logo_penyelenggara',
        'alamat_penyelenggara',
        'nohp_penyelenggara',
        'email_penyelenggara',
        'dokumen_ktp',
        'dokumen_npwp',
        'id_penyelenggara',
    ];
}
