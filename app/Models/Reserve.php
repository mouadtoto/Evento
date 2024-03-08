<?php

namespace App\Models;

use App\Models\Event;
use App\Models\Participant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reserve extends Model
{
    use HasFactory;
    protected $fillable = [
        'participant_id' , 
        'event_id',
        'status'
    ];
    public function participant(){
        return  $this->belongsTo(Participant::class , 'participant_id');
    }
    public function event(){
        return  $this->belongsTo(Event::class , 'event_id');
    }
}
