<?php

namespace App\Http\Controllers;

use App\Models\ClientModel;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function getAllClient(Request $request)
    {
        $client = ClientModel::where('status', 1)->get()
        ->toJson(JSON_UNESCAPED_UNICODE);
        return response($client, 200);
    }

    public function getClientById(Request $request, $id)
    {
        $client = ClientModel::find($id);
        return response($client, 200);
    }
}
