@extends('layouts.app') @section('content')
<script type="text/javascript" src="{{ asset('public/assets/js/jquery.min.js')}}"></script>

<script type="text/javascript">
	function totalAmount(){
		var t = 0;
		$('.amount').each(function(i,e){
			var amt = $(this).val()-0;
			t += amt;
		});
		$('.total').html(t);
	}
	$(function () {
		
		$('.getmoney').change(function(){
			var total = $('.total').html();
			var getmoney = $(this).val();
			var t = getmoney - total;
			$('.backmoney').val(t).toFixed(2);
		});
		$('.add').click(function () {
			var product = $('.product_id').html();
			var n = ($('.neworderbody tr').length - 0) + 1;
			var tr = '<tr><td class="no">' + n + '</td>' +
			'<td><input type="text" id="bar" name="bar[]" class="bar form-control" required></td>'
			+'<td><select class="form-control product_id" id="setPro" name="product_id[]">' + product + '</select></td>' +
				'<td><input type="text" class="qty form-control" name="qty[]" value="{{ old('
			email ') }}"></td>' +
			'<td><select class="form-control Ptype" id="type" name="payment_t[]" ><option data_price="cash" value="cash">Cash</option><option data_price="credit" value="credit">Credit</option></select></td>'
			+	'<td><input type="text" class="price form-control" name="price[]" value="{{ old('
			email ') }}"></td>' +
			'<td><input type="text" class="vat form-control" id="vat" name="vat[]"></td>'+
			'<td hidden=""><input type="text" class="vatTotal form-control" id="vat"'+
			' name="vatTotal[]"></td>'+
				'<td><input type="text" class="dis form-control" name="dis[]" value="0"></td>' +
				'<td><input type="text" class="amount form-control" name="amount[]"></td>' +
				'<td><input type="button" class="btn btn-danger delete" value="x"></td></tr>';
			$('.neworderbody').append(tr);
		});
		$('.neworderbody').delegate('.delete', 'click', function () {
			$(this).parent().parent().remove();
			totalAmount();
		});

		$('.neworderbody').delegate('.product_id', 'change', function () {
			var tr = $(this).parent().parent();
			var price = tr.find('.product_id option:selected').attr('data-price_cash');
			
			tr.find('.price').val(price);
			var qty = tr.find('.qty').val() - 0;
			var dis = tr.find('.dis').val() - 0;
			var price = tr.find('.price').val() - 0;
		
			var total = (qty * price) - ((qty * price * dis)/100);
			tr.find('.amount').val(total);
			totalAmount();
		});

		$('.neworderbody').delegate('.Ptype', 'change', function () {
			var tr = $(this).parent().parent();
			
			var type = tr.find('.Ptype option:selected').attr('data_price');
			var price = tr.find('.product_id option:selected').attr('data-price_'+type);
			tr.find('.price').val(price);
			var qty = tr.find('.qty').val() - 0;
			var dis = tr.find('.dis').val() - 0;
			var price = tr.find('.price').val() - 0;
			var vat = price *qty*15/100;
			var total = (qty * price) - ((qty * price * dis)/100);
			total = total + vat
			tr.find('.amount').val(total);
			totalAmount();
		});

		$('.neworderbody').delegate('#bar', 'change', function () {
			let barcode = $(this).val()
			
			var tr = $(this).parent().parent();
			 	if(barcode){
					
			 		tr.find('#setPro option[data-qr="'+barcode+'"]').attr('selected', 'selected')
			 		tr.find('.product_id').trigger('change')
					var vat = tr.find('#setPro option:selected').attr('data-vat')
					console.log(vat)
			 		tr.find('#vat').val(vat)

					
			 	}
		
		});

		$('.neworderbody').delegate('.qty , .dis', 'keyup', function () {
			var tr = $(this).parent().parent();
			var qty = tr.find('.qty').val() - 0;
			var dis = tr.find('.dis').val() - 0;
			var price = tr.find('.price').val() - 0;
			var vat = price *qty*15/100;
			tr.find('.vatTotal').val(vat)
			var total = (qty * price) - ((qty * price * dis)/100);
			total = total + vat
			tr.find('.amount').val(total);
			totalAmount();
		});
		
        $('#hideshow').on('click', function(event) {  
			 $('#content').removeClass('hidden');
			$('#content').addClass('show'); 
             $('#content').toggle('show');
        });		
	});
</script>

<style>
.hidden{
  display : none;  
}
@media print {
	#bar{
		display: none
	}
    #printPage{
        display:none
    }
