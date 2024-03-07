<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use App\Models\Category;
use App\Models\Participant;
use Illuminate\Http\Request;

class ParticipantController extends Controller
{
    public function index(){
        $categories = Category::get();
        $events = Event::paginate(3);
        return view('dashboard' , ['categories'=> $categories, 'events'=>$events]);
    }
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
        return to_route('participant.dash');
    }
}
