<?php

use App\Http\Livewire\EcueManagerComponent;
use App\Http\Livewire\EtudiantManagerComponent;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\MentionManagerComponent;
use App\Http\Livewire\NiveauManagerComponent;
use App\Http\Livewire\ParcourManagerComponent;
use App\Http\Livewire\SemestreManagerComponent;
use App\Http\Livewire\SpecialiteManagerComponent;

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

Route::get('etudiants/', EtudiantManagerComponent::class)->name("etudiants");
/*
Route::get('/etudiants/{id}', function($id){
    return view('pages.etudiants', ["id" => $id]);
})->name('etudiants');
*/

Route::get('/ecues/{id}', EcueManagerComponent::class)->name('ecues');

Route::get('/specialites', SpecialiteManagerComponent::class)->name('specialites');


Route::get('/parcours/{annee_id}', ParcourManagerComponent::class)->name('parcours');



Route::get('/niveaux', NiveauManagerComponent::class)->name('niveaux');

Route::get('/semestres', SemestreManagerComponent::class)->name('semestres');