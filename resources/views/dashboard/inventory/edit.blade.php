@extends('dashboard.base')
@php
@endphp
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
                        <form method="POST" action="{{ route('inventory.update', $product->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-6">
                                    <input name="marker" value="selectModel" type="hidden">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input class="form-control" name="Name" type="text" value="{{ $product->Name }}"
                                            >
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <input class="form-control" name="Description" type="text"
                                            value="{{ $product->Description }}" >
                                    </div>
                                    <div class="form-group">
                                        <label for="manufacturer">Manufacturer</label>
                                        <input class="form-control" name="Manufacturer" type="text"
                                               value="{{ $product->Manufacturer }}" >
                                        {{--<select class="form-control" name="Manufacturer" id="manufacturer"
                                          >
                                            <option value="{{ $product->Manufacturer }}">{{ $product->Manufacturer }}
                                            </option>
                                            <option value="Åland Islands">Åland Islands</option>
                                            <option value="Albania">Albania</option>
                                            <option value="Algeria">Algeria</option>
                                            <option value="Bahrain">Bahrain</option>
                                            <option value="Bangladesh">Bangladesh</option>
                                        </select>--}}
                                    </div>
                                    <div class="form-group">
                                        <label for="location">Location</label>
                                        <input class="form-control" name="Location" type="text"
                                               value="{{ $product->Location }}" >
                                        {{--<select class="form-control" name="Location" id="location"
                                            >
                                            <option value="{{ $product->Location }}">{{ $product->Location }}</option>
                                            <option value="Åland Islands">Åland Islands</option>
                                            <option value="Albania">Albania</option>
                                            <option value="Algeria">Algeria</option>
                                            <option value="Bahrain">Bahrain</option>
                                            <option value="Bangladesh">Bangladesh</option>
                                        </select>--}}
                                    </div>
                                    <div class="form-group">
                                        <label>Date</label>
                                        <input class="form-control" name="Date" type="date"
                                            value="{{ date("Y-m-d", strtotime($product->Date)) }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Model Year</label>
                                        <input class="form-control" name="ModelYear" type="number"
                                            value="{{ $product->ModelYear }}" >
                                    </div>
                                    <div class="form-group">
                                        <label>Bar Code</label>
                                        <input class="form-control" name="BarCode" type="number"
                                            value="{{ $product->BarCode }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Part Number</label>
                                        <input class="form-control" name="PartNumber" type="text"
                                            value="{{ $product->PartNumber }}">
                                    </div>

                                    <div class="form-group">
                                        <label>Reorder Level</label>
                                        <input class="form-control" name="ReorderLevel" type="text"
                                            value="{{ $product->ReorderLevel }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="category">Category</label>
                                        <input class="form-control" name="Category" type="text"
                                               value="{{ $product->Category }}">
                                        {{--<select class="form-control" name="Category" id="category"
                                            >
                                            <option value="{{ $product->Category }}">{{ $product->Category }}</option>
                                            <option value="Åland Islands">Åland Islands</option>
                                            <option value="Albania">Albania</option>
                                            <option value="Algeria">Algeria</option>
                                            <option value="Bahrain">Bahrain</option>
                                            <option value="Bangladesh">Bangladesh</option>
                                        </select>--}}
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
                                                    value="{{ $product->UnitCost }}" name="UnitCost">
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Units On Hand</label>
                                                <input class="form-control" type="number"
                                                     placeholder="{{ $product->UnitsOnHand }}"
                                                       name="UnitsOnHand" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <label>Unit Price</label>
                                                <input class="form-control" type="number"
                                                    value="{{  $product->UnitPrice }}"
                                                       name="UnitPrice">
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Stock Value</label>
                                                <input class="form-control" type="number"
                                                    value="{{ $product->StockValue }}"
                                                       name="StockValue" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox"
                                                style="width: 13px; height:13px; vertical-align:middle;" name="Taxable"
                                                {{ $product->Taxable == 'Taxable' ?'checked':''  }}>
                                            <label for="taxable" style="word-wrap:break-word">Taxable</label>
                                        </div>
                                    </div>




                                    <button type="submit" class="btn btn-primary">
                                        Save
                                    </button>
                                    <a href="{{ route('inventory.index') }}" class="btn btn-primary">
                                        Return
                                    </a>
                                
                            </div>


                            <div class="col-6">
                                <!-- PRODUCT IMAGE -->
                                <label>
                                    <h5>Product Image</h5>
                                </label>
                                <div
                                    style="height:300px; border:1px solid #ced2d8; border-radius:2px; padding:10px; margin:-7px 0px 28px 0px;">
                                    @if ($product->Image)
                                    <img alt="Image"
                                        style="display: block; margin-left: auto; margin-right: auto; max-height:280px; "
                                        src="{{$product->Image}}">
                                    @endif
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="file-input" style="font-weight:bold;">Image</label>
                                        <input id="file-input" type="file" name="Image">
                                    </div>
                                </div>

                                <div class="card" style="min-width:500px; display: none">
                                    <div class="card-header">
                                    <div class="row">
                                    <div class="col-sm-2"style="margin-top:7px;">
                                        <h5>Stock</h5></div>
                                        <div class="col-sm-2">
                                                <button class="btn btn-block btn-light" type="button" style="font-weight:bold; color:#39f;margin-left:-10px; ">+</button>
                                            </div>
                                    </div>

                                    </div>
                                    <div class="card-body" style="height:250px; overflow-y:scroll; overflow-x:hidden;">

                                        
                                       
                                        <div class="row">
                                            <div class="form-group col-sm-1"  >
                                                <button class="btn" style=" font-weight:bold !important;
                                            color:red; font-size:15px;" type="text">X</button>
                                            </div>
                                            <div class="form-group col-sm-3">
                                                <input class="form-control" type="number" value="">
                                            </div>

                                            <div class="form-group col-sm-3">
                                                <select class="form-control" style="background-color:#EBEDEF">
                                                    <option>In</option>
                                                    <option>Out</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-5">
                                                <div class="form-group">
                                                    <input class="form-control" style="" name="Date1" type="date"
                                                        value="" placeholder="Date">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-sm-1"></div>
                                            <div class="form-group col-sm-3">
                                                <input class="form-control" type="number" value=""
                                                    placeholder="Lot no.">
                                            </div>
                                            <div class="form-group col-sm-8">
                                                <textarea class="form-control" type="text" rows="1" cols="50"
                                                    placeholder="Description"></textarea>
                                            </div>
                                        </div>

                                        <!-- Next line -->

                                        <div class="row">
                                            <div class="form-group col-sm-1">
                                                <button class="btn" style=" font-weight:bold !important;
                                            color:red; font-size:15px;" type="text">X</button>
                                            </div>
                                            <div class="form-group col-sm-3">
                                                <input class="form-control" type="number" value="">
                                            </div>

                                            <div class="form-group col-sm-3">
                                                <select class="form-control" style="background-color:#EBEDEF">
                                                    <option>In</option>
                                                    <option>Out</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-5">
                                                <div class="form-group">
                                                    <input class="form-control" style="" name="Date2" type="date"
                                                        value="" placeholder="Date">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-sm-1"></div>
                                            <div class="form-group col-sm-3">
                                                <input class="form-control" type="number" value=""
                                                    placeholder="Lot no.">
                                            </div>
                                            <div class="form-group col-sm-8">
                                                <textarea class="form-control" type="text" rows="1" cols="50"
                                                    placeholder="Description"></textarea>
                                            </div>
                                        </div>

                                    </div>


                                </div>
                                <div class="row" style="display: none;">
                                    <div class="form-group col-sm-6">
                                        <input class="form-control" type="number" value="" placeholder="Units On Hand">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <input class="form-control" type="number" value=""
                                            placeholder="Reordered Level">
                                    </div>

                                </div>

                            </div>
                        </div>
                        </form>
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