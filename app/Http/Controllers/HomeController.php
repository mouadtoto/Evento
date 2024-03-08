<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function reroute(){
        if(auth()->user()->id){
            $role = auth()->user()->role ; 
           switch ($role) {
            case 'participant':
                return to_route('participant.dash');
                break;
            case 'organizer':
                return to_route('organizer.dash');
                break;
            case 'Admin':
                return to_route('admin');
                break;
            default:
                return view('welcome');
                break;
           }
        }
    }
}
