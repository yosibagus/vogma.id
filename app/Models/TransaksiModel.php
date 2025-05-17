<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiModel extends Model
{
   protected $table = 'event_votes_detail'; // ganti sesuai nama tabel jika berbeda
    protected $primaryKey = 'id_detail';
    public $timestamps = true;

    protected $fillable = [
        'token_vote', 'event_id', 'nama_voters', 'nohp_voters', 'email_voters',
        'total_harga', 'biaya_layanan', 'total_pembayaran', 'snap_token',
        'metode_pembayaran', 'kode_pembayaran', 'kardaluarsa_pembayaran',
        'status_pembayaran'
    ];

    public function event()
    {
        return $this->belongsTo(EventacaraModel::class, 'event_id');
    }
}
