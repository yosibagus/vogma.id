<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

    public static function getDataVotes($orderId)
    {
        $data = DB::table('event_votes')
            ->join('event_kandidat', 'event_votes.kandidat_id', 'event_kandidat.id_kandidat')->where('token_vote', $orderId);
        return $data;
    }
}
