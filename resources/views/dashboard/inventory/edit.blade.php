@extends('dashboard.base')

@section('css')

@endsection

@section('content')


<div class="container-fluid">
    <div class="fade-in">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Product</h4>
                    </div>
                    <div class="card-body">
                        @if(Session::has('message'))
                        <div class="row">
                            <div class="col-12">
                                <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                            </div>
                        </div>
                        @endif
                        <div class="row">
                            <div class="col-6">
                                <form method="POST" action="{{ route('inventory.update', $product->getRecordId()) }}">
                                    @csrf
                                    @method('PUT')
                                    <input name="marker" value="selectModel" type="hidden">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input class="form-control" name="Name" type="text" value="{{ $product->Name }}"
                                            placeholder="Product Name">
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <input class="form-control" name="Description" type="text"
                                            value="{{ $product->Description }}" placeholder="Description">
                                    </div>
                                    <div class="form-group">
                                        <label for="manufacturer">Manufacturer</label>
                                        <!-- <input
                                                    class="form-control"
                                                    name="Manufacturer"
                                                    type="text"
                                                    value="{{ $product->Manufacturer }}"
                                                    placeholder="Manufacturer"
                                            > -->
                                        <select class="form-control" name="Manufacturer" id="manufacturer"
                                            placeholder="Manufacturer">
                                            <option value="{{ $product->Manufacturer }}">{{ $product->Manufacturer }}
                                            </option>
                                            <option value="Åland Islands">Åland Islands</option>
                                            <option value="Albania">Albania</option>
                                            <option value="Algeria">Algeria</option>
                                            <option value="Bahrain">Bahrain</option>
                                            <option value="Bangladesh">Bangladesh</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="location">Location</label>
                                        <!--  <input
                                                    class="form-control"
                                                    name="Location"
                                                    type="text"
                                                    value="{{ $product->Location }}"
                                                     
                                            > -->
                                        <select class="form-control" name="Location" id="location"
                                            placeholder="Location">
                                            <option value="{{ $product->Location }}">{{ $product->Location }}</option>
                                            <option value="Åland Islands">Åland Islands</option>
                                            <option value="Albania">Albania</option>
                                            <option value="Algeria">Algeria</option>
                                            <option value="Bahrain">Bahrain</option>
                                            <option value="Bangladesh">Bangladesh</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Date</label>
                                        <input class="form-control" name="Date" type="date" value="{{ $product->Date }}"
                                            placeholder="Date">
                                    </div>
                                    <div class="form-group">
                                        <label>Model Year</label>
                                        <input class="form-control" name="ModelYear" type="number"
                                            value="{{ $product->ModelYear }}" placeholder="Model Year">
                                    </div>
                                    <div class="form-group">
                                        <label>Bar Code</label>
                                        <input class="form-control" name="BarCode" type="text"
                                            value="{{ $product->BarCode }}" placeholder="Bar Code">
                                    </div>
                                    <div class="form-group">
                                        <label>Part Number</label>
                                        <input class="form-control" name="PartNumber" type="text"
                                            value="{{ $product->PartNumber }}" placeholder="Part Number">
                                    </div>
                                    <!-- <div class="form-group">
                                            <label>Stock Value</label>
                                            <input
                                                    class="form-control"
                                                    name="StockValue"
                                                    type="text"
                                                    value="{{ $product->StockValue }}"
                                                    placeholder="Stock Value"
                                            >
                                        </div>
                                        <div class="form-group">
                                            <label>Units On Hand</label>
                                            <input
                                                    class="form-control"
                                                    name="UnitsOnHand"
                                                    type="text"
                                                    value="{{ $product->UnitsOnHand }}"
                                                    placeholder="UnitsOnHand"
                                            >
                                        </div>
                                        <div class="form-group">
                                            
                                            <input type="checkbox"  style="width: 13px; height:13px; vertical-align:middle;" name="Taxable" value="{{ $product->Taxable }}" id="taxable">
                                            <label for="taxable" style="word-wrap:break-word">Taxable</label>
                                            <input
                                                    class="form-control"
                                                    name="Taxable"
                                                    type="text"
                                                    value="{{ $product->Taxable }}"
                                                    placeholder="Taxable"
                                            > 
                                        </div>
                                         <div class="form-group">
                                            <label>Unit Price</label>
                                            <input
                                                    class="form-control"
                                                    name="UnitPrice"
                                                    type="text"
                                                    value="{{  $product->UnitPrice }}"
                                                    placeholder="Unit Price"
                                            > 
                                        </div> -->
                                    <!-- <div class="form-group">
                                            <label>Unit Cost</label>
                                            <input
                                                    class="form-control"
                                                    name="UnitCost"
                                                    type="text"
                                                    value="{{ $product->UnitCost }}"
                                                    placeholder="Unit Cost"
                                            >
                                        </div> -->
                                    <div class="form-group">
                                        <label>Reorder Level</label>
                                        <input class="form-control" name="ReorderLevel" type="text"
                                            value="{{ $product->ReorderLevel }}" placeholder="Reorder Level">
                                    </div>
                                    <div class="form-group">
                                        <label for="category">Category</label>
                                        <!--  <input
                                                    class="form-control"
                                                    name="Category"
                                                    type="text"
                                                    value="{{ $product->Category }}"
                                                    placeholder="Category"
                                            > -->
                                        <select class="form-control" name="Category" id="category"
                                            placeholder="Category">
                                            <option value="{{ $product->Category }}">{{ $product->Category }}</option>
                                            <option value="Åland Islands">Åland Islands</option>
                                            <option value="Albania">Albania</option>
                                            <option value="Algeria">Algeria</option>
                                            <option value="Bahrain">Bahrain</option>
                                            <option value="Bangladesh">Bangladesh</option>
                                        </select>
                                    </div>
                                    <!-- COST -->
                                    <label style="margin-top:20px;">
                                        <h5>Cost</h5>
                                    </label>
                                    <div style="width:100%; height:0.45px; background:#ced2d8; margin-bottom:10px;">
                                    </div>
                                    <div>
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <label>Unit Cost</label>
                                                <input class="form-control" type="number"
                                                    value="{{ $product->UnitCost }}" placeholder="Unit Cost">
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Units On Hand</label>
                                                <input class="form-control" type="number"
                                                    value="{{ $product->UnitsOnHand }}" placeholder="UnitsOnHand">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <label>Unit Price</label>
                                                <input class="form-control" type="number"
                                                    value="{{  $product->UnitPrice }}" placeholder="Unit Price">
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Stock Value</label>
                                                <input class="form-control" type="number"
                                                    value="{{ $product->StockValue }}" placeholder="Stock Value">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox"
                                                style="width: 13px; height:13px; vertical-align:middle;" name="Taxable"
                                                value="{{ $product->Taxable }}" id="taxable">
                                            <label for="taxable" style="word-wrap:break-word">Taxable</label>
                                        </div>
                                    </div>




                                    <button type="submit" class="btn btn-primary">
                                        Save
                                    </button>
                                    <a href="{{ route('inventory.index') }}" class="btn btn-primary">
                                        Return
                                    </a>
                                </form>
                            </div>


                            <div class="col-6">

                                <!-- PRODUCT IMAGE -->
                                <label>
                                    <h5>Product Image</h5>
                                </label>
                                <div
                                    style="height:300px; border:1px solid #ced2d8; border-radius:2px; padding:10px; margin:-7px 0px 64px 0px;">
                                    <img alt="Qries"
                                        style="display: block; margin-left: auto; margin-right: auto; max-height:280px; "
                                        src="https://filemaker100.kocoda.com.au/Streaming_SSL/MainDB/6AF6FEA5A0F099D0CCBB2A5F4ABDCB9799AD5362C8B87AD496A22B7D421DAB33.jpg?RCType=EmbeddedRCFileProcessor">
                                    <div class="form-group row"
                                        style="margin-top:25px; margin-left:30px; text-align:center;">
                                        <div class="col-md-12">
                                            <label for="file-input" style="font-weight:bold;">Image</label>
                                            <input id="file-input" type="file" name="Image">
                                        </div>
                                    </div>

                                </div>


                                <!-- STOCK -->
                                <label>
                                    <h5>Stock</h5>
                                </label>
                                <div
                                    style="overflow-y:scroll; overflow-x:hidden; height:300px; border:1px solid #ced2d8; border-radius:2px; padding:10px 5px 10px 5px;">
                                    <div class="col-md-2">
                                        <button class="btn btn-pill btn-block btn-light" type="button"
                                            style="height:-3px; margin-left:30px; font-weight:bold !important; margin-bottom:10px; font-size:15px; font-weight:bold; color:#39f; ">+</button>
                                    </div>

                                    <div class="form-group row">
                                        <button class="btn btn-sm"
                                            style="margin-left:15px; font-weight:bold !important; color:red; font-size:15px;"
                                            type="text">X</button>
                                        <div class="col-sm-3">
                                            <input class="form-control" style="width:110%" type="number"
                                                style="background-color:#EBEDEF">
                                        </div>

                                        <div class="col-sm-4">
                                            <select class="form-control" name="" id="" style="background-color:#EBEDEF">
                                                <option value="In">In</option>
                                                <option value="Out">Out</option>
                                            </select>
                                        </div>

                                        <div class="col-sm-4">
                                            <input class="form-control" name="Date" type="date" value=""
                                                placeholder="Date" style="background-color:#EBEDEF">
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <div class="col-sm-3">
                                            <input class="form-control" type="number" placeholder="Lot Number"
                                                style="margin-left:40px; width:110%;">
                                        </div>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" style="margin-left:40px;" type="text"
                                                rows="1" cols="50" placeholder="Description"></textarea>
                                        </div>
                                    </div>

                                    <br> <!-- BREAK -->

                                    <div class="form-group row">
                                        <button class="btn btn-sm"
                                            style="margin-left:15px; font-weight:bold !important; color:red; font-size:15px;"
                                            type="text">X</button>
                                        <div class="col-sm-3">
                                            <input class="form-control" style="width:110%" type="number"
                                                style="background-color:#EBEDEF">
                                        </div>

                                        <div class="col-sm-4">
                                            <select class="form-control" name="" id="" style="background-color:#EBEDEF">
                                                <option value="In">In</option>
                                                <option value="Out">Out</option>
                                            </select>
                                        </div>

                                        <div class="col-sm-4">
                                            <input class="form-control" name="Date" type="date" value=""
                                                placeholder="Date" style="background-color:#EBEDEF">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-3">
                                            <input class="form-control" type="number" placeholder="Lot Number"
                                                style="margin-left:40px; width:110%;">
                                        </div>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" style="margin-left:40px;" type="text"
                                                rows="1" cols="50" placeholder="Description"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <br>

                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <input class="form-control" type="number" placeholder="Units on Hands">
                                    </div>
                                    <div class="col-sm-6">
                                        <input class="form-control" type="text" rows="1" cols="50"
                                            placeholder="Reordered Level">
                                    </div>
                                </div>

                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection

@section('javascript')


@endsection