<?php

use App\Http\Controllers\LeadController;
use Illuminate\Support\Facades\Route;

use App\Http\Middleware\SelectBusiness;


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

    /*Leads Route**/
    Route::resource('leads', LeadController::class);

});
