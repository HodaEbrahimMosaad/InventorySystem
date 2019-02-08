<?php

namespace App\Http\Controllers;

use App\Item;
use App\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web,admin');
    }

    public function index()
    {
        $trans = Transaction::all();
        return view('trans.index')->with([
            'trans' => $trans,
        ]);
    }

    public function create()
    {
        $items = Item::all();
        return view('trans.create')->with([
            'items' => $items
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|min:3',
            'item_id' => 'required',
            'amount' => 'required',
        ]);
        $inputs = [
            'type' => $request->type,
            'item_id' => $request->item_id,
            'amount' => $request->amount,
            'notes' => $request->notes,
            'created_by' => admin()->user()->id ?? auth()->user()->id
        ];
        $tran = Transaction::create($inputs);


        session()->flash('suc', 'Transaction has been created suc');
        return redirect(turl('create'));
    }

    public function edit(Transaction $transaction)
    {
        $items = Item::all();
        return view('trans.edit')->with([
            'items' => $items,
            'transaction' => $transaction
        ]);
    }
    public function update(Request $request,$id)
    {
        $request->validate([
            'type' => 'required|min:3',
            'item_id' => 'required',
            'amount' => 'required',
        ]);
        $inputs = [
            'type' => $request->type,
            'item_id' => $request->item_id,
            'amount' => $request->amount,
            'notes' => $request->notes,
            'updated_by' => admin()->user()->id ?? auth()->user()->id
        ];
        $tran = Transaction::find($id)->update($inputs);


        session()->flash('suc', 'Transaction has been updated suc');
        return redirect(turl());
    }

    public function show(Transaction $transaction)
    {
        return view('trans.show', compact('transaction'));
    }

    public function destroy(Request $request)
    {
        $deleted = Transaction::find($request->deletedId);
        Transaction::find($request->deletedId)->update([
            'deleted_by' => admin()->user()->id ?? auth()->user()->id
        ]);
        $deleted->delete();

        session()->flash('suc', 'Transaction has been Deleted suc');
        return 'done';
    }
}
