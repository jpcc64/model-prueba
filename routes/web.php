<?php

use App\Http\Controllers\ProfileController;
use Hamcrest\Number\OrderingComparison;
use Illuminate\Support\Facades\Route;
use PHPUnit\TextUI\XmlConfiguration\Variable;

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

// Route::get('/prueba/{num?}', function ($num = null) {
//     return "hello prueba $num";
// });
// Route::get('/prueba/{num?}', function ($num = '8') {
//     return "hello prueba $num";
// });

// Route::post('/pruebaPost', function () {
//     return 'Prueba por POST';
// });

// Route::controller(OrderController::class)->group(function () {
//     Route::get('/controller/{name?}', function ($name) {
//         return "hola $name desde GET";
//     });
//     Route::post('/controller', function ($name = 'juan') {
//         return "hola $name desde POST";
//     });
// });

// Route::get('/numero/{num?}', function ($num = '8') {
//     return "$num es un numero";
// })->whereNumber('num');

// Route::get('/{name?}/{num?}', function ($name,$num ) {
//     return "hello $name $num";
// })
//     ->whereAlpha('name')
//     ->whereNumber('num');

Route::get('/host', function () {
    $env = env('DB_HOST');
    return "La ip del host es $env";
});

Route::get('/timezone', function () {
    $conf = config('app.timezone', 'Europe/Madrid');
    return "La timezone es $conf";
});

Route::view('/inicio', 'home');

Route::get('/fecha', function () {
    date_default_timezone_set('UTC');
    return view('fecha', ['dia' => date('d'), 'mes'=>date('F'), 'anio'=>date('Y')]);
});

// Route::get('/fecha', function () {
//     $dia = date('d');
//     $mes = date('F');
//     $anio = date('Y');
//     $sentencia = 'hoy es ';
//     $fecha_actual = ['dia'=>$dia,'mes'=>$mes,'anio'=> $anio];

//     $resultado = compact('sentencia', 'fecha_actual');
//      print_r($resultado);
// });

Route::get('/fecha', function () {
    return view('fecha')
    ->with('dia',date('d'))
    ->with('mes',date('F'))
    ->with('anio',date('Y'));
});



require __DIR__ . '/auth.php';