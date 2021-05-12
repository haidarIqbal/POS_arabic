@extends('layouts.store')

@section('content')
<div class="container">
	<div class="col-md-8">
	<a href="{{ url('store/create') }}">
		<button class="btn btn-primary">Create New Store</button>
	</a>
	</div>

	<div class="col-md-8">
	<hr>
	</div>
	<div class="col-md-8">
		<table class="table table-striped tablesed">
			<thead>
				<tr>
				<th>اسم المتجر</th>
				<th>موقع المتجر</th>
				<th>أنشئت في</th>
				<th>تم التحديث في</th>
				<th>تعديل</th>
				<th>حذف</th>
				</tr>
			</thead>
			<tbody>
				@foreach($stores as $store)						
					<tr>
					<td><a href="{{ url('store/'.$store->id.'/product') }}" class="btn btn-info">{!! $store->name !!}</a></td>
					<td>{!! $store->location !!}</td>
					<td>{!! $store->created_at !!}</td>
					<td>{!! $store->updated_at !!}</td>
					<td>
						
						{!! Form::open(array('url' => "/store/$store->id/edit" , 'method' => 'GET')) !!}
							{!! Form::hidden('id', $store->id) !!}
								<button type="submit" class="btn btn-default">تعديل</button>
						{!! Form::close() !!}
					</td>
					<td>
						{!! Form::open(array('url' => '/store/destroy' ,  'method' => 'delete')) !!}
							{!! Form::hidden('id', $store->id) !!}
								<button type="submit" class="btn btn-default">حذف</button>
						{!! Form::close() !!}
					</td>
					</tr>
				@endforeach
			</tbody>
		</table>
    </div>
</div>
@endsection
