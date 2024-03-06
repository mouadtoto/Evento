<?php

namespace App\Http\Controllers;

use App\Models\Organizer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrganizerController extends Controller
{
    public function storeOrganizer(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'logo' => 'required|file',
        ]);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        $validated = $validator->validated();   
        $logo = $request->logo;
        $extenstion = $logo->getClientOriginalExtension();
        $filename = time().'.'.$extenstion;
        $logo->move('images/', $filename);
        $user_id = auth()->user()->id;
        Organizer::create(
            [
                'user_id' => $user_id ,
                'logo' => $filename
            ]
        );  
        User::where('id', $user_id)->update(['confirmed' => 1]);
        return to_route('profile.edit.organizer');
    }
    
}
