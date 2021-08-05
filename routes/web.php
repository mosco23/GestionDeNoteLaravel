<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\MentionManagerComponent;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('pages.annees');
})->name('home');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});


Route::get('/mentions', function(){
    return view('pages.mentions');
})->name('mentions');


Route::get('/specialites', function(){
    return view('pages.specialites');
})->name('specialites');


Route::get('/parcours', function(){
    return view('pages.parcours');
})->name('parcours');



Route::get('/niveaux', function(){
    return view('pages.niveaux');
})->name('niveaux');