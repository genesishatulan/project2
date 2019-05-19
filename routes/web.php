<?php

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

// use App\Services\Twitter;

Route::get('/', function () {
    // return session('foobar', 'A Default');
    // session(['name' => 'JohnDoe']);
    return view('welcome');
});

Route::resource('projects', 'ProjectsController');
// Route::resource('projects', 'ProjectsController')->middleware('can:update,project');

Route::post('/projects/{project}/tasks', 'ProjectTasksController@store');
Route::patch('/tasks/{task}', 'ProjectTasksController@update');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::post('/completed-tasks/{task}', 'CompletedTasksController@store');
// Route::delete('/completed-tasks/{task}', 'CompletedTasksController@destroy');
