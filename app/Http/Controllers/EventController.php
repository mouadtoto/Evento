<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Organizer;
use App\Models\User;
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
    $data = Event::where('id' , $id)->first();
    return view('event' , ['data'=>$data]);
  }
}
