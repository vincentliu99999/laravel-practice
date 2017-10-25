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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return 'hello 你好嗎？';
});

# 選擇性參數
Route::get('/welcome/{name?}', function ($name = 'Vincent') {
    echo 'Hello '.$name.'，你好嗎？';
});

# 限制
Route::get('user/{id}/{name}', function ($id, $name) {
    echo 'Hello '.$name.'('.$id.')，你好嗎？';
})->where(['id' => '[0-9]+', 'name' => '[a-z]+']);

Route::redirect('/here', '/there', 301);

/*
Http Method
GET > POST > PUT > DELETE
*/
Route::get('/test', function () {
    echo '<h1>HTTP method: GET</h1>';
    echo '<form method="POST" action="/test">';
    echo '<input type="hidden" name="_token" value="'.csrf_token().'">';
    echo '<input type="submit">';
    echo '</form>';
});

Route::post('/test', function () {
    echo '<h1>HTTP method: POST</h1>';
    echo '<form method="POST" action="/test">';
    echo '<input type="hidden" name="_token" value="'.csrf_token().'">';
    echo '<input type="hidden" value="PUT" name="_method">';
    echo '<input type="submit">';
    echo '</form>';
});

Route::put('/test', function () {
    echo '<h1>HTTP method: PUT</h1>';
    echo '<form method="POST" action="/test">';
    echo '<input type="hidden" name="_token" value="'.csrf_token().'">';
    echo '<input type="hidden" value="DELETE" name="_method">';
    echo '<input type="submit">';
    echo '</form>';
});

Route::delete('/test', function () {
    echo '<h1>HTTP method: DELETE</h1>';
    echo '<form method="GET" action="/test">';
    echo '<input type="submit">';
    echo '</form>';
});

// by controller
Route::get('/helloLaravel', 'TestController@index');

// by view
Route::get('/helloBlade', function () {
    return view('hello')->with('name', '愛因斯坦')->with('massage', 'Where there\'s a will, there\'s a way');
});
