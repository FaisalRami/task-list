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
    $tasks = DB::table('tasks')->get();
    return view('tasks' , compact('tasks'));
});

Route::POST('create' , function(){
    $task_name = $_POST['name'];
    DB::table('tasks')->insert(['name'=>$task_name]);
    return redirect()->back();
});

Route::POST('delete/{id}' , function($id){
    DB::table('tasks')->where('id' , $id)->delete();
    return redirect()->back();
});

Route::POST('edit/{id}' , function($id){
    $task = DB::table('tasks')->where('id' , $id)->first();
    $tasks = DB::table('tasks')->get();
    return view('tasks' , compact( 'task' ,'tasks'));
});

Route::POST('update' , function(){
    $id = $_POST['id'];
    DB::table('tasks')->where('id' , $id)->update(['name'=>$_POST['name']]);
    return redirect('tasks');
});
