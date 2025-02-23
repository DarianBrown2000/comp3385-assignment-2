<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
});

// Create additional Routes below
use App\Http\Controllers\FeedbackController;

Route::get('/feedback', [FeedbackController::class, 'create']);

Route::post('/feedback/send', [FeedbackController::class, 'send']);

Route::get('/feedback/success', function () {
    return view('feedback.success');
});
