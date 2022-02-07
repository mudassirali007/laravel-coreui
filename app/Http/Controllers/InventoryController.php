<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\InventoryDetail;
use Illuminate\Http\Request;
use App\Models\User;

class InventoryController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $you = auth()->user();
        $products = Inventory::all();
//        dd($products);
        return view('dashboard.inventory.inventoryList', compact('products', 'you'));
    }

    public function create()
    {
        return view('dashboard.inventory.create');
    }

    public function store(Request $request)
    {
//        dd($request->Date);
        $product = new InventoryDetail();
        $product->Name = $request->Name;
        $product->Description = $request->Description;
        $product->Manufacturer = $request->Manufacturer;
        $product->Location = $request->Location;

        $product->ModelYear = $request->ModelYear;
        $product->BarCode = $request->BarCode;
        $product->PartNumber = $request->PartNumber;
//        $product->StockValue = $request->StockValue;
//        $product->UnitsOnHand = $request->UnitsOnHand;
        $product->Taxable = $request->Taxable;
        $product->UnitPrice = $request->UnitPrice;
        $product->UnitCost = $request->UnitCost;
        $product->ReorderLevel = $request->ReorderLevel;
        $product->Category = $request->Category;

        $product->save();
//        InventoryDetail::create($request->all());

        return redirect()->route('inventory.index');

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
//        dd($product);
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
        $product = InventoryDetail::find($id);
        return view('dashboard.inventory.edit', compact('product'));
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
        $product = InventoryDetail::find($id);
        $product->Name = $request->Name;
        $product->Description = $request->Description;
        $product->Manufacturer = $request->Manufacturer;
        $product->Location = $request->Location;

        $product->ModelYear = $request->ModelYear;
        $product->BarCode = $request->BarCode;
        $product->PartNumber = $request->PartNumber;
//        $product->StockValue = $request->StockValue;
//        $product->UnitsOnHand = $request->UnitsOnHand;
        $product->Taxable = $request->Taxable;
        $product->UnitPrice = $request->UnitPrice;
        $product->UnitCost = $request->UnitCost;
        $product->ReorderLevel = $request->ReorderLevel;
        $product->Category = $request->Category;

        $product->save();
        $request->session()->flash('message', 'Successfully updated user');
        return redirect()->route('inventory.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Inventory::find($id);

        if($product){
            $product->delete();
        }
        return redirect()->route('inventory.index');
    }
}
