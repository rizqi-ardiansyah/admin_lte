<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TransactionRequest;

class TransactionController extends Controller {

    public function createTrans(TransactionRequest $request){
        $request->validated();
        $transaction = new Transaction;
        $transaction->customer_id = $request->customer_id;
        $transaction->id_technician = $request->id_technician;
        $transaction->level = $request->level;
        $transaction->price = $request->price;
        $transaction->status = 'Order';
        $transaction->desc = $request->desc;
        $transaction->save();

        return response()->json(['message' => 'Successfully create transaction']);
    }

    public function showAll(){
        $data = Transaction::select('trans_id', 'level',
        'desc', 'price', 'status', 'customer_id', 'id_technician', 'c.cust_id', 'c.user_id',
        't.technician_id', 't.user_id', 'u.name AS user_name', 'u2.name AS tech_name')
        ->join('customer AS c', 'transaction.customer_id', '=', 'c.cust_id')
        ->join('technician AS t', 'transaction.id_technician', '=', 't.technician_id')
        ->join('users AS u', 'c.user_id', '=', 'u.id')
        ->join('users AS u2', 't.user_id', '=', 'u2.id')
        ->get();

        // ->with('customer:cust_id,user_id')
        // ->with('technician:technician_id,user_id')

        return response()->json(['data' => $data]);
    }

    public function showTrans($id){
        $data = Transaction::select('trans_id', 'level',
        'desc', 'price', 'status', 'customer_id', 'id_technician', 'c.cust_id', 'c.user_id',
        't.technician_id', 't.user_id', 'u.name AS user_name', 'u2.name AS tech_name')
        ->join('customer AS c', 'transaction.customer_id', '=', 'c.cust_id')
        ->join('technician AS t', 'transaction.id_technician', '=', 't.technician_id')
        ->join('users AS u', 'c.user_id', '=', 'u.id')
        ->join('users AS u2', 't.user_id', '=', 'u2.id')
        ->where('trans_id', $id)->first();

        // $data = Transaction::select('trans_id', 'level',
        // 'desc', 'price', 'status', 'customer_id', 'id_technician')
        // ->with('customer:cust_id,user_id')
        // ->with('technician:technician_id,user_id')
        // ->where('trans_id', $id)->first();

        return response()->json(['data' => $data]);
    }

    public function checkOrder($id){
        $data = Transaction::select('trans_id', 'level',
        'desc', 'price', 'status', 'customer_id', 'id_technician', 'c.cust_id', 'c.user_id',
        't.technician_id', 't.user_id', 'u.name AS user_name', 'u2.name AS tech_name')
        ->join('customer AS c', 'transaction.customer_id', '=', 'c.cust_id')
        ->join('technician AS t', 'transaction.id_technician', '=', 't.technician_id')
        ->join('users AS u', 'c.user_id', '=', 'u.id')
        ->join('users AS u2', 't.user_id', '=', 'u2.id')
        ->where('id_technician', $id)->get();

        // $data = Transaction::select('trans_id', 'level',
        // 'desc', 'price', 'status', 'customer_id', 'id_technician')
        // ->with('customer:cust_id,user_id')
        // ->with('technician:technician_id,user_id')
        // ->where('trans_id', $id)->first();

        return response()->json(['data' => $data]);
    }

    public function destroy($id){
        $cust = Transaction::where('trans_id', '=', $id)->delete();
        return response()->json(['message' => 'Succesfully delete data']);
    }

    public function updateTrans(TransactionRequest $request, $id){
        $request->validated();
        $data = Transaction::where('id_technician', $id)->first();

        $data->level = $request->level;
        $data->desc = $request->desc;
        $data->price = $request->price;
        $data->status = $request->status;
        $data->update();
        return response()->json(["Message"   => "Transaction has successfully update"]);
    }
}
