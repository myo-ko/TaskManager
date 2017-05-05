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

Route::get('/', "HomeController@Index")->name("Home");

Route::post('/lang', "LanguageController@store")->name("LANG_CHANGE");

Route::get('/login', "Auth\LoginController@index")->name("Login");

Route::post('/login', "Auth\LoginController@login");

Route::get("/logout", "Auth\LoginController@logout")->name("Logout");

Route::group([ "prefix" => "project", "middleware" => ["auth", "web"]], function(){

    Route::get("/new", 'ProjectController@create');

    Route::post("/new", 'ProjectController@store');

    Route::get("/{id}", "ProjectController@show")->name("ProjectMilestones");

});

Route::group(["prefix" => "milestones", "middleware" => "auth", ], function(){

    Route::get("/{id}", "MilestoneController@show")->name("MilestoneTasks");

    Route::post("/store", "MilestoneController@store")->name("MilestoneStore");


});

Route::group( ["prefix" => "tasks", "middleware" => "auth", ], function(){

    Route::post("/store", "TaskController@store")->name("TaskStore");

    Route::get("/update/{id}", "TaskController@update")->name("TaskUpdate");

});
