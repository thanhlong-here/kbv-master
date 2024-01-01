<?php
Route::namespace('Kbv\Controllers')->group(function () {
  Route::get('/','WelcomeController@index');
  Route::post('/','WelcomeController@login');

  Route::get('dashboard','PageController@index');
  Route::get('config-point-ref', 'MemberController@configPointRef');
  Route::post('config-point-ref/update', 'MemberController@configPointRefUpdate');

  //Report
  Route::get('report','ReportController@index');
  Route::get('report/import','ReportController@import');

  Route::post('report/export','ReportController@export');
  Route::post('report/csv','ReportController@csv');
  Route::post('report/change','ReportController@change');


  Route::post('report/search','ReportController@search');
  Route::post('report/action','ReportController@action');


  Route::get('lott','LottController@index');
  Route::get('lott/import','LottController@import');
  Route::post('lott/export','LottController@export');
  Route::post('lott/search','LottController@search');
  Route::post('lott/change','LottController@change');
  //Route::post('lott/action','LottController@action');

  //Mission
  Route::get('mission','MissionController@index');
  Route::get('mission/new','MissionController@fresh');
  Route::get('mission/id/{id}','MissionController@mission_detail');
  Route::get('mission/go/scancode','MissionController@go');

  Route::post('mission/search','MissionController@mission_search');
  Route::post('mission/action','MissionController@mission_action');
  Route::post('mission/go/scancode','MissionController@mission_scancode');

  //Mission
  Route::get('lucky','LuckyController@index');
  Route::get('lucky/new','LuckyController@fresh');
  Route::get('lucky/id/{id}','LuckyController@detail');

  Route::post('lucky/add','LuckyController@add');
  Route::post('lucky/edit','LuckyController@save');
  Route::post('lucky/search','LuckyController@search');
  Route::post('lucky/action','LuckyController@action');

  //redeems
  Route::get('redeem','RedeemController@index');
  Route::get('redeem/new','RedeemController@fresh');
  Route::get('redeem/id/{id}','RedeemController@detail');

  Route::post('redeem/add','RedeemController@add');
  Route::post('redeem/edit','RedeemController@save');
  Route::post('redeem/search','RedeemController@search');
  Route::post('redeem/action','RedeemController@action');

  //news
  Route::get('news','NewsController@index');
  Route::get('news/new','NewsController@fresh');
  Route::get('news/id/{id}','NewsController@detail');

  Route::post('news/action','NewsController@action');
  Route::post('news/add','NewsController@add');
  Route::post('news/edit','NewsController@save');
  Route::post('news/search','NewsController@search');

  //members
  Route::get('member','MemberController@index');
  Route::get('member/push/{id}','MemberController@push');
  Route::get('member/point/{id}', 'MemberController@point');
  Route::get('member/xu/{id}','MemberController@showxu');
  Route::post('member/changexu', 'MemberController@changexu');

  Route::get('member/history/{id}','MemberController@history');

  Route::get('member/notify','MemberController@noti');

  Route::get('member/tester','MemberController@tester');
  Route::get('member/info','MemberController@info');
  Route::get('member/give','MemberController@give');

  Route::post('member/export','MemberController@export');
  Route::post('member/tester','MemberController@login');
  Route::post('member/sms/login','MemberController@sms_login');
  Route::post('member/search','MemberController@search');
  Route::post('member/change','MemberController@change');
  Route::post('member/action','MemberController@action');

  Route::post('member/send','MemberController@send');
  Route::post('member/push','MemberController@sendAll');
  Route::post('member/up','MemberController@up');

  //admin
  Route::get('admins','AdminController@index');

  Route::post('admins/add','AdminController@add');
  Route::post('admins/action','AdminController@action');
  Route::post('admins/changepass','AdminController@changepass');
  //setting
  Route::get('setting','PageController@setting');
  Route::post('config','PageController@config');

  //screen (028) 3973 2222
  Route::get('screen/mission','ScreenController@mission');
  Route::get('screen/messenger','ScreenController@messenger');

  Route::get('screen/game','ScreenController@game');
  Route::get('screen/act','ScreenController@act');
  Route::get('screen/game/lottery/{id}','ScreenController@lottery');

  Route::get('screen/home','ScreenController@home');
  Route::get('screen/menu','ScreenController@ext');

  Route::get('screen/news','ScreenController@news');
  Route::get('screen/news/{id}','ScreenController@detail');
  Route::get('screen/welcome','ScreenController@welcome');
  Route::get('redeem-xu', 'ScreenController@redeemXuAdmin');
  Route::post('redeem-xu/action', 'ScreenController@redeemXuAdminAction');

  Route::get('screen/redeem','ScreenController@redeems');
  Route::get('screen/contact','ScreenController@contact');
  Route::get('screen/policy','ScreenController@policy');
  Route::get('screen/info','ScreenController@info');
  Route::get('screen/history','ScreenController@history');

  Route::get('screen/history-xu','ScreenController@historyXu');

  Route::get('screen/luckies','ScreenController@luckies');
  Route::get('screen/reward','ScreenController@reward');

  Route::post('screen/update','ScreenController@update');
  Route::post('screen/lucky','ScreenController@lucky');
  Route::post('screen/send','ScreenController@send');
  Route::get('screen/info','MemberController@showInfo');
  Route::get('screen/member/point/{step}/{member_id}', 'MemberController@showPointCharge');
  Route::post('screen/member/point','MemberController@showPointChargePost');
  Route::get('screen/member/point','MemberController@showPointChargePost');

  Route::get('screen/catalog','ScreenController@catalog');
  Route::get('screen/cata','ScreenController@cata');
//
  Route::get('catalogue', 'CatalogueController@index');
  Route::get('catalogue/new', 'CatalogueController@fresh');
  Route::post('catalogue/add', 'CatalogueController@add');
  Route::get('catalogue/id/{id}', 'CatalogueController@detail');
  Route::post('catalogue/edit', 'CatalogueController@save');
  Route::post('catalogue/search', 'CatalogueController@search');
  Route::post('catalogue/action', 'CatalogueController@action');

  Route::get('logout',function(){
      session()->flush();
      return redirect('/');
  });

  Route::get('screen/post', function(){
      return view('ex.kbv.screen.post');
  });

});


?>
