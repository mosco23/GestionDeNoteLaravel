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

Route::get('/ues/{id}', function($id){
    return view('pages.ues', ["id" => $id]);
})->name('ues');

Route::get('/noters/{id}', function($id){
    return view('pages.noters', ["id" => $id]);
})->name('noters');


Route::get('/etudiants/{id}', function($id){
    return view('pages.etudiants', ["id" => $id]);
})->name('etudiants');


Route::get('/ecues/{id}', function($id){
    return view('pages.ecues', ["id" => $id]);
})->name('ecues');

Route::get('/specialites', function(){
    return view('pages.specialites');
})->name('specialites');


Route::get('/parcours/{id}', function($id){
    return view('pages.parcours', ['id' => $id]);
})->name('parcours');



Route::get('/niveaux', function(){
    return view('pages.niveaux');
})->name('niveaux');

Route::get('/semestres', function(){
    return view('pages.semestres');
})->name('semestres');