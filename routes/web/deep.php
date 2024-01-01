<?php
Route::domain( 'deep.'.$dm )->group(function () {
    Route::get('/', function () {
          return view('deep.login');
    });

    //Page Domains
    Route::group(['prefix' => 'domain'], function () {
        $p  = 'Deep\DomainController@';

        Route::get('/',     $p.'index' );
        Route::get('/new',  $p.'fresh' );

        Route::post('/add', $p.'add'  );
        Route::post('/edit',$p.'edit' );
        Route::post('/del', $p.'del'  );
    });

    //Page Countries
    Route::group(['prefix' => 'country'], function () {
        $p  = 'Deep\CountryController@';

        Route::get('/',           $p.'index');
        Route::get('/{country}',  $p.'cities');

        Route::post('/',  $p.'sync' );
    });

    //Groups
    Route::group(['prefix' => 'group'], function () {
        $p  = 'Deep\GroupController@';

        Route::get('/',          $p.'index');
        Route::get('/{parent}',  $p.'groups');

        Route::post('/add', $p.'add'  );
        Route::post('/edit',$p.'edit' );
        Route::post('/del', $p.'del'  );
    });

});

?>
