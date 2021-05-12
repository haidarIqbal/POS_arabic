@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
			<table class="table table-striped customer">
				<thead>
					<tr>
						<th>اسم الزبون:</th>
						<th>تف العميل</th>
						<th>نوع الدفع</th>
						<th>اتف العميل</th>
						<th>Created At</th>
					</tr>
				</thead>
				<tbody>
					@foreach($customers as $customer)						
						@foreach($orders as $order)	
							@if($customer->id === $order->order_id)					
								<tr>
									<td>{{ $customer->name }}</td>
									<td>{{ $customer->location }}</td>
									<td>{{ $order->payment_t }}</td>
									<td>'{{ $customer->number }}'</td>
									<td>{{ date('Y-m-d H:i:s a',strtotime($customer->created_at)) }}</td>
								</tr>
							@endif
						@endforeach
					@endforeach
				</tbody>
			</table>
        </div>
    </div>
</div>
<script type="text/javascript" src="{{ asset('public/assets/js/jquery.min.js')}}"></script>
<script type="text/javascript"  src="{{ asset('public/assets/js/jquery.dataTables.min.js')}}" defer></script>
<script type="text/javascript"  src="{{ asset('public/assets/js/dataTables.buttons.min.js')}}" defer></script>
<script type="text/javascript"  src="{{ asset('public/assets/js/buttons.html5.min.js')}}" defer></script>
<script type="text/javascript"  src="{{ asset('public/assets/js/jszip.min.js')}}" defer></script>
<script type="text/javascript"  src="{{ asset('public/assets/js/pdfmake.min.js')}}" defer></script>
<script type="text/javascript"  src="{{ asset('public/assets/js/vfs_fonts.js')}}" defer></script>
<script type="text/javascript"  src="{{ asset('public/assets/js/buttons.print.min.js')}}" defer></script>
<link rel="stylesheet" href="{{asset('public/assets/css/jquery.dataTables.min.css')}}">
<link rel="stylesheet" href="{{asset('public/assets/css/buttons.dataTables.min.css')}}">
	<script>
  $(document).ready(function() {
   setTimeout(() => {   
    $('.customer').DataTable({
    	dom: 'Bfrtip',
    	buttons: [
               'csv', 'excel', 'print'
        ]});
   }, 2000);
});
 </script>
@endsection
