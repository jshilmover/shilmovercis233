<?php

use App\Models\TvMazeAPI;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

Route::get('/episodes', function (Request $request) {
    $showNumber = $request->query('showNumber', 1);

    $data = TvMazeAPI::fetch($showNumber);

    return view('episodes/index', ["episodes"=>$data]);
});