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
                return view('dashboard');
                break;
            case 'organizer':
                return view('organizer');
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
