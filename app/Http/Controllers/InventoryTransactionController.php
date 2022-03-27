<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\InventoryTransaction;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class InventoryTransactionController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $inventoryTransactions = InventoryTransaction::all()->sortByDesc("id");
//        dd($inventoryTransactions);
        return view('inventoryTransaction', compact('inventoryTransactions'));
    }

    public function create()
    {
        return view('dashboard.inventory.create');
    }

    public function store(Request $request)
    {

        return $this->save(new InventoryTransaction(),$request);

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = InventoryDetail::find($id);
        return view('dashboard.inventory.inventoryShow', compact( 'product' ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $inventoryTransactions = InventoryTransaction::find($id);

//        dd($inventoryTransactions);

        return response()->json($inventoryTransactions);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return $this->save(InventoryTransaction::find($id),$request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $inventoryTransactions = InventoryTransaction::find($id);

        if($inventoryTransactions){
            return $inventoryTransactions->delete();
        }
        return false;
    }

    private function save($product,$request){

        $request->lotnumber && $product->LotNumber= $request->lotnumber;

        $request->type && $product->Type = $request->type;

        $request->units && $product->Units = $request->units;
//        $request->unitsInOut && $product->UnitsInOut = $request->unitsInOut;
//        $request->date && $product->Date = "11/11/2022";

        $request->description && $product->Description = $request->description;

        $product->save();
    }
}