#close{
    display:none
}
    #yoyo{
        display:none
    }
    .close{
        display:none
    }
    .modal{
        border:none !important;
        box-shadow:none;
        text-decoration:none
    }
    .modal-content{
        border:none !important; box-shadow:none;
    }
    .modal-title{
        border:none !important;
    }
    *{
        border:none !important;
        box-shadow:none;
        text-decoration:none
    }
    table th{
        border: 1px solid #ddd !important;
    }
    
    table td{
        border: 1px solid #ddd !important;
    }
    
}
   

   
}
.show{
  display : block !important;
}
select.form-control.product_id {
    width: 150px;
}
</style>
<div class="container">

	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<form class="form-horizontal" id="yoyo" role="form" method="POST" action="{{ url('store/'.$store.'/orders') }}">
                        {!! csrf_field() !!}
						<div class="row">
							<div class="col-sm-4">
								<p dir="rtl">	اسم الزبون:</p>
								<input type="text" dir="rtl" class="form-control" name="name">
							</div>
							<div class="col-sm-4">
								<p dir="rtl">	رقم الهاتف:</p>
								<input type="text" class="form-control" name="number" placeholder="Customer Phone Number">
							</div>
							<div class="col-sm-4">
								<p dir="rtl">	موقعك:</p>
								<input type="text" dir="rtl" class="form-control" name="location" >
							</div>
						</div>    
						<br>
						<table class="table table-striped">
							<thead>
								<tr>
									<th>رقم الشيء<br>Item No</th>
									<th>Barcode #</th>
										<th>اسم العنصر	 <br>Item Name</th>
								<th>كمية<br>Quantity</th>
									<th>نوع الدفع<br>Payment Type</th>
									<th>السعر لكل وحدة<br>Price Per Unit</th>
									<th>يبة القيمة المضافة<br>VAT</th>
									<th>خصم<br>Discount</th>
									<th>كمية<br>Amount</th>
									<th>Operation</th>
									
								</tr>
							</thead>
							<tbody class="neworderbody">
								<tr>
									<td class="no">1</td>
									<td>
										<input type="text" id="bar" name="bar[]" class="bar form-control" required>
									</td>
									<td>
										<select class="form-control product_id" id="setPro" name="product_id[]" required>
											<option  value="">Select Product</option>
											@foreach($products as $product)
											<option data-price_credit="{!! $product->credit_price !!}" data-price_cash="{!! $product->cash_price !!}" data-qr="{!!$product->bar!!}" data-vat="{!!$product->vat!!}" value="{!! $product->id !!}">{!! $product->name!!}</option>
											@endforeach
										</select>
									</td>
									<td>
										<input type="text" class="qty form-control" name="qty[]" required>
									</td>
									<td>
										<select class="form-control Ptype" id="type" name="payment_t[]" >
											<option data_price="cash" value='cash'>Cash</option>	
											<option data_price="credit" value='credit'>Credit</option>	
										</select>
									</td>
									<td>
										<input type="text" class="price form-control" name="price[]" >
									</td>
									<td>
										<input type="text" class="vat form-control" id="vat" name="vat[]"> 
									</td>
									<td hidden="">
										<input type="text" class="vatTotal form-control" id="vat" name="vatTotal[]"> 
									</td>
									<td>
										<input type="text" class="dis form-control" name="dis[]" value="0">
									</td>
									<td>
										<input type="text" class="amount form-control" name="amount[]">
									</td>
									
								</tr>

							</tbody>
							
							<tfoot>
								<th colspan="6">Total:<b class="total">0</b></th>
							</tfoot>
														

						</table>	
						<input type="button" class="btn btn-md btn-primary add" value="أضف أداة جديدة">
						<br>
					<td>
					<hr>
						<input type="submit" class="btn btn-success btn-md" name="save" value="مكان الامر">
					</td>
					<hr>
				</div>
			</div>
		</div>
			<!--  Right -->

		 	
		 
		</form>
		<!-- Modal -->
		@if($orders)
			<script type="text/javascript">
			$(document).ready(function(){
				$('#myModal').modal('show')
			});
			</script>
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
					<div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h5 class="modal-title" id="myModalLabel">
							@foreach($orderby as $cust)
								<p dir="rtl">اسم الزبون:<strong> {!!$cust->name!!}</strong></p>
                                <p dir="rtl">هاتف العميل:<strong> {!!$cust->number!!}</strong></p>
                                <p dir="rtl">هاتف العميل: <strong>{!!$cust->location!!}</strong></p>
							@endforeach
							</h5>
                        </div>    
					<div class="modal-body">
						<div class="panel-body " id="toPrint">
							<table class="table table-striped" >
								<thead>
									<tr>
										<th>اسم العنصر<br>Item Name</th>
										<th>الشفرة<br>Code</th>
										<th>كمية<br>Qty</th>
										<th>سعر الوحدة<br>Unit Price</th>
										<th>ضنسبة ضريبة القيمة المضافة
<br>Vat %</th>
										<th>ضريبة القيمة المضافة<br>Vat value</th>
										<th>خصم<br>Discount</th>
										<th>المبلغ الإجمالي<br>Total </th>
									</tr>
								</thead>
								<tbody>
									@foreach($orders as $order)
									<tr>
										@foreach($products as $each_product)
											@if($each_product->id === $order->product_id)
												<td>{{ $each_product->name}}</td>
											@endif
										@endforeach
										<td>{!! $order->bar !!}</td>
										<td>{!! $order->quantity !!}</td>
										<td>{!! $order->unitprice !!}</td>
										<td>{!! $order->vat !!}</td>
										<td>{!! $order->vatTotal !!}</td>
										<td>{!! $order->discount !!}</td>
										<td>{!! $order->amount !!}</td>
									
									</tr>
									@endforeach
								</tbody>								
							</table>
							<div class="col-sm-pull-right">
								<strong><p style="text-align:right">إجمالي + ضريبة القيمة المضافة
: {{$sum}}</p></strong>
							</div>
						    <button class="btn btn-primary" id="printPage">مطبعة</button> 
						</div>
					</div>
					</div>
					<div class="modal-footer">
					<button type="button" class="btn btn-default" id ="close" data-dismiss="modal">Close</button>
					</div>
					</div>
				</div>
			</div>
		@endif
	<!-- Row End -->
	
 <script lang='javascript'>
 $(document).ready(function(){
  $('#printPage').click(function(){
        window.print()
    });
 });


 </script>
</div>

@endsection
