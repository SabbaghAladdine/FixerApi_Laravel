<?php

namespace App\Http\Controllers;

use App\Models\Fixer;
use Illuminate\Http\Request;

class FixerController extends Controller
{
    public function index()
    {
        $fixers = Fixer::all();
        return response()->json(['data' => $fixers]);
    }

    public function show(Fixer $fixer)
    {
        return response()->json(['data' => $fixer]);
    }

    public function store(Request $request)
    {
        $fixer = Fixer::create($request->all());
        return response()->json(['data' => $fixer], 201);
    }

    public function update(Request $request, Fixer $fixer)
    {
        $fixer->update($request->all());
        return response()->json(['data' => $fixer]);
    }

    public function destroy($id)
    {
        $fixer=Fixer::Find($id);
        $fixer->delete();
        return response()->json(null, 204);
    }

    public function getFixerById($id){
        $fixer=Fixer::find($id);
        if(is_null($fixer)){
            response()->json(['message'=>'fixer introuvable'],404);
        }
        return response()->json(Fixer::find($id),200);
       }
}
