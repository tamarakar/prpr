<?php

Route::get('/v2/clients', 'ClientController@Get');
Route::get('/v2/services', 'ServiceController@Get');
Route::get('/v2/requests', 'RequestController@Get');

Route::post('/v2/clients', 'ClientController@Create');
Route::post('/v2/services', 'ServiceController@Create');
Route::post('/v2/requests', 'RequestController@Create');

Route::put('/v2/clients/{id}', 'ClientController@Update');
Route::put('/v2/services/{id}', 'ServiceController@Update');
Route::put('/v2/requests/{id}', 'RequestController@Update');

Route::delete('/v2/clients/{id}', 'ClientController@Delete');
Route::delete('/v2/services/{id}', 'ServiceController@Delete');
Route::delete('/v2/requests/{id}', 'RequestController@Delete');
