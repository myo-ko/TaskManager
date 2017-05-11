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

Route::post('/lang', "LanguageController@store")->name("LANG_CHANGE");

Route::get('/login', "Auth\LoginController@index")->name("Login");

Route::post('/login', "Auth\LoginController@login");

Route::get("/logout", "Auth\LoginController@logout")->name("Logout");

Route::get('/', "HomeController@Index")->name("Home")->middleware("auth");

Route::group([ "prefix" => "project", "middleware" => ["auth", "web"]], function(){

    Route::get("/new", 'ProjectController@create')->name("NewProject");

    Route::post("/new", 'ProjectController@store');

    Route::get("/edit/{id}", "ProjectController@edit")->name("EditProject");

    Route::post("/edit/{id}", "ProjectController@update")->name("UpdateProject");

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

Route::group(["prefix" => "user", "middleware" => ["auth"],], function()
{
    Route::get("/{id}", "UserController@show")->name("ShowUser");

    Route::post("/update/{id}", "UserController@update")->name("UpdateUser");

});
