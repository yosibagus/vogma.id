<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VotersDetailModel extends Model
{
    use HasFactory;

    protected $table = "event_votes_detail";
    protected $guarded = [];
}
