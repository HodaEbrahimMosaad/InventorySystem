<?php

namespace App\Http\Controllers;

use App\Inventory;
use App\InventoryManager;
use App\User;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use League\Fractal\Manager;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inventories = Inventory::all();
        return view('inventory.index')->with([
            'inventories' => $inventories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $managers = User::get_managers();
        return view('inventory.create', compact('managers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:15',
            'description' => 'required|min:10|max:100',
            'manager_id' => 'required'
        ]);

        $inputs = [
            'name' => $request->name,
            'description' => $request->description,
            'manager_id' => $request->manager_id,
            'created_by' => admin()->user()->id
        ];
        //return $inputs;
        Inventory::create($inputs);
        session()->flash('suc', 'Inventory has been created suc');
        return redirect(aiurl('create'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Inventory $inventory)
    {

        return view('inventory.show', compact('inventory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $inventory = Inventory::find($_POST['inventory_id']);
        $managers = User::get_managers();
        $result = "<form>";
        $result .= "<label class='control-label'>Name</label>";
        $result .= "<input id='name' value=\"$inventory->name\" type=\"text\" required class=\"form-control\" name=\"name\">";
        $result .= "<input id='id' value=\"$inventory->id\" type=\"hidden\"  class=\"form-control\" name=\"id\">";
        $result .= "<label class='control-label'>Description</label>";
        $result .= "<textarea id='description' class=\"form-control\" required name=\"description\">$inventory->description</textarea>";
        $result .= "<label class='control-label'>Manager</label>";
        $result .= "<select id='manager' class=\"form-control\">";
        $result .= "<option value=''></option>";
        foreach ($managers as $manager) {
            $result .= "<option value=\"$manager->id\"";
            if ($manager->id == $inventory->manager->id) {
                $result .= " selected ";
            }
            $result .= ">$manager->name</option>";
        }
        $result .= "</select>";
        $result .= "</form>";
        return $result;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try {
            $res = $request->validate([
                'name' => 'required|min:3|max:15',
                'description' => 'required|min:10|max:100',
            ]);


            $inputs = [
                'name' => $request->name,
                'description' => $request->description,
                'manager_id' => $request->manager,
                'updated_by' => admin()->user()->id
            ];
            $inventory = Inventory::where('id', $request->id)->update($inputs);
            session()->flash('suc', 'Inventory has been Updated suc');
            return 'done';
        } catch (ValidationException $ex)
        {
            session()->flash('suc', 'Invalid Data');
            return ['message' => $ex->getMessage()];
        }catch (\Exception $ex) {
            // throw $ex;
            session()->flash('suc', 'Invalid Data');
            return ['message' => $ex->getMessage()];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $deleted = Inventory::find($request->deletedId);
        $deleted->delete();
        Inventory::find($request->deletedId)->update([
           'deleted_by' => admin()->user()->id
        ]);
        session()->flash('suc', 'Inventory has been Deleted suc');
        return 'done';
    }
}
