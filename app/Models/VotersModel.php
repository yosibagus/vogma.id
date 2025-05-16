<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VotersModel extends Model
{
    use HasFactory;

    protected $table = 'event_votes';
    protected $primaryKey = 'id_vote';
    public $timestamps = false;

    protected $fillable = [
        'token_vote',
        'kandidat_id',
        'event_id',
        'kuantitas_vote',
        'total_harga_vote',
        'nama_voters',
        'nohp_voters',
        'snap_token',
        'metode_pembayaran',
        'status_pembayaran',
        'pesan_voters'
    ];

    public function event()
    {
        return $this->belongsTo(EventacaraModel::class, 'event_id', 'id_event');
    }

    public function kandidat()
    {
        return $this->belongsTo(FinalisModel::class, 'kandidat_id', 'id_kandidat');
    }
}
