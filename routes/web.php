<?php

use App\Http\Controllers\ChatController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

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
if (App::environment('production')) {
    URL::forceScheme('https');
}


Route::redirect('/', '/login');

Route::get('/test', function () {
    \App\Events\OrderStatusUpdate::dispatch();
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [ChatController::class, 'index'])->name('dashboard');
    Route::post('/send', [ChatController::class, 'send'])->name('chat.send');
    Route::get('/fetchMessages/{activeUserId}', [ChatController::class, 'fetchMessages'])->name('chat.fetch-messages');
});

require __DIR__ . '/auth.php';


