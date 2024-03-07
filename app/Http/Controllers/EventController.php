<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{   
   public function storeEvent(Request $r){
       $validator = Validator::make($r->all(), [
           'title' => 'required|string',
           'description'=> 'required|string',
            'location'=> 'required|string',
           'capacity'=> 'required',
           'date'=>'required',
        ]);
    if ($validator->fails()) {
        return back()
            ->withErrors($validator)
            ->withInput();
    }
    $validated = $validator->validated();   
    $image = $r->image;
    $extenstion = $image->getClientOriginalExtension();
    $filename = time().'.'.$image;
    $image->move('images/', $filename);
    $user_id = auth()->user()->id;
    $auto = $r->has('automatic_res') ? 1 : 0 ;
    Event::create(
        [
            'title' => $r->title ,
            'description' => $r->description,
            'image' => $filename,
            'location' => $r->location,
            'capacity' => $r->capacity,
            'date' => $r->date,
            'category_id' => $r->Category,
            'organizer_id'=> auth()->user()->id,
            'auto' =>  $auto
            
        ]
    );  
    return to_route('event.store');
   }
  
}
