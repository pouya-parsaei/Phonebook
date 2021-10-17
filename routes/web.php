<?php

use App\Core\Routing\Route;
Route::get('/','HomeController@index');
Route::post('/contact/add','ContactController@add');
Route::get('/contact/delete/{id}','ContactController@delete');
// Route::get('/panel','PanelController@index',[PanelController::class]);
// Route::get('/post/{slug}','PostController@single');
// Route::get('/post/{slug}/comment/{cid}','PostController@comment');
// Route::get('/product/{name}/reviews','ProductController@reviews');
// Route::get('/todo/list','TodoController@list',[BlockFirefox::class,BlockIE::class]);
// Route::get('/blockchrome','TodoController@list',[BlockChrome::class]);


// Route::add(['post','ge
// t'],'/a',function(){
//     echo 'welcome';
// });

// Route::get('/b',function(){
//     view('archive.articles');
// });
// Route::get('/c',function(){
//     echo 'from get /c';
// });
// Route::get('/d',function(){
//     echo 'from get /d';
// });

