<?php

namespace App\Http\Controllers;

use App\Request;

class RequestController extends Controller
{
    public function Get(){
        return response()->json(Request::with('client', 'service')->get(), 200);
    }

    public function Create(){
        Request::create([
            'client_id' => request()->client_id,
            'service_id' => request()->service_id
        ]);
        return response()->json(['result' => 'Запись добавлена'], 201);
    }

    public function Update($id){
        $object = Request::find($id);
        if(!$object && $object == null)
            return response()->json(['result' => 'Запись не найдена'], 404);
        $object->client_id = request()->client_id;
        $object->service_id = request()->service_id;
        $object->save();
        return response()->json(['result' => 'Запись обновлена'], 200);
    }

    public function Delete($id){
        $object = Request::find($id);
        if(!$object && $object == null)
            return response()->json(['result' => 'Запись не найдена'], 404);
        $object->delete();
        return response()->json(['result' => 'Запись удалена'], 200);
    }
}