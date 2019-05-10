<?php

namespace App\Http\Controllers;

use GuzzleHttp;

class ClientsController extends Controller
{
    public function index(){
        $client = new GuzzleHttp\Client();
        $url = "http://practice/api/v2.0/clients";
        $response = $client->request("GET", $url);
        $json = $response->getBody();
        $result = json_decode($json);
        return view('clients.index', ['result' => $result]);
    }

    public function create($name){
        $http = new GuzzleHttp\Client();
        $url = "http://practice/api/v2.0/clients";
        $myBody['name'] = $name;
        $request = $http->post($url,  ['body'=>$myBody]);
        return $request->send();
    }

    public function update($id, $name){
        $http = new GuzzleHttp\Client();
        $url = "http://practice/api/v2.0/clients/$id";
        $myBody['name'] = $name;
        $request = $http->put($url,  ['body'=>$myBody]);
        return $request->send();
    }

    public function delete($id){
        $http = new GuzzleHttp\Client();
        $url = "http://practice/api/v2.0/clients/$id";
        $request = $http->delete($url);
        return $request->send();
    }
}