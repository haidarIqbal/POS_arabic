
@extends('layouts.app',['store'=>$store])
@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-heading">Products</div>
                <div class="panel-body">
                    <table class="table table-striped tablesed">
							<thead>
							  <tr>
								
								<th>اسم العنصر	 <br>Item Name</th>
								<th>شركة البند<br>Product Company</th>
								<th>السعر النقدي<br>Cash Price</th>
								<th>سعر الائتمان<br>Credit Price</th>
								<th>كمية<br>Quantity</th>
								<th>يضريبة القيمة المضافة<br>VAT</th>
								<th><br>Desc</th>
								<th>تم البيع<br>Sold</th>
								<th>تم إنشاؤها على<br>Created on</th>
								<th>تحديث في<br>Updated on</th>
								<th>تعديل<br>Edit</th>
								<th>حذف<br>Delete</th>
							  </tr>
							</thead>
							<tbody>
							
						  	  @foreach($orders as $product)						
								  <tr>
								    
									<td>{!! $product->name !!}</td>
									<td>{!! $product->company !!}</td>
									<td>{!! $product->cash_price !!}</td>
									<td>{!! $product->credit_price !!}</td>
									<td>{!! $product->quantity !!}</td>
									<td>{!! $product->vat !!}</td>
									<td>{!! $product->desc !!}</td>
									<td>{!! $product->sold !!}</td>
									<td>{!! $product->created_at !!}</td>
									<td>{!! $product->updated_at !!}</td>
									<td>
										
										{!! Form::open(array('url' => "/store/$store/product/$product->id/edit" , 'method' => 'GET')) !!}
											{!! Form::hidden('id', $product->id) !!}
												<button type="submit" class="btn btn-default">Edit</button>
										{!! Form::close() !!}
									</td>
									<td>
										{!! Form::open(array('url' => "/store/$store/product/destroy",  'method' => 'delete')) !!}
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
    </div>
</div>
<script type="text/javascript" src="{{ asset('public/assets/js/jquery.min.js')}}"></script>
<script type="text/javascript"  src="{{ asset('public/assets/js/jquery.dataTables.min.js')}}" defer></script>
<link rel="stylesheet" href="{{asset('public/assets/css/jquery.dataTables.min.css')}}">
	<script>
  $(document).ready(function() {
   setTimeout(() => {   
    $('.tablesed').DataTable({});
   }, 1000);
});
 </script>
@endsection
