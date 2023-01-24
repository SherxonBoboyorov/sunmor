<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\AboutcompanyController;
use App\Http\Controllers\Admin\IconController;
use App\Http\Controllers\Admin\HeavytruckController;
use App\Http\Controllers\Admin\CompanynumberController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\UsefulResourceController;
use App\Http\Controllers\Admin\OptionsController;
use App\Http\Controllers\Admin\CompanycarrerController;
use App\Http\Controllers\Admin\CareerdocumentController;
use UniSharp\Laravel\LaravelFilemanager\Lfm;


use App\Http\Controllers\Front\IndexController;
use App\Http\Controllers\Front\AboutController;
use App\Http\Controllers\Front\ServicesController;
use App\Http\Controllers\Front\TruckController;
use App\Http\Controllers\Front\NewsController;
use App\Http\Controllers\Front\CareerController;
use App\Http\Controllers\Front\ContactController;

Auth::routes();

Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['role:admin'])->prefix('dashboard')->group(static function () {
    Route::get('/', [HomeController::class, 'index'])->name('homeAdmin');
    Route::resources([
        'slider' => SliderController::class,
        'page' => PageController::class,
        'aboutcompany' => AboutcompanyController::class,
        'icon' => IconController::class,
        'heavytruck' => HeavytruckController::class,
        'companynumber' => CompanynumberController::class,
        'article' => ArticleController::class,
        'useful_resource' => UsefulResourceController::class,
        'options' => OptionsController::class,
        'companycarrer' => CompanycarrerController::class,
        'careerdocument' => CareerdocumentController::class
    ]);
});

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){
        Route::get('/', [IndexController::class, 'homepage'])->name('/');
        Route::get('about', [AboutController::class, 'about'])->name('about');
        Route::get('pages', [ServicesController::class, 'list'])->name('pages');
        Route::get('pages/{slug}', [ServicesController::class, 'show'])->name('page');
        Route::get('heavytrucks', [TruckController::class, 'list'])->name('heavytrucks');
        Route::get('heavytrucks/{slug}', [TruckController::class, 'show'])->name('heavytruck');
        Route::get('articles', [NewsController::class, 'list'])->name('articles');
        Route::get('articles/{slug}', [NewsController::class, 'show'])->name('article');
        Route::get('career', [CareerController::class, 'index'])->name('career');
        Route::get('contact', [ContactController::class, 'index'])->name('contact');
        Route::post('save_callback', [ContactController::class, 'saveCallback'])->name('saveCallback');
        Route::post('save_quotecallbackSave', [IndexController::class, 'quotecallbackSave'])->name('quotecallbackSave2');
        Route::post('save_quotecallbackSave', [ServicesController::class, 'quotecallbackSave'])->name('quotecallbackSave');
 });



Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    UniSharp\LaravelFilemanager\Lfm::routes();
});


