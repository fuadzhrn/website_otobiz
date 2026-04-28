<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\MekanismeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\JoinController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\AboutController as AdminAboutController;
use App\Http\Controllers\Admin\MekanismeController as AdminMekanismeController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\JoinController as AdminJoinController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;

/**
 * Public Routes
 */
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/tentang', [AboutController::class, 'index'])->name('tentang');

Route::get('/mekanisme', [MekanismeController::class, 'index'])->name('mekanisme');

Route::get('/produk', [ProductController::class, 'index'])->name('produk');

Route::get('/gabung', [JoinController::class, 'index'])->name('gabung');

Route::get('/kontak', [ContactController::class, 'index'])->name('kontak');

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

    Route::get('/produk/edit', [AdminProductController::class, 'edit'])->name('admin.produk.edit');
    Route::put('/produk/update', [AdminProductController::class, 'update'])->name('admin.produk.update');

    Route::post('/produk/units', [AdminProductController::class, 'storeUnit'])->name('admin.produk.units.store');
    Route::put('/produk/units/{id}', [AdminProductController::class, 'updateUnit'])->name('admin.produk.units.update');
    Route::post('/produk/units/{id}/toggle', [AdminProductController::class, 'toggleUnit'])->name('admin.produk.units.toggle');
    Route::delete('/produk/units/{id}', [AdminProductController::class, 'destroyUnit'])->name('admin.produk.units.destroy');

    Route::post('/produk/units/{id}/galleries', [AdminProductController::class, 'storeGallery'])->name('admin.produk.galleries.store');
    Route::put('/produk/unit-galleries/{id}', [AdminProductController::class, 'updateGallery'])->name('admin.produk.galleries.update');
    Route::post('/produk/unit-galleries/{id}/toggle', [AdminProductController::class, 'toggleGallery'])->name('admin.produk.galleries.toggle');
    Route::delete('/produk/unit-galleries/{id}', [AdminProductController::class, 'destroyGallery'])->name('admin.produk.galleries.destroy');

    Route::post('/produk/packages', [AdminProductController::class, 'storePackage'])->name('admin.produk.packages.store');
    Route::put('/produk/packages/{id}', [AdminProductController::class, 'updatePackage'])->name('admin.produk.packages.update');
    Route::post('/produk/packages/{id}/toggle', [AdminProductController::class, 'togglePackage'])->name('admin.produk.packages.toggle');
    Route::delete('/produk/packages/{id}', [AdminProductController::class, 'destroyPackage'])->name('admin.produk.packages.destroy');

    Route::post('/produk/packages/{id}/benefits', [AdminProductController::class, 'storeBenefit'])->name('admin.produk.benefits.store');
    Route::put('/produk/package-benefits/{id}', [AdminProductController::class, 'updateBenefit'])->name('admin.produk.benefits.update');
    Route::delete('/produk/package-benefits/{id}', [AdminProductController::class, 'destroyBenefit'])->name('admin.produk.benefits.destroy');

    Route::post('/produk/simulation-highlights', [AdminProductController::class, 'storeSimulationHighlight'])->name('admin.produk.simulation-highlights.store');
    Route::put('/produk/simulation-highlights/{id}', [AdminProductController::class, 'updateSimulationHighlight'])->name('admin.produk.simulation-highlights.update');
    Route::delete('/produk/simulation-highlights/{id}', [AdminProductController::class, 'destroySimulationHighlight'])->name('admin.produk.simulation-highlights.destroy');

    Route::get('/gabung/edit', [AdminJoinController::class, 'edit'])->name('admin.gabung.edit');
    Route::put('/gabung/update', [AdminJoinController::class, 'update'])->name('admin.gabung.update');

    Route::post('/gabung/form-fields', [AdminJoinController::class, 'storeFormField'])->name('admin.gabung.form-fields.store');
    Route::put('/gabung/form-fields/{id}', [AdminJoinController::class, 'updateFormField'])->name('admin.gabung.form-fields.update');
    Route::delete('/gabung/form-fields/{id}', [AdminJoinController::class, 'destroyFormField'])->name('admin.gabung.form-fields.destroy');

    Route::post('/gabung/selection-steps', [AdminJoinController::class, 'storeSelectionStep'])->name('admin.gabung.selection-steps.store');
    Route::put('/gabung/selection-steps/{id}', [AdminJoinController::class, 'updateSelectionStep'])->name('admin.gabung.selection-steps.update');
    Route::delete('/gabung/selection-steps/{id}', [AdminJoinController::class, 'destroySelectionStep'])->name('admin.gabung.selection-steps.destroy');

    Route::post('/gabung/selection-steps/{id}/points', [AdminJoinController::class, 'storeSelectionStepPoint'])->name('admin.gabung.selection-step-points.store');
    Route::put('/gabung/selection-step-points/{id}', [AdminJoinController::class, 'updateSelectionStepPoint'])->name('admin.gabung.selection-step-points.update');
    Route::delete('/gabung/selection-step-points/{id}', [AdminJoinController::class, 'destroySelectionStepPoint'])->name('admin.gabung.selection-step-points.destroy');

    Route::post('/gabung/sales-contacts', [AdminJoinController::class, 'storeSalesContact'])->name('admin.gabung.sales-contacts.store');
    Route::put('/gabung/sales-contacts/{id}', [AdminJoinController::class, 'updateSalesContact'])->name('admin.gabung.sales-contacts.update');
    Route::delete('/gabung/sales-contacts/{id}', [AdminJoinController::class, 'destroySalesContact'])->name('admin.gabung.sales-contacts.destroy');

    Route::post('/gabung/sales-highlights', [AdminJoinController::class, 'storeSalesHighlight'])->name('admin.gabung.sales-highlights.store');
    Route::put('/gabung/sales-highlights/{id}', [AdminJoinController::class, 'updateSalesHighlight'])->name('admin.gabung.sales-highlights.update');
    Route::delete('/gabung/sales-highlights/{id}', [AdminJoinController::class, 'destroySalesHighlight'])->name('admin.gabung.sales-highlights.destroy');

    Route::get('/kontak/edit', [AdminContactController::class, 'edit'])->name('admin.kontak.edit');
    Route::put('/kontak/update', [AdminContactController::class, 'update'])->name('admin.kontak.update');

    Route::post('/kontak/quick-cards', [AdminContactController::class, 'storeQuickCard'])->name('admin.kontak.quick-cards.store');
    Route::put('/kontak/quick-cards/{id}', [AdminContactController::class, 'updateQuickCard'])->name('admin.kontak.quick-cards.update');
    Route::delete('/kontak/quick-cards/{id}', [AdminContactController::class, 'destroyQuickCard'])->name('admin.kontak.quick-cards.destroy');

    Route::post('/kontak/form-fields', [AdminContactController::class, 'storeFormField'])->name('admin.kontak.form-fields.store');
    Route::put('/kontak/form-fields/{id}', [AdminContactController::class, 'updateFormField'])->name('admin.kontak.form-fields.update');
    Route::delete('/kontak/form-fields/{id}', [AdminContactController::class, 'destroyFormField'])->name('admin.kontak.form-fields.destroy');

    Route::post('/kontak/locations', [AdminContactController::class, 'storeLocation'])->name('admin.kontak.locations.store');
    Route::put('/kontak/locations/{id}', [AdminContactController::class, 'updateLocation'])->name('admin.kontak.locations.update');
    Route::delete('/kontak/locations/{id}', [AdminContactController::class, 'destroyLocation'])->name('admin.kontak.locations.destroy');

    Route::post('/kontak/support-cards', [AdminContactController::class, 'storeSupportCard'])->name('admin.kontak.support-cards.store');
    Route::put('/kontak/support-cards/{id}', [AdminContactController::class, 'updateSupportCard'])->name('admin.kontak.support-cards.update');
    Route::delete('/kontak/support-cards/{id}', [AdminContactController::class, 'destroySupportCard'])->name('admin.kontak.support-cards.destroy');

    Route::post('/kontak/support-highlights', [AdminContactController::class, 'storeSupportHighlight'])->name('admin.kontak.support-highlights.store');
    Route::put('/kontak/support-highlights/{id}', [AdminContactController::class, 'updateSupportHighlight'])->name('admin.kontak.support-highlights.update');
    Route::delete('/kontak/support-highlights/{id}', [AdminContactController::class, 'destroySupportHighlight'])->name('admin.kontak.support-highlights.destroy');
});
