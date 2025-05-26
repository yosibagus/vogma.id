<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\participation;
use Illuminate\Support\Facades\DB;

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

    public function kandidat()
    {
        return $this->hasMany(FinalisModel::class, 'event_id', 'id_event');
    }

    public static function getDataEvent()
    {
        $data = DB::table('event')
            ->join('penyelenggara', 'event.penyelenggara_id', 'penyelenggara.id_penyelenggara');
        return $data;
    }
}
