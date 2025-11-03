<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Livewire\News\Index as NewsIndex;
use App\Livewire\News\Show as NewsShow;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::view('/', 'landing')->name('landing');

Route::get('/updates', NewsIndex::class)->name('news.index');
Route::get('/updates/{news:slug}', NewsShow::class)->name('news.show');

Route::middleware(['auth','verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::view('/', 'admin.dashboard')->name('dashboard');            // ringkasan
    Route::view('/messages', 'admin.messages')->name('messages');      // inbox
    Route::get('/messages/{contact}', \App\Http\Controllers\Admin\ContactShowController::class)
        ->name('messages.show');                                       // detail
    Route::get('/export/contacts', \App\Http\Controllers\Admin\ExportContactsController::class)
        ->name('export.contacts');                                     // export CSV
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';
