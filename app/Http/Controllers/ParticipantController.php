<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Participant;
use Illuminate\Http\Request;

class ParticipantController extends Controller
{
    public function storeParticipant(Request $r){
        
        $image = $r->image;
        $extenstion = $image->getClientOriginalExtension();
        $filename = time().'.'.$extenstion;
        $image->move('images/', $filename);
        $user_id = auth()->user()->id;
        Participant::create(
            [
                'user_id' => $user_id ,
                'image' => $filename
            ]
        );  
        User::where('id', $user_id)->update(['confirmed' => 1]);
        return to_route('organizer.dash');
    }
}
