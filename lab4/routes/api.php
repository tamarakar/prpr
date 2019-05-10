<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::get('/v2.0/modifiedString', function (){
    $client = new GuzzleHttp\Client();
    $url = 'http://www.mocky.io/v2/5c7db5e13100005a00375fda';
    $response = $client->request(request()->getMethod(), $url);
    $json = $response->getBody();
    $string = json_decode($json)->result;
    $string = str_replace(' ', '_', $string);
    return response()->json([
        'url' => request()->getUri(),
        'response' => ['result' => $string],
        'method' => request()->getMethod()
    ], 200);
});
