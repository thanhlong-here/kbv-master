<?php

Route::domain( 'ex.'.$dm )->group(function () {
  Route::get('/','Ex\WelcomeController@index');
  Route::post('/','Ex\WelcomeController@login');
  Route::get('/{page}','Ex\PageController@index');
});

$routes = __DIR__.'/ex/*.php';
foreach (glob($routes) as $filename) {
    include_once $filename;
}
?>
