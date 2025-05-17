<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinalisModel extends Model
{
     use HasFactory;

    protected $table = 'event_kandidat';
    protected $primaryKey = 'id_kandidat';

    protected $fillable = [
        'no_kandidat',
        'nama_kandidat',
        'foto_kandidat',
        'deskripsi_kandidat',
        'biografi_kandidat',
        'event_id',
    ];

    /**
     * Relasi ke model Event
     */
    public function event()
    {
        return $this->belongsTo(EventacaraModel::class, 'event_id', 'id_event');
    }

    
}
