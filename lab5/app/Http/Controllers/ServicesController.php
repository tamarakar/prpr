<?php

namespace App\Http\Controllers;

use GuzzleHttp;

class ServicesController extends Controller
{
    public function index(){
        $client = new GuzzleHttp\Client();
        $url = "http://practice/api/v2.0/services";
        $response = $client->request("GET", $url);
        $json = $response->getBody();
        $result = json_decode($json);
        return view('services.index', ['result' => $result]);
    }

    public function create($name){
        $http = new GuzzleHttp\Client();
        $url = "http://practice/api/v2.0/services";
        $myBody['name'] = $name;
        $request = $http->post($url,  ['body'=>$myBody]);
        return $request->send();
    }

    public function update($id, $name){
        $http = new GuzzleHttp\Client();
        $url = "http://practice/api/v2.0/services/$id";
        $myBody['name'] = $name;
        $request = $http->put($url,  ['body'=>$myBody]);
        return $request->send();
    }

    public function delete($id){
        $http = new GuzzleHttp\Client();
        $url = "http://practice/api/v2.0/services/$id";
        $request = $http->delete($url);
        return $request->send();
    }
}