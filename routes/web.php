<?php

use App\Http\Controllers\LeadController;
use Illuminate\Support\Facades\Route;

use App\Http\Middleware\SelectBusiness;
use  App\Livewire\Business\Roles;
use  App\Livewire\Business\Invite;
;


Route::get('/', function () {
    return view('welcome');
});

Route::resource('/plan', \App\Http\Controllers\PlanController::class);


Route::view('contact', 'contact')->name('contact');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    SelectBusiness::class

])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');

    })->name('dashboard');

    Route::get('/roles', Roles::class)->name('business.roles');
    Route::get('/invites', Invite::class)->name('business.invites');
    /*Leads Route**/
    Route::resource('leads', LeadController::class);

});

//@livewire('business.invite')
