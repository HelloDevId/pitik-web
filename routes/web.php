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
    return view('admin.login');
});

Route::get('/login', function () {
    return view('admin.login');
});

Route::get('/index', function () {
    return view('admin.pages.index');
});

Route::get('/dataayam', [DataAyamController::class, 'index']);
Route::post('/dataayam', [DataAyamController::class, 'store']);
Route::put('/dataayam/{id}', [DataAyamController::class, 'update']);
Route::delete('/dataayam/{id}', [DataAyamController::class, 'destroy']);


Route::get('/datacatatayam', [CatatAyamController::class, 'index']);
Route::post('/datacatatayam', [CatatAyamController::class, 'store']);
Route::put('/datacatatayam/{id}', [CatatAyamController::class, 'update']);
Route::delete('/datacatatayam/{id}', [CatatAyamController::class, 'destroy']);

Route::get('/datapakan', [PakanDetailController::class, 'index']);
Route::post('/datapakan', [PakanDetailController::class, 'store']);
Route::put('/datapakan/{id}', [PakanDetailController::class, 'update']);
Route::delete('/datapakan/{id}', [PakanDetailController::class, 'destroy']);

Route::get('/dataovk', [VaksinDetailController::class, 'index']);
Route::post('/dataovk', [VaksinDetailController::class, 'store']);
Route::put('/dataovk/{id}', [VaksinDetailController::class, 'update']);
Route::delete('/dataovk/{id}', [VaksinDetailController::class, 'destroy']);

Route::get('/datauser', [UserDetailController::class, 'index']);
Route::post('/datauser', [UserDetailController::class, 'store']);
Route::put('/datauser/{id}', [UserDetailController::class, 'update']);
Route::delete('/datauser/{id}', [UserDetailController::class, 'destroy']);

Route::get('/datatenagakerja', [TenagaKerjaController::class, 'index']);
Route::post('/datatenagakerja', [TenagaKerjaController::class, 'store']);
Route::put('/datatenagakerja/{id}', [TenagaKerjaController::class, 'update']);
Route::delete('/datatenagakerja/{id}', [TenagaKerjaController::class, 'destroy']);

Route::get('/datasamplejual', [SampleJualController::class, 'index']);
Route::post('/datasamplejual', [SampleJualController::class, 'store']);
Route::put('/datasamplejual/{id}', [SampleJualController::class, 'update']);
Route::delete('/datasamplejual/{id}', [SampleJualController::class, 'destroy']);

Route::get('/datadistribusi', [DistribusiController::class, 'index']);
Route::post('/datadistribusi', [DistribusiController::class, 'store']);
Route::put('/datadistribusi/{id}', [DistribusiController::class, 'update']);
Route::delete('/datadistribusi/{id}', [DistribusiController::class, 'destroy']);

Route::get('/datapengeluaran', [PengeluaranController::class, 'index']);
Route::post('/datapengeluaran', [PengeluaranController::class, 'store']);
Route::put('/datapengeluaran/{id}', [PengeluaranController::class, 'update']);
Route::delete('/datapengeluaran/{id}', [PengeluaranController::class, 'destroy']);

Route::get('/datapendapatan', [PendapatanController::class, 'index']);
Route::post('/datapendapatan', [PendapatanController::class, 'store']);
Route::put('/datapendapatan/{id}', [PendapatanController::class, 'update']);
Route::delete('/datapendapatan/{id}', [PendapatanController::class, 'destroy']);