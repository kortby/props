<?php

use App\Http\Controllers\AmenityScheduleController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\UnitController;
use App\Models\User;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Nova\Contracts\ImpersonatesUsers;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
    ]);
});

Route::get('/products', function () {
    return Inertia::render('Products');
});

Route::get('/features', function () {
    return Inertia::render('Features');
});

Route::get('/prices', function () {
    return Inertia::render('Prices');
});

Route::get('/company', function () {
    return Inertia::render('Company');
});

Route::get('/units/{unit}', [UnitController::class, 'show']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::get('/payment', function () {
        return Inertia::render('Payment');
    })->name('payment');

    Route::get('/maintenance', [MaintenanceController::class, 'create'])->name('maintenance');
    Route::post('/maintenance', [MaintenanceController::class, 'store'])->name('postMaintenance');

    Route::get('/amenities', [AmenityScheduleController::class, 'create'])->name('amenities');
    Route::post('/amenities', [AmenityScheduleController::class, 'store'])->name('postAmenities');
    // Route::resource('amenities', AmenityScheduleController::class);
});

Route::get('/impersonation', function (Request $request, ImpersonatesUsers $impersonator) {
    if ($impersonator->impersonating($request)) {
        $impersonator->stopImpersonating($request, Auth::guard(), User::class);
    }
});
