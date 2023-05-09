<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $admins = Admin::all();
        return response()->json(['data' => $admins]);
    }

    public function show(Admin $admin)
    {
        return response()->json(['data' => $admin]);
    }

    public function store(Request $request)
    {
        $admin = Admin::create($request->all());
        return response()->json(['data' => $admin], 201);
    }

    public function update(Request $request, Admin $admin)
    {
        $admin->update($request->all());
        return response()->json(['data' => $admin]);
    }
    public function destroy(int $id)
    {
        $admin=Admin::find($id);
        if(is_null($admin)){
            response()->json(['message'=>'admin introuvable'],404);
        }
        $admin->delete();
        return response()->json(['message'=>'le admin  est  supprimer'],204);
    }
}
