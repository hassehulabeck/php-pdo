<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('index');
});
Route::get('/hello/{name?}', function ($name = null) {
    return view('hello', ['name' => $name]);
});
Route::get('/people', function () {
    return view(
        'people',
        [
            'persons' =>
            [
                ["name" => "Rune", "age" => 34],
                ["name" => "Per", "age" => 42],
                ["name" => "Jonna", "age" => 31]
            ]
        ]
    );
});
