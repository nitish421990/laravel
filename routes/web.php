<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::view('/add-user','add-user');

Route::post('/add-user', [UserController::class,'addUser']);

Route::get('list',[UserController::class,'userList']);
//Route::view('/edit-details/{id}','edit-user');
Route::get('/edit-user/{id}',[UserController::class,'editUser']);
Route::put('/update-user/{id}',[UserController::class,'updateUser']);

Route::get('/delete-user/{id}',[UserController::class,'deleteUser']);

Route::get('search',[UserController::class,'searchUser']);
Route::post('multi-delete',[UserController::class,'multiDeleteUser']);