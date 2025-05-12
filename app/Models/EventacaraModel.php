<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventacaraModel extends Model
{
      use HasFactory;

    protected $table = 'event';
    protected $primaryKey = 'id_event';

    protected $fillable = [
        'url_event',
        'nama_event',
        'tgl_start_event',
        'tgl_end_event',
        'lokasi_event',
        'harga_event',
        'deskripsi_event',
        'benner_event',
        'max_vote',
        'penyelenggara_id',
    ];

   
    public function penyelenggara()
    {
        return $this->belongsTo(PenyelenggaraModel::class, 'penyelenggara_id', 'id_penyelenggara');
    }
}
