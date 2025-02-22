<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;



Route::get('/', function () {
    return view('welcome');
});


Route::get('/about' , function(){

    $name='Faisal Rami Al-Zeer';
    $departments = [
        '01' => 'Computer',
        '02' => 'Laptop',
        '03' => 'Phone',
    ];
    return view('about' , compact('name' , 'departments'));
});


Route::post('/about' , function(){
    $name=$_POST['name'];
    $departments = [
        '01' => 'Computer',
        '02' => 'Laptop',
        '03' => 'Phone',
    ];
    return view('about' , compact('name' , 'departments'));
});


Route::get('tasks' , [TaskController::class, 'index']);

Route::POST('create' , [TaskController::class, 'create']);

Route::POST('delete/{id}' , [TaskController::class, 'destroy']);

Route::POST('edit/{id}' , [TaskController::class, 'edit']);

Route::POST('update' , [TaskController::class, 'update']);



Route::get('app' ,function(){
    return view('layouts.app');
});



Route::get('users' , [UserController::class , 'index']);

Route::POST('adduser' , [UserController::class , 'adduser']);

Route::POST('deleteuser/{id}' , [UserController::class , 'destroyuser']);

Route::POST('edituser/{id}' , [UserController::class , 'edituser']);

Route::POST('updateuser' , [UserController::class , 'updateuser']);
