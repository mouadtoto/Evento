<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
    use HasFactory;
    protected $fillable = [
        'status'
    ];
    public function participant(){
        return  $this->belongsTo(User::class , 'participant_id');
    }
    public function event(){
        return  $this->belongsTo(Event::class , 'event_id');
    }
}
