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

$dm = config('app.url');

include_once 'web/deep.php';

include_once 'web/root.php';

include_once 'web/iss.php';



// Route::get('/', function () {
//     return view('screen.home');
// })->name('welcome');
