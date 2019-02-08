<?php

namespace App\Http\Controllers;

use App\Suppliers;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web,admin');
    }

    public function index()
    {
        $suppliers = Suppliers::all();
        return view('supplier.index', compact('suppliers'));
    }
    public function create()
    {
        return view('supplier.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:15',
            'email' => 'required|email',
            'phone' => 'required|numeric',
        ]);
        $inputs = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'additional_information' => $request->info,
            'created_by' => admin()->user()->id ?? auth()->user()->id
        ];
        $user = Suppliers::create($inputs);


        session()->flash('suc', 'Supplier has been created suc');
        return redirect(surl('create'));
    }
    public function edit($id)
    {
        $suppliers = Suppliers::find($id);
        return view('supplier.edit', compact('suppliers'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:3|max:15',
            'email' => 'required|email',
            'phone' => 'required|numeric',
        ]);
        $inputs = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'additional_information' => $request->info,
            'updated_by' => admin()->user()->id ?? auth()->user()->id
        ];
        $supplier = Suppliers::find($id)->update($inputs);
        session()->flash('suc', 'Supplier has been updated suc');
        return redirect(surl());
    }

    public function show($id)
    {
        $supplier = Suppliers::find($id);
        return view('supplier.show', compact('supplier'));
    }
    public function destroy(Request $request)
    {
        $deleted = Suppliers::find($request->deletedId);
        Suppliers::find($request->deletedId)->update([
            'deleted_by' => admin()->user()->id ?? auth()->user()->id
        ]);
        $deleted->delete();

        session()->flash('suc', 'Supplier has been Deleted suc');
        return 'done';
    }

}
