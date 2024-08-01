<?php
use  App\Http\Models\Auto;
use  App\Http\Models\Klijent;
use App\Http\Controllers\AutoController;
use App\Http\Controllers\KlijentController;
use App\Http\Controllers\RentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/auto',[AutoController::class, 'index'])->name('auto.index');
Route::get('/show/{id}',[AutoController::class, 'show'])->name('auto.show');
Route::get('/delete/{id}',[AutoController::class, 'delete1'])->name('auto.delete');
Route::post ('/create',[AutoController::class, 'create'])->name('auto.create');
Route::post ('/update/{id}',[AutoController::class, 'update'])->name('auto.update');
Route::get('/form', function () {
return view('auto_create'); })->name('auto.form');

Route::get('/clients',[KlijentController::class, 'index'])->name('client.index');
Route::post ('/newclient',[KlijentController::class, 'create'])->name('client.newcreate');
Route::get ('/editclient/{id}',[KlijentController::class, 'edit'])->name('client.edit');
Route::post ('/updclient/{id}',[KlijentController::class, 'update'])->name('client.update');
Route::get('/delclient/{id}',[KlijentController::class, 'destroy'])->name('client.delete');
Route::get('/showclients/{id}',[KlijentController::class, 'show'])->name('client.show');
Route::get('/clientform', function () {
return view('client_create'); })->name('client.create');
Route::get('/clientedit/{id}', function () {
return view('client_edit'); })->name('client.editv');
 
Route::get('/rents',[RentController::class, 'index'])->name('rent.index');
Route::get('/rshow/{id}',[RentController::class, 'show'])->name('rent.show');
Route::post('/rcreate',[RentController::class, 'create'])->name('rent.create');
Route::get('/rnew',[RentController::class, 'new'])->name('rent.new');
Route::get('/redit/{id}',[RentController::class, 'edit'])->name('rent.edit');
Route::post('/update/{id}',[RentController::class, 'update'])->name('rent.update');
Route::get('/rdelete/{id}',[RentController::class, 'destroy'])->name('rent.delete');

require __DIR__.'/auth.php';
