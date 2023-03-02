<?php


use App\Http\Controllers\Admin\SponsorController;
use App\Models\Spec;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::middleware('auth')->namespace('Admin')->prefix('admin')->name('admin.')->group(function () {

    Route::get('/', 'HomeController@index')->name('index');
    Route::resource('/apartments', ApartmentsController::class);
    Route::resource('/dashboard', DashboardController::class);

    Route::get('/checkout/{type}/{apartment_id}', [SponsorController::class, 'token'])->name('sponsor.pay');
    Route::post('/checkout/{price}/{apartment_id}', [SponsorController::class, 'checkout'])->name('sponsors.checkout');

});

Route::get('{any?}', function(){
    return view('guest.home');
})->where("any", ".*");
