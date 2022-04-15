<?php

use App\Http\Controllers\FileController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ApplicationController;
use Illuminate\Support\Facades\Route;
use Codedge\Fpdf\Fpdf\Fpdf;

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

// Login Page Actions
Route::get('/login', [PageController::class, 'login']);
Route::post('/login', [StudentController::class, 'loginAuth']);

// Register Page Actions
Route::get('/register', [PageController::class, 'register']);
Route::post('/register', [StudentController::class, 'registerAuth']);

// Forgot Password Page Actions
Route::get('/forgot', [PageController::class, 'forgotPassword']);
Route::post('/forgot', [StudentController::class, 'passwordReset']);

Route::get('/', function() {
    return view('giris');
});

Route::get('/anasayfa', function() {
    return view('anasayfa');
});

Route::get('/admin', function(){
    return view('admin');
});

Route::get('profil', function() {
    return view('profil');
});

Route::get('/upload', [StudentController::class, 'renderUpload']);
Route::post('/upload', [FileController::class, 'upload']);
Route::get('/auth', [FileController::class, 'loginAuth']);

Route::get('/pdfGen', [FileController::class, 'genPdfYatay']);

// Yaz Okulu Routes
Route::get('/yazokulu', function (){
    return view('yazokulu');
});
Route::post('/yazokulu', [ApplicationController::class, 'yazOkulu']);
// İntibak Routes
Route::get('/intibak', function(){
    return view('intibak');
});
Route::post('/intibak', [ApplicationController::class, 'intibak']);
// DGS Routes
Route::get('/dgs', function() {
    return view('dgs');
});
Route::post('/dgs', [ApplicationController::class, 'dgs']);
// CAP Routes
Route::get('/cap', function(){
    return view('cap');
});
Route::post('/cap', [ApplicationController::class, 'cap']);
// Yatay Geçiş Routes
Route::get('/yataygecis', function(){
    return view('yataygecis');
});
Route::post('/yataygecis', [ApplicationController::class, 'yataygecis']);

// Update Functions
Route::get('/onayla', [ApplicationController::class, 'onayla']);
Route::get('/reddet', [ApplicationController::class, 'reddet']);

Route::post('/pdfYazOkulu', [FileController::class, 'genPdfYazOkulu']);
Route::post('/pdfCap', [FileController::class, 'genPdfCap']);
Route::post('/pdfYatayGecis', [FileController::class, 'genPdfYatay']);

Route::get('/deneme', [ApplicationController::class, 'yazOkulu']);
