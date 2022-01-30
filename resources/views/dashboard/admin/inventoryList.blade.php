@extends('dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8">
                <div class="card">
                    <div class="card-header">
                      <i class="fa fa-align-justify"></i>{{ __('Users') }}</div>
                    <div class="card-body">
                        <table class="table table-responsive-sm table-striped">
                        <thead>
                          <tr>
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
                              <td>{{ $product->Name }}</td>
                              <td>{{ $product->PartNumber }}</td>
                              <td>{{ $product->UnitsOnHand }}</td>
                              <td>
                                @if ($product->UnitsOnHand == 0)
                                    Not in stock — order more
                                @elseif ($product->UnitsOnHand <= $product->ReorderLevel)
                                    Stock is low — order more
                                @else
                                    In stock
                                @endif
                              </td>
                              <td>
                                <a href="{{ url('/users/' . $product->BarCode) }}" class="btn btn-block btn-primary">View</a>
                              </td>
                              <td>
                                <a href="{{ url('/users/' . $product->BarCode . '/edit') }}" class="btn btn-block btn-primary">Edit</a>
                              </td>
                              <td>
                                @if( $you->id !== $product->BarCode )
                                <form action="{{ route('users.destroy', $product->BarCode ) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-block btn-danger">Delete Record</button>
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

