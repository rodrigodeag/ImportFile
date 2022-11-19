<?php

namespace App\Http\Controllers;

use App\Models\FilesModel;
use App\Models\ClientModel;
use App\Models\StoreModel;
use App\Models\TransactionModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FileController extends Controller
{
    public function index()
    {
        //$transaction = FilesModel::query()->orderBy('date')->get();

        return view('files.index')/*->with('series', $series)*/;
    }

    public function create()
    {
        return view('files.create');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $file = file_get_contents($input["file"]);
        $file = trim($file);
        $file = explode(',' , $file);
       
        foreach ($file as $val) {
            $type = substr($val, 0, 1);
            $date = substr($val, 1, 8);
            $value = substr($val, 9, 10) / 100;
            $cpf = substr($val, 19, 11);
            $card = substr($val, 30, 12);
            $hour = substr($val, 42, 6);
            $representative = substr($val, 48, 14);
            $store_name = substr($val, 62, 19);
            
            $cpf_valid = Clientmodel::where('cpf', $cpf)->first();
            if (!$cpf_valid) {
                $client = new ClientModel;
                $client->cpf = $cpf;
                $client->card = $card;
                $client->status = '1';
                $client->save();
            } else {
                $id_client = Clientmodel::where('cpf', $cpf)->first();
            }

            $store_valid = StoreModel::where('name', $store_name)
                ->and('representative', $representative)->first();
        }
        $store = new StoreModel;
        $store->name = $store_name;
        $store->representative = $representative;
        $store->save();

        $transaction = new TransactionModel;
        $transaction->id_transaction_type = $type;
        $transaction->date = $date;
        $transaction->hour = $hour;
        /*$transaction->id_client = $id_client;
        $transaction->id_store = $id_store;*/
        /*$transaction->value = $value;
        $transaction->save();*/

        return view('files.report');
    }
}
