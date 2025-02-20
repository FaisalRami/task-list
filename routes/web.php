<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;


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


Route::get('tasks' , function(){
    return view('tasks');
});

Route::POST('create' , function(){
    $task_name = $_POST['name'];
    DB::table('tasks')->insert(['name'=>$task_name]);
    return view('tasks');
});
