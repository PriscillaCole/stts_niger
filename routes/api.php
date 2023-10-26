<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\CropDeclarationController;
use App\Http\Controllers\CropController;
use App\Http\Controllers\FieldInspectionController;
use App\Http\Controllers\SeedProducerController;
use App\Http\Controllers\LoadStockController;
use App\Http\Controllers\SeedSampleRequestController;
use App\Http\Controllers\SeedLabController;
use App\Http\Controllers\SeedLabelController;
use App\Http\Controllers\MarketableSeedController;
use App\Http\Controllers\PreOrderController;
use App\Http\Controllers\QuotationController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CooperativeController;
use App\Http\Controllers\CooperativeMemberController;
use App\Http\Controllers\AgroDealerController;
use App\Http\Controllers\SeedDetailsController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\UserRoleController;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('test', [ApiController::class, 'index']);
Route::post('register', [ApiController::class, 'register']);
Route::get('profile', [ApiController::class, 'profile']);
Route::post('login', [ApiController::class, 'login']);
Route::get('crops', [CropController::class, 'crops']);
Route::get('crop-varieties', [CropController::class, 'crop_varieties']);


Route::resource('seed-producers', SeedProducerController::class);
Route::resource('crop-declarations', CropDeclarationController::class);
Route::resource('field-inspections', FieldInspectionController::class);
Route::resource('load-stocks', LoadStockController::class);
Route::resource('seed-sample-requests', SeedSampleRequestController::class);
Route::resource('seed-labs', SeedLabController::class);
Route::resource('seed-labels', SeedLabelController::class);
Route::resource('marketable-seeds', MarketableSeedController::class);
Route::resource('pre-orders', PreOrderController::class);
Route::resource('quotations', QuotationController::class);
Route::resource('orders', OrderController::class);
Route::resource('cooperatives', CooperativeController::class);
Route::resource('cooperative-members', CooperativeMemberController::class);
Route::resource('agro-dealers', AgroDealerController::class);
Route::resource('notifications', NotificationController::class);
Route::resource('user_roles', UserRoleController::class);

Route::post('track', [SeedDetailsController::class, 'track']);
Route::get('track_details', [SeedDetailsController::class, 'track']);

Route::post('trace', [SeedDetailsController::class, 'trace']);
Route::get('trace', [SeedDetailsController::class, 'trace']);









