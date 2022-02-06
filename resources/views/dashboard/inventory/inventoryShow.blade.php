@extends('dashboard.base')

@section('css')

@endsection

@section('content')


    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header"><h4>{{ $product->Name }}</h4></div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <a
                                            href="{{ route('inventory.index') }}"
                                            class="btn btn-primary mb-3"
                                    >
                                        Return
                                    </a>
                                    <table class="table">
                                        <tr>
                                            <td>
                                                Part Number
                                            </td>
                                            <td>
                                                {{ $product->PartNumber }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Units
                                            </td>
                                            <td>
                                                {{ $product->UnitsOnHand }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Availability
                                            </td>
                                            <td>
                                                {{ $product->Availability }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Category
                                            </td>
                                            <td>
                                                {{ $product->Category }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Location
                                            </td>
                                            <td>
                                                {{ $product->Location }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                BarCode
                                            </td>
                                            <td>
                                                {{ $product->BarCode }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Manufacturer
                                            </td>
                                            <td>
                                                {{ $product->Manufacturer }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                ModelYear
                                            </td>
                                            <td>
                                                {{ $product->ModelYear }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Date
                                            </td>
                                            <td>
                                                {{ $product->Date }}
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="card bg-light mb-3">
                                        <div class="card-body">
                                            <h5 class="card-title">Description</h5>
                                            <p>{{ $product->Description }}</p>
                                        </div>
                                    </div>
                                    <div class="card bg-light mb-3">
                                        <div class="card-body">
                                            <h5 class="card-title">Cost</h5>
                                            <p>Stock Value:  <strong>{{ $product->StockValue }}</strong></p>
                                            <p>Unit Price:  <strong>{{ $product->UnitPrice }}</strong></p>
                                            <p>Units On Hand:  <strong>{{ $product->UnitsOnHand }}</strong></p>
                                            <p>Unit Cost:  <strong>{{ $product->UnitCost }}</strong></p>
                                            <p>Taxable:  <strong>{{ $product->Taxable }}</strong></p>
                                        </div>
                                    </div>

                                    <a
                                            href="{{ route('inventory.index') }}"
                                            class="btn btn-primary"
                                    >
                                        Return
                                    </a>
                                </div>
                                <div class="col-6">
{{--                                    <img src="{{$product->Image  }}" >--}}
                                    <img src="<?php echo e(url('/assets/img/avatars/9.jpg')); ?>" >
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