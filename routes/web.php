<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\DashboardBookController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardInquiryController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\MagazineController;
use App\Http\Controllers\PaperController;
use App\Http\Controllers\TextbookController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function () {
    Route::get('/contact',[InquiryController::class, 'create']);
    Route::post('/contact',[InquiryController::class, 'store']);
    Route::resource('/books', BookController::class);
    Route::get('/books/{book}/read', [BookController::class, 'read']);
});

Route::get('/checkSlug', [DashboardBookController::class, 'checkSlug'])->name('checkslug');

Route::prefix('dashboard')->name('dashboard')->middleware('can:admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index']);
    Route::name('.')->group(function () {
        Route::resource('/books', DashboardBookController::class);
        Route::resource('/inquiries', DashboardInquiryController::class)->only(['index', 'show']);
        Route::resource('/magazine', MagazineController::class)->only(['store', 'update', 'destroy'])->parameters([
            'magazine' => 'book'
        ]);
        Route::resource('/paper', PaperController::class)->only(['store', 'update', 'destroy'])->parameters([
            'paper' => 'book'
        ]);
        Route::resource('/textbook', TextbookController::class)->only(['store', 'update', 'destroy'])->parameters([
            'textbook' => 'book'
        ]);
    });
});