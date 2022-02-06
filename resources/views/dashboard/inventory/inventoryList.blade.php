@extends('dashboard.base')
@php

@endphp
@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                      <i class="fa fa-align-justify"></i>{{ __('Inventory') }}</div>
                    <div class="card-body">
                        <table class="table table-responsive-sm table-striped">
                        <thead>
                          <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Part Number</th>
                            <th>Units On Hand</th>
                            <th>Availability</th>
                            <th></th>
                            <th></th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($products as $product)
                            <tr>
                              <td>
{{--                                  <img src="{{$product->Image  }}" >--}}
                                  <img src="<?php echo e(url('/assets/img/avatars/9.jpg')); ?>" >
                              </td>
                              <td>{{ $product->Name }}</td>
                              <td>{{ $product->PartNumber }}</td>
                              <td>{{ $product->UnitsOnHand }}</td>
                              <td>{{ $product->Availability }}</td>
                              <td>
                                <a href="{{ url('/inventory/' . $product->ProductID) }}" class="btn btn-block btn-primary">View</a>
                              </td>
                              <td>
                                <a href="{{ url('/inventory/' . $product->ProductID . '/edit') }}" class="btn btn-block btn-primary">Edit</a>
                              </td>
                              <td>
                                @if( $you->id !== $product->ProductID )
                                <form action="{{ route('inventory.destroy', $product->ProductID ) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-block btn-danger">Delete</button>
                                </form>
                                @endif
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection


@section('javascript')

@endsection

