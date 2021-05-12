@extends('layouts.app')

@section('content')
<div class="container">
<a href="{{url('/store')}}">Go Back</a>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Update Store</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/store', $store->id) }}">
                        {!! csrf_field() !!}
						 <input type="hidden" name="_method" value="PUT">

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Store Name</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" value="{!! $store->name !!}"  required="">

                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Store Location</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="location" value="{!! $store->location !!}"  required="">
                               
                            </div>
                        </div>

                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i>Update Store
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
