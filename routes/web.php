<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\WineController;
use App\Http\Controllers\SpiritController;
use App\Http\Controllers\PageController;

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

/* MULTILANGUAL PUBLIC PAGE ROUTES */
Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localizationRedirect', 'localeViewPath',],
], function () {
    Route::get('/', fn() => view('pages.home'))->name('home');

    /* ABOUT GROUP */
    Route::prefix('about')->name('about.')->group(function () {
        Route::get('/', fn() => view('pages.about.index'))->name('index');
        Route::get('/our-story', fn() => view('pages.about.story'))->name('story');
        Route::get('/our-company', fn() => view('pages.about.company'))->name('company');
        Route::get('/our-team', fn() => view('pages.about.team'))->name('team');
        Route::get('/export', fn() => view('pages.about.export'))->name('export');
        /* WINEMAKING GROUP */
        Route::prefix('winemaking')->name('winemaking.')->group(function () {
            Route::get('/', fn() => view('pages.about.winemaking.index'))->name('index');
            Route::get('/our-winery', fn() => view('pages.about.winemaking.winery'))->name('winery');
            Route::get('/our-vineyards', fn() => view('pages.about.winemaking.vineyards'))->name('vineyards');
            Route::get('/our-awards', fn() => view('pages.about.winemaking.awards'))->name('awards');
        });
    });
    /* PRODUCTS GROUP */
    Route::prefix('products')->name('products.')->group(function () {
        Route::get('/', fn() => view('pages.products.index'))->name('index');
        /* WINE GROUP */
        Route::prefix('wines')->name('wines.')->group(function () {
            Route::get('/', [WineController::class, 'index'])->name('index');
            Route::get('/classic-wines', [WineController::class, 'classic'])->name('classic');
            Route::get('/qvevri-wines', [WineController::class, 'qvevri'])->name('qvevri');
            Route::get('/ceramics', [WineController::class, 'ceramics'])->name('ceramics');
            Route::get('/{wine:slug}', [WineController::class, 'show'])->name('show');
        });
        /* SPIRITS GROUP */
        Route::prefix('spirits')->name('spirits.')->group(function () {
            Route::get('/', [SpiritController::class, 'index'])->name('index');
            Route::get('/{spirit:slug}', [SpiritController::class, 'show'])->name('show');
        });
    });

    /* PAGES GROUP */
    Route::prefix('pages')->name('pages.')->group(function () {
        Route::get('/{slug}', [PageController::class, 'show'])
            ->name('show');
    });
});
