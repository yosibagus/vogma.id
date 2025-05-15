<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenyelenggaraModel extends Model
{
     protected $table = 'penyelenggara';
    protected $primaryKey = 'id_penyelenggara';

    protected $fillable = [
        'nama_penyelenggara',
        'logo_penyelenggara',
        'alamat_penyelenggara',
        'nohp_penyelenggara',
        'email_penyelenggara',
        'dokumen_ktp',
        'dokumen_npwp',
    ];
}
