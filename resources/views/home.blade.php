@extends('layouts.store')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
        <table class="table table-striped tablesed">
							<thead>
							  <tr>
								<th>Store Name</th>
								<th>Store Location</th>
								<th>Edit</th>
								<th>Delete</th>
							  </tr>
							</thead>
							<tbody>
							
						  	  @foreach($stores as $store)						
								  <tr>
									<td><a href="{{ route('product', $store) }}" class="btn btn-info">{!! $store->name !!}</a></td>
									<td>{!! $product->company !!}</td>
									<td>{!! $product->cash_price !!}</td>
									<td>{!! $product->credit_price !!}</td>
									<td>{!! $product->quantity !!}</td>
									<td>{!! $product->sold !!}</td>
									<td>{!! $product->created_at !!}</td>
									<td>{!! $product->updated_at !!}</td>
									<td>
										
										{!! Form::open(array('url' => "/product/$product->id/edit" , 'method' => 'GET')) !!}
											{!! Form::hidden('id', $product->id) !!}
												<button type="submit" class="btn btn-default">Edit</button>
										{!! Form::close() !!}
									</td>
									<td>
										{!! Form::open(array('url' => '/product/destroy' ,  'method' => 'delete')) !!}
											{!! Form::hidden('id', $product->id) !!}
												<button type="submit" class="btn btn-default">Delete</button>
										{!! Form::close() !!}
									</td>
								  </tr>
							  @endforeach
							</tbody>
						  </table>
        </div>
    </div>
</div>
@endsection
