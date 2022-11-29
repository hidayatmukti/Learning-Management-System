<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Requests;
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
Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/login',[App\Http\Controllers\Auth\LoginController::class, 'index'])->name('login');
Route::get('/logout',[App\Http\Controllers\Auth\LogoutController::class, 'index'])->name('logout');
Route::post('/login_proses',[App\Http\Controllers\Auth\LoginController::class, 'check'])->name('login_proses');


/*ADMIN*/
Route::get('/admin',[App\Http\Controllers\Auth\AdminController::class, 'index'])->name('admin');
Route::post('/add_user',[App\Http\Controllers\Auth\AdminController::class, 'add_user'])->name('add_user');
Route::post('/delete_user',[App\Http\Controllers\Auth\AdminController::class, 'delete_user'])->name('delete_user');
Route::post('/edit_user',[App\Http\Controllers\Auth\AdminController::class, 'edit_user'])->name('edit_user');

Route::get('/matkul',[App\Http\Controllers\Auth\AdminController::class, 'matkul'])->name('matkul');
Route::post('/add_matkul',[App\Http\Controllers\Auth\AdminController::class, 'add_matkul'])->name('add_matkul');
Route::post('/delete_matkul',[App\Http\Controllers\Auth\AdminController::class, 'delete_matkul'])->name('delete_matkul');
Route::post('/edit_matkul',[App\Http\Controllers\Auth\AdminController::class, 'edit_matkul'])->name('edit_matkul');

Route::get('/ujian',[App\Http\Controllers\Auth\AdminController::class, 'ujian'])->name('ujian');
Route::post('/add_ujian',[App\Http\Controllers\Auth\AdminController::class, 'add_ujian'])->name('add_ujian');
Route::post('/delete_ujian',[App\Http\Controllers\Auth\AdminController::class, 'delete_ujian'])->name('delete_ujian');
Route::post('/edit_ujian',[App\Http\Controllers\Auth\AdminController::class, 'edit_ujian'])->name('edit_ujian');

Route::get('/soal',[App\Http\Controllers\Auth\AdminController::class, 'soal'])->name('soal');
Route::post('/add_soal_pg',[App\Http\Controllers\Auth\AdminController::class, 'add_soal_pg'])->name('add_soal_pg');
Route::post('/delete_soal_pg',[App\Http\Controllers\Auth\AdminController::class, 'delete_soal_pg'])->name('delete_soal_pg');
Route::post('/edit_soal_pg',[App\Http\Controllers\Auth\AdminController::class, 'edit_soal_pg'])->name('edit_soal_pg');
Route::post('/add_soal_isian',[App\Http\Controllers\Auth\AdminController::class, 'add_soal_isian'])->name('add_soal_isian');
Route::post('/delete_soal_isian',[App\Http\Controllers\Auth\AdminController::class, 'delete_soal_isian'])->name('delete_soal_isian');
Route::post('/edit_soal_isian',[App\Http\Controllers\Auth\AdminController::class, 'edit_soal_isian'])->name('edit_soal_isian');

Route::get('/pengumuman',[App\Http\Controllers\Auth\AdminController::class, 'pengumuman'])->name('pengumuman');
Route::post('/add_pengumuman',[App\Http\Controllers\Auth\AdminController::class, 'add_pengumuman'])->name('add_pengumuman');
Route::post('/delete_pengumuman',[App\Http\Controllers\Auth\AdminController::class, 'delete_pengumuman'])->name('delete_pengumuman');
Route::post('/edit_pengumuman',[App\Http\Controllers\Auth\AdminController::class, 'edit_pengumuman'])->name('edit_pengumuman');

Route::get('/tugas',[App\Http\Controllers\Auth\AdminController::class, 'tugas'])->name('tugas');
Route::post('/add_tugas',[App\Http\Controllers\Auth\AdminController::class, 'add_tugas'])->name('add_tugas');
Route::post('/delete_tugas',[App\Http\Controllers\Auth\AdminController::class, 'delete_tugas'])->name('delete_tugas');
Route::post('/edit_tugas',[App\Http\Controllers\Auth\AdminController::class, 'edit_tugas'])->name('edit_tugas');



/*USER*/
Route::get('/user',[App\Http\Controllers\Auth\UserController::class, 'index'])->name('user');
Route::post('/feedback',[App\Http\Controllers\Auth\UserController::class, 'feedback'])->name('feedback');

Route::get('/matkuls',[App\Http\Controllers\Auth\UserController::class, 'matkul'])->name('matkuls');
Route::post('/enroll_matkul',[App\Http\Controllers\Auth\UserController::class, 'enroll_matkul'])->name('enroll_matkul');
Route::post('/enroll_matkuls',[App\Http\Controllers\Auth\UserController::class, 'enroll_matkuls'])->name('enroll_matkuls');

Route::get('/ujians',[App\Http\Controllers\Auth\UserController::class, 'ujian'])->name('ujians');
Route::get('/kerjakan',[App\Http\Controllers\Auth\UserController::class, 'kerjakan'])->name('kerjakan');
Route::post('/add_soal',[App\Http\Controllers\Auth\UserController::class, 'add_soal_isian'])->name('add_hasil_kerja');

Route::get('/tugass',[App\Http\Controllers\Auth\UserController::class, 'tugas'])->name('tugass');
Route::post('/tugas_kerja',[App\Http\Controllers\Auth\UserController::class, 'tugas_kerja'])->name('tugas_kerja');

