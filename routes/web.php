<?php

use Illuminate\Support\Facades\Route;
use App\Services\Twitter ;


//app()->bind('Example',function (){
//    return new App\Example();
//});

Route::get('/', function () {
   // dd($twitter);
     return view('welcome');
});
Route::resource('/project','userController');
Route::post('/project/{project}/tasks','TasksProjectController@store' );
Route::patch('/tasks/{task}','TasksProjectController@update');
Route::delete('/tasks/{task}','TasksProjectController@destroy');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');





