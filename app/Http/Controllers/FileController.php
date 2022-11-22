<?php

namespace App\Http\Controllers;

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
        $file = file($input["file"]);

        foreach ($file as $line => $values) {
            $line = trim($values);
	        $val = explode(',', $line);

            $type = substr($val[0], 0, 1);
            $date = substr($val[0], 1, 8);
            $value = substr($val[0], 9, 10) / 100;
            $cpf = substr($val[0], 19, 11);
            $card = substr($val[0], 30, 12);
            $hour = substr($val[0], 42, 6);
            $representative = substr($val[0], 48, 14);
            $store_name = substr($val[0], 62, 19);
            
            $cpf_valid = Clientmodel::where('cpf', $cpf)->first();
            if (!$cpf_valid) {
                $client = new ClientModel;
                $client->cpf = $cpf;
                $client->card = $card;
                $client->status = '1';
                $client->save();
            } else {
                $id_client = $cpf_valid->id;
            }

            $store_valid = StoreModel::where('name', $store_name)
                ->where('representative', $representative)->first();
            if (!$store_valid) {
                $store = new StoreModel;
                $store->name = $store_name;
                $store->representative = $representative;
                $store->save();
            } else {
                $id_store = $store_valid->id;
            }
            
            $transaction = new TransactionModel;
            $transaction->id_transaction_type = $type;
            $transaction->date = $date;
            $transaction->hour = $hour;
            $transaction->id_client = $id_client;
            $transaction->id_store = $id_store;
            $transaction->value = $value;
            $transaction->save();
        }
        return redirect('files/report');
    }

    public function report(Request $request){
        $report = TransactionModel::select('transaction.id as id_transaction', 'transaction.hour', 'transaction.date', 'client.cpf',
            'client.card', 'store.name', 'store.representative', 'transaction_type.nature', 'transaction.value',
            'transaction_type.signal', 'store.id as id_store', TransactionModel::raw("CONCAT(transaction_type.signal, transaction.value) as valor"))
            ->join('client', 'client.id', '=', 'transaction.id_client')
            ->join('store', 'store.id', '=', 'transaction.id_client')
            ->join('transaction_type', 'transaction_type.id', '=', 'transaction.id_transaction_type')
            ->orderByRaw('store.id')
            ->get();

        return view('files.report')->with(['report' => $report]);
    }

    public function apiReportAllStore(Request $request){
        $report = TransactionModel::select('transaction.id as id_transaction', 'transaction.hour', 'transaction.date', 'client.cpf',
            'client.card', 'store.name', 'store.representative', 'transaction_type.nature', 'transaction.value',
            'transaction_type.signal', 'store.id as id_store', TransactionModel::raw("CONCAT(transaction_type.signal, transaction.value) as valor"))
            ->join('client', 'client.id', '=', 'transaction.id_client')
            ->join('store', 'store.id', '=', 'transaction.id_client')
            ->join('transaction_type', 'transaction_type.id', '=', 'transaction.id_transaction_type')
            ->orderByRaw('store.id')
            ->get();

        return response($report, 200); //, '_REQUEST' => $_REQUEST
    }

    public function apiReportByStoreId(Request $request, $id_store){
        $report = TransactionModel::select('transaction.id as id_transaction', 'transaction.hour', 'transaction.date', 'client.cpf',
            'client.card', 'store.name', 'store.representative', 'transaction_type.nature', 'transaction.value',
            'transaction_type.signal', 'store.id as id_store', TransactionModel::raw("CONCAT(transaction_type.signal, transaction.value) as valor"))
            ->join('client', 'client.id', '=', 'transaction.id_client')
            ->join('store', 'store.id', '=', 'transaction.id_client')
            ->join('transaction_type', 'transaction_type.id', '=', 'transaction.id_transaction_type')
            ->where('store.id', $id_store)
            ->orderByRaw('store.id')
            ->get();

        return response($report, 200); //, '_REQUEST' => $_REQUEST
    }

    public function apiReportAllClient(Request $request){
        $report = TransactionModel::select('transaction.id as id_transaction', 'transaction.hour', 'transaction.date', 'client.cpf',
            'client.card', 'store.name', 'store.representative', 'transaction_type.nature', 'transaction.value',
            'transaction_type.signal', 'store.id as id_store', TransactionModel::raw("CONCAT(transaction_type.signal, transaction.value) as valor"))
            ->join('client', 'client.id', '=', 'transaction.id_client')
            ->join('store', 'store.id', '=', 'transaction.id_client')
            ->join('transaction_type', 'transaction_type.id', '=', 'transaction.id_transaction_type')
            ->orderByRaw('client.id')
            ->get();

        return response($report, 200); //, '_REQUEST' => $_REQUEST
    }

    public function apiReportByClientId(Request $request, $id_client){
        $report = TransactionModel::select('transaction.id as id_transaction', 'transaction.hour', 'transaction.date', 'client.cpf',
            'client.card', 'store.name', 'store.representative', 'transaction_type.nature', 'transaction.value',
            'transaction_type.signal', 'store.id as id_store', TransactionModel::raw("CONCAT(transaction_type.signal, transaction.value) as valor"))
            ->join('client', 'client.id', '=', 'transaction.id_client')
            ->join('store', 'store.id', '=', 'transaction.id_client')
            ->join('transaction_type', 'transaction_type.id', '=', 'transaction.id_transaction_type')
            ->where('client.id', $id_client)
            ->orderByRaw('client.id')
            ->get();

        return response($report, 200); //, '_REQUEST' => $_REQUEST
    }
}
