@extends('dashboard.base')

@section('css')

@endsection

@section('content')


    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header"><h4>Edit Product</h4></div>
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
                                            <input
                                                    class="form-control"
                                                    name="Name"
                                                    type="text"
                                                    value="{{ $product->Name }}"
                                                    placeholder="Product Name"
                                            >
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <input
                                                    class="form-control"
                                                    name="Description"
                                                    type="text"
                                                    value="{{ $product->Description }}"
                                                    placeholder="Description"
                                            >
                                        </div>
                                        <div class="form-group">
                                            <label>Manufacturer</label>
                                            <input
                                                    class="form-control"
                                                    name="Manufacturer"
                                                    type="text"
                                                    value="{{ $product->Manufacturer }}"
                                                    placeholder="Manufacturer"
                                            >
                                        </div>
                                        <div class="form-group">
                                            <label>Location</label>
                                            <input
                                                    class="form-control"
                                                    name="Location"
                                                    type="text"
                                                    value="{{ $product->Location }}"
                                                    placeholder="Location"
                                            >
                                        </div>
                                        <div class="form-group">
                                            <label>Date</label>
                                            <input
                                                    class="form-control"
                                                    name="Date"
                                                    type="date"
                                                    value="{{ $product->Date }}"
                                                    placeholder="Date"
                                            >
                                        </div>
                                        <div class="form-group">
                                            <label>Model Year</label>
                                            <input
                                                    class="form-control"
                                                    name="ModelYear"
                                                    type="number"
                                                    value="{{ $product->ModelYear }}"
                                                    placeholder="Model Year"
                                            >
                                        </div>
                                        <div class="form-group">
                                            <label>Bar Code</label>
                                            <input
                                                    class="form-control"
                                                    name="BarCode"
                                                    type="text"
                                                    value="{{ $product->BarCode }}"
                                                    placeholder="Bar Code"
                                            >
                                        </div>
                                        <div class="form-group">
                                            <label>Part Number</label>
                                            <input
                                                    class="form-control"
                                                    name="PartNumber"
                                                    type="text"
                                                    value="{{ $product->PartNumber }}"
                                                    placeholder="Part Number"
                                            >
                                        </div>
                                        <div class="form-group">
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
                                            <label>Taxable</label>
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
                                                    value="{{ $product->UnitPrice }}"
                                                    placeholder="Unit Price"
                                            >
                                        </div>
                                        <div class="form-group">
                                            <label>Unit Cost</label>
                                            <input
                                                    class="form-control"
                                                    name="UnitCost"
                                                    type="text"
                                                    value="{{ $product->UnitCost }}"
                                                    placeholder="Unit Cost"
                                            >
                                        </div>
                                        <div class="form-group">
                                            <label>Reorder Level</label>
                                            <input
                                                    class="form-control"
                                                    name="ReorderLevel"
                                                    type="text"
                                                    value="{{ $product->ReorderLevel }}"
                                                    placeholder="Reorder Level"
                                            >
                                        </div>
                                        <div class="form-group">
                                            <label>Category</label>
                                            <input
                                                    class="form-control"
                                                    name="Category"
                                                    type="text"
                                                    value="{{ $product->Category }}"
                                                    placeholder="Category"
                                            >
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label" for="file-input">Image</label>
                                            <div class="col-md-9">
                                                <input id="file-input" type="file" name="Image">
                                            </div>
                                        </div>

                                        <button
                                                type="submit"
                                                class="btn btn-primary"
                                        >
                                            Select
                                        </button>
                                        <a
                                                href="{{ route('inventory.index') }}"
                                                class="btn btn-primary"
                                        >
                                            Return
                                        </a>
                                    </form>
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