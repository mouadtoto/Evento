<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OrganizerController;
use App\Http\Controllers\ParticipantController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [HomeController::class , 'reroute'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/ticket', function(){

    return view('ticket');
});
Route::middleware('auth')->group(function () {
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
});


Route::middleware('auth' , 'organizer')->group( function(){
    Route::get('/organizer', [OrganizerController::class, 'index'])->name('organizer.dash');
    Route::post('/event/store', [EventController::class, 'storeEvent'])->name('event.store');
    Route::get('/delete/event/{id}', [EventController::class, 'destroy'])->name('event.destroy');
    Route::post('/organizer/image', [OrganizerController::class, 'storeOrganizer'])->name('organizer.store');
    Route::put('/event/update' , [EventController::class , 'update'])->name('event.update');
});


Route::middleware('auth' , 'participant')->group( function(){
    Route::get('/participant/dash', [ParticipantController::class, 'index'])->name('participant.dash');
    Route::post('/participant/image', [ParticipantController::class, 'storeParticipant'])->name('participant.store');
    Route::get('/participant/reserve/{id}', [EventController::class, 'Reserve'])->name('reserve.event');
    Route::get('/participant/event/{id}', [EventController::class, 'consultEvent'])->name('participant.event');
    Route::get('/participant/ticket/{id}', [ParticipantController::class, 'getTicket'])->name('get.ticket');
});


Route::middleware('auth' , 'Admin')->group( function(){
    Route::get('/admin' , [AdminController::class , 'index'])->name('admin');
    Route::get('/admin/stats' , [AdminController::class , 'stats']);
    Route::post('/admin/category' , [AdminController::class , 'storeCategory'])->name('category.store');
    Route::delete('/category/delete' , [AdminController::class , 'destroy'])->name('category.destroy');
    Route::post('/category/update' , [AdminController::class , 'update'])->name('category.update');
    Route::get('/user/restrict/{id}' , [AdminController::class , 'restrictUser'])->name('user.restrict');
    Route::get('/event/approve/{id}' , [EventController::class , 'approveEvent'])->name('event.approve');
    Route::get('/event/dissaprove/{id}' , [EventController::class , 'dissaproveEvent'])->name('event.dissaprove');
    Route::get('/user/unrestrict/{id}' , [AdminController::class , 'unrestrictUser'])->name('user.unrestrict');
});
require __DIR__.'/auth.php';
