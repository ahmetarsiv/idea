<?php

use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CMSController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LocaleController;
use App\Http\Controllers\Admin\MetaContentController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin-routes" middleware group. Now create something great!
|
*/

Route::redirect('/','/login');
Route::redirect('/home','/login');

Auth::routes([
    'login'     => true,
    'logout'    => false,
    'register'  => false,
    'reset'     => true,
    'confirm'   => true,
    'verify'    => true,
]);

Route::get('/redirect', [HomeController::class, 'redirect'])->name('redirect');
Route::get('/logout-user', [HomeController::class, 'logoutUser'])->name('admin.logout');

Route::prefix('admin')->name('admin.')->middleware(['auth', 'check.role'])->group(function () {

    /**
     * Admin dashboard route
     */
    Route::get('dashboard', [DashboardController::class, 'getDashboard'])->name('dashboard');

    /**
     * Admin profile routes
     */
    Route::get('profile', [DashboardController::class, 'indexProfile'])->name('profile.edit');
    Route::put('profile', [DashboardController::class, 'updateProfile'])->name('profile.update');

    /**
     * Admin meta-data routes
     */
    Route::get('meta-data', [DashboardController::class, 'indexMetaData'])->name('meta-data.edit');
    Route::put('meta-data', [DashboardController::class, 'updateMetaData'])->name('meta-data.update');

    /**
     * Admin configuration routes
     */
    Route::get('configuration', [DashboardController::class, 'indexConfiguration'])->name('configuration.edit');
    Route::put('configuration', [DashboardController::class, 'updateConfiguration'])->name('configuration.update');

    /**
     * Admin user routes
     */
    Route::resource('user', UserController::class);

    /**
     * Admin blog routes
     */
    Route::resource('blog', BlogController::class);

    /**
     * Admin blog category routes
     */
    Route::resource('category', CategoryController::class);

    /**
     * Admin product routes
     */
    Route::resource('product', ProductController::class);

    /**
     * Admin cms routes
     */
    Route::resource('cms', CMSController::class);

    /**
     * Admin slider routes
     */
    Route::resource('slider', SliderController::class);

    /**
     * Admin locale routes
     */
    Route::resource('locale', LocaleController::class);

    /**
     * Admin meta-content routes
     */
    Route::resource('meta-content', MetaContentController::class);
});
