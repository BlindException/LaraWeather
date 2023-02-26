<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\LiveWeatherPanel;
use App\Http\Controllers\ProfileController;
use App\Http\Livewire\FavoriteLocationSearch;
use App\Http\Controllers\FavoriteLocationController;

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

Route::get('/', LiveWeatherPanel::class);

Route::get('/dashboard', function () {
    return view('dashboard', [
        'favoritelocations' => auth()->user()->favoriteLocations()->get()->sortBy('name'),
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('favoritelocations', FavoriteLocationController::class)
    ->only(['create', 'store', 'index', 'destroy'])
    ->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';