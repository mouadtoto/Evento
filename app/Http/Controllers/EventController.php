<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use App\Models\Reserve;
use App\Models\Organizer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventController extends Controller
{   
    
   public function storeEvent(Request $r){
    $organizer = Organizer::where('user_id', auth()->user()->id)->first();
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
    if (request()->hasFile('image')) {
        $image = request()->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);
    } else {
        $imageName = 'service.png';
    }
    $auto = (int)$r->reservation;
    Event::create(
        [
            'title' => $r->title ,
            'description' => $r->description,
            'image' => $imageName,
            'location' => $r->location,
            'capacity' => $r->capacity,
            'date' => $r->date,
            'category_id' => $r->Category,
            'organizer_id'=> $organizer->id,
            'auto' =>  $r->reservation , 
            
        ]
    );  
    return to_route('organizer.dash');
   }

  public function destroy($id){
    $event = Event::find($id);
    $event->delete();
    return to_route('organizer.dash');
  }

  public function update(Request $r){

    Event::where('id',$r->editid)->update([
        'title' => $r->edittitle ,
        'description' => $r->editdescription,
        'location' => $r->editlocation,
        'capacity' => $r->editcapacity,
        'date' => $r->editdate,
    ]);
    return to_route('organizer.dash');
  }

  public function consultEvent($id){
    $event = Event::where('id' , $id)->first();
    $check = Reserve::where('participant_id' , auth()->user()->id)->where('event_id' , $event->id)
    ->first();
    $isresreved = 0 ;
    if($check){
      $isresreved = 1 ;
    } 
    return view('event' , ['event'=>$event, 'isresreved'=>$isresreved]);
  }

  public function Reserve($id){
    $event = Event::find($id);
    $status = 'pending';
    if($event->auto == 1){
      $status = 'reserved';
    }
    Reserve::create([
      'participant_id' => auth()->user()->id , 
      'event_id' => $id , 
      'status' => $status,
    ]);
    return to_route('participant.dash');
  }
  public function approveEvent($id){
    Event::where('id' , $id)->update([
      'isReviewed' => 1 ,
    ]);
    return to_route('admin');
  }
  public function dissaproveEvent($id){
    Event::where('id' , $id)->update([
      'isReviewed' => 0 ,
    ]);
    return to_route('admin');
  }
}
