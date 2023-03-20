<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RedirectToUrl;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LoginSecurityController;


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
if(User::count() != null){
    Route::redirect('/', '/login');
} else {
    Route::redirect('/', '/register');
}

/*
|--------------------------------------------------------------------------
| Link Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified', '2fa'])->group(function () {
    Route::get('/links', [LinkController::class, 'index'])
        ->name('links');

    Route::get('/links/create', [LinkController::class, 'create'])
        ->name('links.create');

    Route::get('/links/{link}/edit', [LinkController::class, 'edit'])
        ->name('links.edit');

        Route::get('/links/{link}/delete', [LinkController::class, 'delete'])
        ->name('links.delete');
});

/*
|--------------------------------------------------------------------------
| Profile Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
})->middleware(['auth', '2fa']);

require __DIR__.'/auth.php';

/*
|--------------------------------------------------------------------------
| 2FA Middleware
|--------------------------------------------------------------------------
*/

Route::group(['prefix'=>'2fa'], function(){
    Route::post('/generateSecret',[LoginSecurityController::class, 'generate2faSecret'])->name('generate2faSecret');
    Route::get('/registerSecret',[LoginSecurityController::class, 'register2faSecret'])->name('register2faSecret');
    Route::post('/enable2fa',[LoginSecurityController::class, 'enable2fa'])->name('enable2fa');
    Route::post('/disable2fa',[LoginSecurityController::class, 'disable2fa'])->name('disable2fa');

    // 2fa middleware
    Route::post('/2faVerify', function () {
        return redirect(URL()->previous());
    })->name('2faVerify')->middleware('2fa');
});

// 2FA Route
Route::get('profile/2fa',[LoginSecurityController::class, 'show2faForm'])->name('2fa');

// test middleware
Route::get('/test_middleware', function () {
    return "2FA middleware work!";
})->middleware(['auth', '2fa',  'role:admin']);


/*
|--------------------------------------------------------------------------|
|                             ⚠️ WARNING ⚠️                               |
|  DO NOT MOVE THIS ROUTE AT ALL, EVERYTHING EVER SHOULD BE ABOVE IT       |
|                             ⚠️ WARNING ⚠️                               |
|--------------------------------------------------------------------------|
*/

Route::get('{link:slug}', RedirectToUrl::class)->name('redirect');