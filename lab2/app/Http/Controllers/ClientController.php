<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function Get(){
        return response()->json(Client::all(), 200);
    }

    public function Create(Request $request){
        Client::create(['name' => $request->name]);
        return response()->json(['result' => 'Запись добавлена'], 201);
    }

    public function Update($id, Request $request){
        $object = Client::find($id);
        if(!$object && $object == null)
            return response()->json(['result' => 'Запись не найдена'], 404);
        $object->name = $request->name;
        $object->save();
        return response()->json(['result' => 'Запись обновлена'], 200);
    }

    public function Delete($id){
        $object = Client::find($id);
        if(!$object && $object == null)
            return response()->json(['result' => 'Запись не найдена'], 404);
        $object->delete();
        return response()->json(['result' => 'Запись удалена'], 200);
    }
}