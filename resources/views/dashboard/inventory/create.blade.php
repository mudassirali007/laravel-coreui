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
                        <h4>Create Product</h4>
                    </div>
                    <div class="card-body">
                        @if(Session::has('message'))
                        <div class="row">
                            <div class="col-12">
                                <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                            </div>
                        </div>
                        @endif
                        <form method="POST" action="{{ route('inventory.store') }}"  enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <input name="marker" value="selectModel" type="hidden">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input class="form-control" name="Name" type="text" value=""
                                        >
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <input class="form-control" name="Description" type="text" value=""
                                       >
                                </div>
                                <div class="form-group">
                                    <label>Manufacturer</label>
                                    <input class="form-control" name="Manufacturer" type="text"
                                    >
                                    {{--<select class="form-control" name="Manufacturer" id="manufacturer">
                                        <option value="" disabled selected hidden>Manufacturer</option>
                                        <option value="Albania">Albania</option>
                                        <option value="Algeria">Algeria</option>
                                        <option value="Bahrain">Bahrain</option>
                                        <option value="Bangladesh">Bangladesh</option>
                                    </select>--}}
                                </div>
                                <div class="form-group">
                                    <label>Location</label>
                                    <input class="form-control" name="Location" type="text"
                                           >
                                    {{--<select class="form-control" name="Location" id="location">
                                        <option value="" disabled selected hidden>Location</option>
                                        <option value="Albania">Albania</option>
                                        <option value="Algeria">Algeria</option>
                                        <option value="Bahrain">Bahrain</option>
                                        <option value="Bangladesh">Bangladesh</option>
                                    </select>--}}
                                </div>
                                <div class="form-group">
                                    <label>Date</label>
                                    <input class="form-control" name="Date" type="date" value="" >
                                </div>
                                <div class="form-group">
                                    <label>Model Year</label>
                                    <input class="form-control" name="ModelYear" type="number" value=""
                                        placeholder="Model Year">
                                </div>
                                <div class="form-group">
                                    <label>Bar Code</label>
                                    <input class="form-control" name="BarCode" type="text" value=""
                                        >
                                </div>
                                <div class="form-group">
                                    <label>Part Number</label>
                                    <input class="form-control" name="PartNumber" type="text" value=""
                                     >
                                </div>

                                <div class="form-group">
                                    <label>Reorder Level</label>
                                    <input class="form-control" name="ReorderLevel" type="text" value=""
                                        >
                                </div>
                                <div class="form-group">
                                    <label>Category</label>
                                    <input class="form-control" name="Category" type="text" value=""
                                    >
                                    {{--<select class="form-control" name="Category" id="category">
                                        <option value="" disabled selected hidden>Category</option>
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
                                            <input class="form-control" type="number" value="" name="UnitCost">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            <label>Unit Price</label>
                                            <input class="form-control" type="number" value="" name="UnitPrice">
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <input type="checkbox" style="width: 13px; height:13px; vertical-align:middle;"
                                            name="Taxable">
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
                               {{-- <label>
                                    <h5>Product Image</h5>
                                </label>
                                <div
                                    style="height:300px; border:1px solid #ced2d8; border-radius:2px; padding:10px; margin:-7px 0px 28px 0px;">
                                    <img alt="Image"
                                        style="display: block; margin-left: auto; margin-right: auto; max-height:280px; "
                                        src="">
                                </div>--}}

                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="file-input" style="font-weight:bold;">Image</label>
                                        <input id="file-input" type="file" name="Image">
                                    </div>
                                </div>

                                <div class="card" style="min-width:500px; display: block">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-sm-2"style="margin-top:7px;">
                                                <h5>Stock</h5>
                                            </div>
                                            <div class="col-sm-2">
                                                <button id="add-stock-button" class="btn btn-block btn-light" type="button" style=" font-weight:bold; color:#39f;margin-left:-10px;">+</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="stock-card-body" class="card-body" >
{{--                                        <div class="stock-section">--}}
{{--                                            <div class="row">--}}
{{--                                                <div class="form-group col-sm-1"  >--}}
{{--                                                    <button class="btn crossButton" style=" font-weight:bold !important;--}}
{{--                                            color:red; font-size:15px;" type="text">X</button>--}}
{{--                                                </div>--}}
{{--                                                <div class="form-group col-sm-3">--}}
{{--                                                    <input  name="InventoryTransactions[0][InventoryTransactions::Units]" class="form-control" type="number" value="">--}}
{{--                                                </div>--}}

{{--                                                <div class="form-group col-sm-3">--}}
{{--                                                    <select name="InventoryTransactions[0][InventoryTransactions::Type]" class="form-control" style="background-color:#EBEDEF">--}}
{{--                                                        <option value="In">In</option>--}}
{{--                                                        <option value="Out">Out</option>--}}
{{--                                                    </select>--}}
{{--                                                </div>--}}
{{--                                                <div class="col-sm-5">--}}
{{--                                                    <div class="form-group">--}}
{{--                                                        <input name="InventoryTransactions[0][InventoryTransactions::Date]" class="form-control" style="" name="Date1" type="date"--}}
{{--                                                               value="" placeholder="Date">--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="row">--}}
{{--                                                <div class="form-group col-sm-1"></div>--}}
{{--                                                <div class="form-group col-sm-3">--}}
{{--                                                    <input name="InventoryTransactions[0][InventoryTransactions::LotNumber]" class="form-control" type="number" value=""--}}
{{--                                                           placeholder="Lot no.">--}}
{{--                                                </div>--}}
{{--                                                <div class="form-group col-sm-8">--}}
{{--                                                <textarea name="InventoryTransactions[0][InventoryTransactions::Description]" class="form-control" type="text" rows="1" cols="50"--}}
{{--                                                          placeholder="Description"></textarea>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
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
    <script>
        // const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        const addStockButton = document.getElementById("add-stock-button");
        const crossButton = document.querySelectorAll(".crossButton");

        addStockButton.addEventListener("click", (e) => {
            e.preventDefault();
            addStockElement();
        });

        crossButton.forEach(item => {
            item.addEventListener('click', e => {
                e.preventDefault();
                e.target.closest(".stock-section").remove();
            })
        })


        const addStockElement = () => {
            const value = document.querySelectorAll('.stock-section').length;
            const html = `<div class="stock-section">
                                            <div class="row">
                                                <div class="form-group col-sm-1"  >
                                                    <button class="btn crossButton" style=" font-weight:bold !important;
                                            color:red; font-size:15px;" type="text">X</button>
                                                </div>
                                                <div class="form-group col-sm-3">
                                                    <input  name="InventoryTransactions[${value}][InventoryTransactions::Units]" class="form-control" type="number" value="">
                                                </div>

                                                <div class="form-group col-sm-3">
                                                    <select name="InventoryTransactions[${value}][InventoryTransactions::Type]" class="form-control" style="background-color:#EBEDEF">
                                                        <option value="In">In</option>
                                                        <option value="Out">Out</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-5">
                                                    <div class="form-group">
                                                        <input name="InventoryTransactions[${value}][InventoryTransactions::Date]" class="form-control" style="" name="Date1" type="date"
                                                               value="${new Date().toISOString().substring(0, 10)}" placeholder="Date">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-sm-1"></div>
                                                <div class="form-group col-sm-3">
                                                    <input name="InventoryTransactions[${value}][InventoryTransactions::LotNumber]" class="form-control" type="number" value=""
                                                           placeholder="Lot no.">
                                                </div>
                                                <div class="form-group col-sm-8">
                                                <textarea name="InventoryTransactions[${value}][InventoryTransactions::Description]" class="form-control" type="text" rows="1" cols="50"
                                                          placeholder="Description"></textarea>
                                                </div>
                                            </div>
                                        </div>`;
            appendHtml(document.getElementById('stock-card-body'),html)
        }
        const appendHtml = (el, str) => {
            const div = document.createElement('div');
            div.innerHTML = str;
            while (div.children.length > 0) {
                el.appendChild(div.children[0]);
            }
        }

    </script>

@endsection