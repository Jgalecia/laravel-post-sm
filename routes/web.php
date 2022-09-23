<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostFacebooksController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\LinkedinsController;


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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [PostFacebooksController::class,'index']);

Route::post('/store-image',[PostFacebooksController::class,'storeImage'])
->name('images.store');

Route::group(['prefix' => 'auth/facebook', 'middleware' => 'auth'], function () {
    Route::get('/', [\App\Http\Controllers\SocialController::class, 'redirectToProvider']);
    Route::get('/callback', [\App\Http\Controllers\SocialController::class, 'handleProviderCallback']);
});

Route::get('auth/linkedin/callback', [LinkedinsController::class, 'handleLinkedinRedirect']);
Route::get('testing', [LinkedinsController::class, 'callback']);