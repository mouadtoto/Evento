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
        'image'=> 'required|file',
        'location'=> 'required|string',
        'capacity'=> 'required',
        'date'=>'required|date',
        'Category'=> 'required|string',
    ]);
    if ($validator->fails()) {
        return back()
            ->withErrors($validator)
            ->withInput();
    }
    $validated = $validator->validated();   
    $Image = $r->Image;
    $extenstion = $Image->getClientOriginalExtension();
    $filename = time().'.'.$extenstion;
    $Image->move('images/', $filename);
    $user_id = auth()->user()->id;
    Event::create(
        [
            'title' => $r->title ,
            'description' => $r->description,
            'Image' => $filename,
            'Location' => $r->Location,
            'capacity' => $r->capacity,
            'date' => $r->date,
            'Category' => $r->Category,
            'organizer_id'=> auth()->user()->id
        ]
    );  
    return to_route('event.store');
   }
  
}
