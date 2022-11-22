<?php

namespace App\Http\Controllers;

use App\Models\StoreModel;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function getAllStore(Request $request)
    {
        $store = StoreModel::where('status', 1)->get()
        ->toJson(JSON_UNESCAPED_UNICODE);
        return response($store, 200);
    }

    public function getStoreById(Request $request, $id)
    {
        $store = StoreModel::find($id);
        return response($store, 200);
    }
}
