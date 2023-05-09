<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        return response()->json(['data' => $clients]);
    }

    public function show(Client $client)
    {
        return response()->json(['data' => $client]);
    }

    public function store(Request $request)
    {
        $client = Client::create($request->all());
        return response()->json(['data' => $client], 201);
    }

    public function update(Request $request, Client $client)
    {
        $client->update($request->all());
        return response()->json(['data' => $client]);
    }
    public function destroy(int $id)
    {
        $client=Client::find($id);
        if(is_null($client)){
            response()->json(['message'=>'client introuvable'],404);
        }
        $client->delete();
        return response()->json(['message'=>'le client  est  supprimer'],204);
    }
}
