<?php

namespace App\Http\Controllers;

use App\Item;
use App\Suppliers;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $items = Item::all();
        return view('item.index',compact('items'));
    }

    public function create()
    {
        $suppliers = Suppliers::all();
        return view('item.create', compact('suppliers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:15',
            'type' => 'required',
            'supplier_id' => 'required',
        ]);
        $inputs = [
            'name' => $request->name,
            'type' => $request->type,
            'supplier_id' => $request->supplier_id,
            'created_by' => admin()->user()->id ?? auth()->user()->id
        ];
        $user = Item::create($inputs);
        session()->flash('suc', 'Item has been created suc');
        return redirect(iurl('create'));
    }

    public function edit(Item $item)
    {
        $suppliers = Suppliers::all();
        return view('item.edit')->with([
            'suppliers' => $suppliers,
            'item' => $item
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:3|max:15',
            'type' => 'required',
            'supplier_id' => 'required',
        ]);
        $inputs = [
            'name' => $request->name,
            'type' => $request->type,
            'supplier_id' => $request->supplier_id,
            'updated_by' => admin()->user()->id ?? auth()->user()->id
        ];
        $item = Item::find($id)->update($inputs);
        session()->flash('suc', 'Item has been updated suc');
        return redirect(iurl());
    }

    public function destroy(Request $request)
    {
        $deleted = Item::find($request->deletedId);
        Item::find($request->deletedId)->update([
            'deleted_by' => admin()->user()->id ?? auth()->user()->id
        ]);
        $deleted->delete();

        session()->flash('suc', 'Item has been Deleted suc');
        return 'done';
    }
}
