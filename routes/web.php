<?php
// Web Routes

Route::get('/', function () {
    return view('welcome');
});

Route::get('invite', 'Slack\InviteController@getIndex');
Route::post('invite', 'Slack\InviteController@postIndex');
