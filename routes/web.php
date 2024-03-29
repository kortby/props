<?php

use App\Http\Controllers\AmenityScheduleController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PrescreeningController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\ScheduleViewingController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UnitPaymentController;
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
Route::get('/properties/{property}', [PropertyController::class, 'show']);

Route::get('/schedule-viewing/{property}', [ScheduleViewingController::class, 'create'])->name('scheduleViewings');
Route::post('/schedule-viewing', [ScheduleViewingController::class, 'store'])->name('postScheduleViewings');

Route::get('/perchase', [OrderController::class, 'show'])->name('unitPayment');
Route::get('/unit-payment', [UnitPaymentController::class, 'show'])->name('unitPayment');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::get('/payment', [PaymentController::class, 'index'])->name('payment');

    Route::get('/maintenance', [MaintenanceController::class, 'create'])->name('maintenance');
    Route::post('/maintenance', [MaintenanceController::class, 'store'])->name('postMaintenance');

    Route::get('/application', [ApplicationController::class, 'create'])->name('application');
    Route::post('/application', [ApplicationController::class, 'store'])->name('postApplication');

    Route::get('/prescreening', [PrescreeningController::class, 'create'])->name('prescreening');
    Route::post('/prescreening', [PrescreeningController::class, 'store'])->name('postPrescreening');

    Route::get('/amenities', [AmenityScheduleController::class, 'create'])->name('amenities');
    Route::post('/amenities', [AmenityScheduleController::class, 'store'])->name('postAmenities');
});

Route::get('/impersonation', function (Request $request, ImpersonatesUsers $impersonator) {
    if ($impersonator->impersonating($request)) {
        $impersonator->stopImpersonating($request, Auth::guard(), User::class);
    }
});
