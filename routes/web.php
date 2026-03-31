<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\MekanismeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\AboutController as AdminAboutController;
use App\Http\Controllers\Admin\MekanismeController as AdminMekanismeController;

/**
 * Public Routes
 */
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/tentang', [AboutController::class, 'index'])->name('tentang');

Route::get('/mekanisme', [MekanismeController::class, 'index'])->name('mekanisme');

Route::get('/produk', [ProductController::class, 'index'])->name('produk');

Route::get('/gabung', function () {
    return view('gabung');
})->name('gabung');

Route::get('/kontak', function () {
    return view('kontak');
})->name('kontak');

/**
 * Auth Routes
 */
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])
        ->name('login');
    Route::post('/login', [LoginController::class, 'login'])
        ->middleware('throttle.login');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

/**
 * Admin Routes (Protected)
 */
Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');

    Route::get('/home/edit', [AdminHomeController::class, 'edit'])->name('admin.home.edit');
    Route::put('/home/update', [AdminHomeController::class, 'update'])->name('admin.home.update');

    Route::post('/home/value-items', [AdminHomeController::class, 'storeValueItem'])->name('admin.home.value-items.store');
    Route::put('/home/value-items/{item}', [AdminHomeController::class, 'updateValueItem'])->name('admin.home.value-items.update');
    Route::delete('/home/value-items/{item}', [AdminHomeController::class, 'destroyValueItem'])->name('admin.home.value-items.destroy');

    Route::post('/home/summary-steps', [AdminHomeController::class, 'storeSummaryStep'])->name('admin.home.summary-steps.store');
    Route::put('/home/summary-steps/{item}', [AdminHomeController::class, 'updateSummaryStep'])->name('admin.home.summary-steps.update');
    Route::delete('/home/summary-steps/{item}', [AdminHomeController::class, 'destroySummaryStep'])->name('admin.home.summary-steps.destroy');

    Route::post('/home/stats', [AdminHomeController::class, 'storeStat'])->name('admin.home.stats.store');
    Route::put('/home/stats/{item}', [AdminHomeController::class, 'updateStat'])->name('admin.home.stats.update');
    Route::delete('/home/stats/{item}', [AdminHomeController::class, 'destroyStat'])->name('admin.home.stats.destroy');

    Route::get('/tentang/edit', [AdminAboutController::class, 'edit'])->name('admin.tentang.edit');
    Route::put('/tentang/update', [AdminAboutController::class, 'update'])->name('admin.tentang.update');

    Route::post('/tentang/missions', [AdminAboutController::class, 'storeMission'])->name('admin.tentang.missions.store');
    Route::put('/tentang/missions/{item}', [AdminAboutController::class, 'updateMission'])->name('admin.tentang.missions.update');
    Route::delete('/tentang/missions/{item}', [AdminAboutController::class, 'destroyMission'])->name('admin.tentang.missions.destroy');

    Route::post('/tentang/values', [AdminAboutController::class, 'storeValue'])->name('admin.tentang.values.store');
    Route::put('/tentang/values/{item}', [AdminAboutController::class, 'updateValue'])->name('admin.tentang.values.update');
    Route::delete('/tentang/values/{item}', [AdminAboutController::class, 'destroyValue'])->name('admin.tentang.values.destroy');

    Route::get('/mekanisme/edit', [AdminMekanismeController::class, 'edit'])->name('admin.mekanisme.edit');
    Route::put('/mekanisme/update', [AdminMekanismeController::class, 'update'])->name('admin.mekanisme.update');

    Route::post('/mekanisme/business-models', [AdminMekanismeController::class, 'storeBusinessModel'])->name('admin.mekanisme.business-models.store');
    Route::put('/mekanisme/business-models/{id}', [AdminMekanismeController::class, 'updateBusinessModel'])->name('admin.mekanisme.business-models.update');
    Route::delete('/mekanisme/business-models/{id}', [AdminMekanismeController::class, 'destroyBusinessModel'])->name('admin.mekanisme.business-models.destroy');

    Route::post('/mekanisme/business-models/{id}/points', [AdminMekanismeController::class, 'storeBusinessModelPoint'])->name('admin.mekanisme.business-model-points.store');
    Route::put('/mekanisme/business-model-points/{id}', [AdminMekanismeController::class, 'updateBusinessModelPoint'])->name('admin.mekanisme.business-model-points.update');
    Route::delete('/mekanisme/business-model-points/{id}', [AdminMekanismeController::class, 'destroyBusinessModelPoint'])->name('admin.mekanisme.business-model-points.destroy');

    Route::post('/mekanisme/flow-steps', [AdminMekanismeController::class, 'storeFlowStep'])->name('admin.mekanisme.flow-steps.store');
    Route::put('/mekanisme/flow-steps/{id}', [AdminMekanismeController::class, 'updateFlowStep'])->name('admin.mekanisme.flow-steps.update');
    Route::delete('/mekanisme/flow-steps/{id}', [AdminMekanismeController::class, 'destroyFlowStep'])->name('admin.mekanisme.flow-steps.destroy');

    Route::post('/mekanisme/flow-steps/{id}/points', [AdminMekanismeController::class, 'storeFlowStepPoint'])->name('admin.mekanisme.flow-step-points.store');
    Route::put('/mekanisme/flow-step-points/{id}', [AdminMekanismeController::class, 'updateFlowStepPoint'])->name('admin.mekanisme.flow-step-points.update');
    Route::delete('/mekanisme/flow-step-points/{id}', [AdminMekanismeController::class, 'destroyFlowStepPoint'])->name('admin.mekanisme.flow-step-points.destroy');

    Route::post('/mekanisme/terms', [AdminMekanismeController::class, 'storeTerm'])->name('admin.mekanisme.terms.store');
    Route::put('/mekanisme/terms/{id}', [AdminMekanismeController::class, 'updateTerm'])->name('admin.mekanisme.terms.update');
    Route::delete('/mekanisme/terms/{id}', [AdminMekanismeController::class, 'destroyTerm'])->name('admin.mekanisme.terms.destroy');

    Route::post('/mekanisme/faqs', [AdminMekanismeController::class, 'storeFaq'])->name('admin.mekanisme.faqs.store');
    Route::put('/mekanisme/faqs/{id}', [AdminMekanismeController::class, 'updateFaq'])->name('admin.mekanisme.faqs.update');
    Route::delete('/mekanisme/faqs/{id}', [AdminMekanismeController::class, 'destroyFaq'])->name('admin.mekanisme.faqs.destroy');
});
