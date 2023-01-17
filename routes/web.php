<?php

use App\Http\Controllers\ProfileController;
use Hamcrest\Number\OrderingComparison;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name(
        'profile.edit'
    );
    Route::patch('/profile', [ProfileController::class, 'update'])->name(
        'profile.update'
    );
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name(
        'profile.destroy'
    );
});

Route::get('/dashboard', function () {
    return view('dashboard');
})
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('community', [
    App\Http\Controllers\CommunityLinkController::class,
    'index',
]);
Route::post('community', [
    App\Http\Controllers\CommunityLinkController::class,
    'store',
]);

Route::get('/prueba/{num?}', function ($num = null) {
    return "hello prueba $num";
});
Route::get('/prueba/{num?}', function ($num = '8') {
    return "hello prueba $num";
});

Route::post('/pruebaPost', function () {
    return 'Prueba por POST';
});

Route::controller(OrderController::class)->group(function () {
    Route::get('/controller/{name?}', function ($name) {
        return "hola $name desde GET";
    });
    Route::post('/controller', function ($name = 'juan') {
        return "hola $name desde POST";
    });
});

Route::get('/numero/{num?}', function ($num = '8') {
    return "$num es un numero";
})->whereNumber('num');

Route::get('/{name?}/{num?}', function ($name,$num ) {
    return "hello $name $num";
})
    ->whereAlpha('name')
    ->whereNumber('num');

require __DIR__ . '/auth.php';