<?php

Route::domain( 'is.'.$dm )->group(function () {

    Route::get('/','Iss\WelcomeController@index');
    Route::post('/','Iss\WelcomeController@login');

    Route::get('/dashboard','Iss\DashboardController@index');
    Route::get('/logout',function(){
        session()->flush();
        return redirect('/');
    });


    //Begin message
    Route::group(['prefix' => 'message/'], function () {
        $p  = 'Iss\MessageController@';

        //Get
        Route::get('/',     $p.'index');
        Route::get('/new',  $p.'fresh');

        Route::get('/detail/{mid}',$p.'detail');

        //Post
        Route::post('/add',   $p.'add' );
        Route::post('/edit',  $p.'edit');
        Route::post('/del',   $p.'del' );
    });

    //Begin member
    Route::group(['prefix' => 'member/'], function () {
        $p  = 'Iss\MemberController@';

        //Get
        Route::get('/',     $p.'index'   );
        Route::get('/new',  $p.'fresh');
        Route::get('/id',   $p.'detail'  );

        //Post
        Route::post('/add',   $p.'add' );
        Route::post('/edit',  $p.'edit');
        Route::post('/del',   $p.'del' );
    });

    //Begin Activity
    Route::group(['prefix' => 'promotion/'], function () {
        $p  = 'Iss\PromotionController@';

        //Get
        Route::get('/',     $p.'index'   );
        Route::get('/new',  $p.'fresh');
        Route::get('/id',   $p.'detail'  );

        //Post
        Route::post('/add',   $p.'add' );
        Route::post('/edit',  $p.'edit');
        Route::post('/del',   $p.'del' );
    });


    Route::group(['prefix' => 'upgrade'], function () {
        $p  = 'Iss\UpgradeController@';

        //Get
        Route::get('/',     $p.'index'   );
        Route::get('/new',  $p.'fresh');
        Route::get('/detail/{id}',  $p.'detail'  );

        //Post
        Route::post('/add',   $p.'add' );
        Route::post('/edit',  $p.'edit');
        Route::post('/del',   $p.'del' );
    });

    Route::group(['prefix' => 'reward'], function () {
        $p  = 'Iss\RewardController@';

        //Get
        Route::get('/',     $p.'index'   );
        Route::get('/new',  $p.'fresh');
        Route::get('/id',   $p.'detail'  );

        //Post
        Route::post('/add',   $p.'add' );
        Route::post('/edit',  $p.'edit');
        Route::post('/del',   $p.'del' );
    });


    Route::group(['prefix' => 'redeem'], function () {
        $p  = 'Iss\RedeemController@';

        //Get
        Route::get('/',     $p.'index'   );
        Route::get('/new',  $p.'fresh');
        Route::get('/id',   $p.'detail'  );

        //Post
        Route::post('/add',   $p.'add' );
        Route::post('/edit',  $p.'edit');
        Route::post('/del',   $p.'del' );
    });

    //Begin Mess
    Route::group(['prefix' => 'message'], function () {
        $p  = 'Iss\MessageController@';

        //Get
        Route::get('/',     $p.'index'   );
        Route::get('/new',  $p.'fresh');
        Route::get('/id',   $p.'detail'  );

        //Post
        Route::post('/add',   $p.'add' );
        Route::post('/edit',  $p.'edit');
        Route::post('/del',   $p.'del' );
    });

});

?>
