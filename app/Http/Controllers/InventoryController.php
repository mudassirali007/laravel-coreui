<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\InventoryDetail;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

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
        $products = Inventory::all()->sortByDesc("id");
//        dd($products);
        return view('dashboard.inventory.inventoryList', compact('products', 'you'));
    }

    public function create()
    {
        return view('dashboard.inventory.create');
    }

    public function store(Request $request)
    {
        $this->save(new InventoryDetail(),$request);
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
//        $product->{'Inventory Transactions'}[0]['InventoryTransactions::Units'] = 3;
//        $product->save();
        dd($product->{'Inventory Transactions'});
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
        $this->save(InventoryDetail::find($id),$request);
        $request->session()->flash('message', 'Successfully updated record');
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

    private function save($product,$request){
        $product->Name = $request->Name;
        if($request->Image){
            $imageName = time().'.'.$request->Image->extension();
            $request->Image->storeAs('public/images', $imageName);
//            $product->Image = new File($request->Image);
            $product->Image = new File(storage_path('app/public/images/'.$imageName));
        }
        $product->Description = $request->Description;
        $product->Manufacturer = $request->Manufacturer;
        $product->Category = $request->Category;
        $product->Location = $request->Location;
        $product->ModelYear = $request->ModelYear;
        $product->BarCode = $request->BarCode;
        $product->PartNumber = $request->PartNumber;
//        $product->Date = date('Y-m-d', strtotime($request->Date));

//        $product->StockValue = $request->StockValue;
//        $product->UnitsOnHand = $request->UnitsOnHand;
        $product->Taxable = $request->Taxable == 'on'? 'Taxable' : '';
        $product->UnitPrice = $request->UnitPrice;
        $product->UnitCost = $request->UnitCost;
        $product->ReorderLevel = $request->ReorderLevel;

        $product->save();
    }
}
