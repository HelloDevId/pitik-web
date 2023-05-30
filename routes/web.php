<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataAyamController;
use App\Http\Controllers\CatatAyamController;
use App\Http\Controllers\PakanDetailController;
use App\Http\Controllers\VaksinDetailController;
use App\Http\Controllers\UserDetailController;
use App\Http\Controllers\TenagaKerjaController;
use App\Http\Controllers\SampleJualController;
use App\Http\Controllers\DistribusiController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\PendapatanController;
use App\Http\Controllers\AuthController;

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

route::get('/', function () {
    return view('admin.login');
});

Route::post('/login', [AuthController::class, 'authenticate'])->middleware('IsStay');
Route::get('/login', [AuthController::class, 'index'])->middleware('IsStay');
Route::get('/logout', [AuthController::class, 'logout'])->middleware('IsLogin');

Route::get('/index', function () {
    return view('admin.pages.index');
})->middleware('IsLogin');

Route::get('/dataayam', [DataAyamController::class, 'index'])->middleware('IsLogin');
Route::post('/dataayam', [DataAyamController::class, 'store'])->middleware('IsLogin');
Route::put('/dataayam/{id}', [DataAyamController::class, 'update'])->middleware('IsLogin');
Route::delete('/dataayam/{id}', [DataAyamController::class, 'destroy'])->middleware('IsLogin');


Route::get('/datacatatayam', [CatatAyamController::class, 'index'])->middleware('IsLogin');
Route::post('/datacatatayam', [CatatAyamController::class, 'store'])->middleware('IsLogin');
Route::put('/datacatatayam/{id}', [CatatAyamController::class, 'update'])->middleware('IsLogin');
Route::delete('/datacatatayam/{id}', [CatatAyamController::class, 'destroy'])->middleware('IsLogin');

Route::get('/datapakan', [PakanDetailController::class, 'index'])->middleware('IsLogin');
Route::post('/datapakan', [PakanDetailController::class, 'store'])->middleware('IsLogin');
Route::put('/datapakan/{id}', [PakanDetailController::class, 'update'])->middleware('IsLogin');
Route::delete('/datapakan/{id}', [PakanDetailController::class, 'destroy'])->middleware('IsLogin');

Route::get('/dataovk', [VaksinDetailController::class, 'index'])->middleware('IsLogin');
Route::post('/dataovk', [VaksinDetailController::class, 'store'])->middleware('IsLogin');
Route::put('/dataovk/{id}', [VaksinDetailController::class, 'update'])->middleware('IsLogin');
Route::delete('/dataovk/{id}', [VaksinDetailController::class, 'destroy'])->middleware('IsLogin');

Route::get('/datauser', [UserDetailController::class, 'index'])->middleware('IsLogin');
Route::post('/datauser', [UserDetailController::class, 'store'])->middleware('IsLogin');
Route::put('/datauser/{id}', [UserDetailController::class, 'update'])->middleware('IsLogin');
Route::delete('/datauser/{id}', [UserDetailController::class, 'destroy'])->middleware('IsLogin');

Route::get('/datatenagakerja', [TenagaKerjaController::class, 'index'])->middleware('IsLogin');
Route::post('/datatenagakerja', [TenagaKerjaController::class, 'store'])->middleware('IsLogin');
Route::put('/datatenagakerja/{id}', [TenagaKerjaController::class, 'update'])->middleware('IsLogin');
Route::delete('/datatenagakerja/{id}', [TenagaKerjaController::class, 'destroy'])->middleware('IsLogin');

Route::get('/datasamplejual', [SampleJualController::class, 'index'])->middleware('IsLogin');
Route::post('/datasamplejual', [SampleJualController::class, 'store'])->middleware('IsLogin');
Route::put('/datasamplejual/{id}', [SampleJualController::class, 'update'])->middleware('IsLogin');
Route::delete('/datasamplejual/{id}', [SampleJualController::class, 'destroy'])->middleware('IsLogin');

Route::get('/datadistribusi', [DistribusiController::class, 'index'])->middleware('IsLogin');
Route::post('/datadistribusi', [DistribusiController::class, 'store'])->middleware('IsLogin');
Route::put('/datadistribusi/{id}', [DistribusiController::class, 'update'])->middleware('IsLogin');
Route::delete('/datadistribusi/{id}', [DistribusiController::class, 'destroy'])->middleware('IsLogin');

Route::get('/datapengeluaran', [PengeluaranController::class, 'index'])->middleware('IsLogin');
Route::post('/datapengeluaran', [PengeluaranController::class, 'store'])->middleware('IsLogin');
Route::put('/datapengeluaran/{id}', [PengeluaranController::class, 'update'])->middleware('IsLogin');
Route::delete('/datapengeluaran/{id}', [PengeluaranController::class, 'destroy'])->middleware('IsLogin');

Route::get('/datapendapatan', [PendapatanController::class, 'index'])->middleware('IsLogin');
Route::post('/datapendapatan', [PendapatanController::class, 'store'])->middleware('IsLogin');
Route::put('/datapendapatan/{id}', [PendapatanController::class, 'update'])->middleware('IsLogin');
Route::delete('/datapendapatan/{id}', [PendapatanController::class, 'destroy'])->middleware('IsLogin');

Route::post('/update-profile/{id}', [AuthController::class, 'profilupdate'])->middleware('IsLogin');