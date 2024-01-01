<?php

Route::domain( 'do.'.$dm )->group(function () {
    Route::get('/', function () {
          return view('root.dashboard');
    });

    //Issuer
    Route::group(['prefix' => 'issuer'], function () {
        $p  = 'Root\IssuerController@';

        //Get
        Route::get('/',    $p.'index' );
        Route::get('/new', $p.'fresh'   );
        Route::get('/{id}',$p.'detail');

        //Post
        Route::post('/add',   $p.'add' );
        Route::post('/edit',  $p.'edit');
        Route::post('/del',   $p.'del' );
    });

    //FreeVoucher
    Route::group(['prefix' => 'freevoucher'], function () {
        $p  = 'Root\FreevoucherController@';
        Route::get('/',     $p.'show' );
    });

    //Web
    Route::group(['prefix' => 'web'], function () {
        $p  = 'Root\WebController@';
        Route::get('/',     $p.'show' );
    });

    //Admin
    Route::group(['prefix' => 'admin'], function () {
        $p  = 'Root\AdminController@';
        Route::get('/',     $p.'show' );
    });

    //User
    Route::group(['prefix' => 'user'], function () {
        $p  = 'Root\UserController@';
        Route::get('/',     $p.'show' );
    });


    //Role
    Route::group(['prefix' => 'role'], function () {
        $p  = 'Root\RoleController@';
        Route::get('/',     $p.'show' );
    });

    //Area
    Route::group(['prefix' => 'area'], function () {
        $p  = 'Root\AreaController@';
        Route::get('/',     $p.'show' );
    });

    //Group
    Route::group(['prefix' => 'group'], function () {
        $p  = 'Root\GroupController@';
        Route::get('/',     $p.'show' );
    });

    //Policy
    Route::group(['prefix' => 'policy'], function () {
        $p  = 'Root\PolicyController@';
        Route::get('/',     $p.'show' );
    });


});

?>
