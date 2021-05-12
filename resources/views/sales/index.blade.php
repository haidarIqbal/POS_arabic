@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table class="table tableseds table-striped" id="table">
						<thead>
							<tr>
								<th>اسم العنصر</th>
								<th>كمية</th>
								<th>سعر الوحدة</th>
								<th>ضنسبة ضريبة القيمة المضافة
</th>
								<th>ضريبة القيمة المضافة</th>
								<th>خصم</th>
								<th>المبلغ الإجمالي </th>
								<th>Date</th>
							</tr>
						</thead>
						<tbody>
							@foreach($orders as $each_order)
								
									@foreach($products as $each_product)
										@if($each_product->id === $each_order->product_id)
											<tr>
												<td>{{ $each_product->name}}</td>
												<td>{{ $each_order->quantity}}</td>
												<td>{{ $each_order->unitprice}}</td>
												<td>{{ $each_order->vat}}</td>
												<td>{{ $each_order->vatTotal}}</td>
												<td>{{ $each_order->discount}}</td>
												<td>{{ $each_order->amount}}</td>
												<td>{{ $each_order->created_at}}</td>
											</tr>
										@endif
									@endforeach
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
    $('.tableseds').DataTable({});
   }, 2000);
});
 </script>
@endsection
