<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function Get(){
        return response()->json(Service::all(), 200);
    }

    public function Create(Request $request){
        Service::create(['name' => $request->name]);
        return response()->json(['result' => 'Запись добавлена'], 201);
    }

    public function Update($id, Request $request){
        $object = Service::find($id);
        if(!$object && $object == null)
            return response()->json(['result' => 'Запись не найдена'], 404);
        $object->name = $request->name;
        $object->save();
        return response()->json(['result' => 'Запись обновлена'], 200);
    }

    public function Delete($id){
        $object = Service::find($id);
        if(!$object && $object == null)
            return response()->json(['result' => 'Запись не найдена'], 404);
        $object->delete();
        return response()->json(['result' => 'Запись удалена'], 200);
    }
}