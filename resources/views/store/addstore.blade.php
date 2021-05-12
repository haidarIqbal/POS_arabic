@extends('layouts.store')

@section('content')
<div class="container">
    <a href="{{url('/store')}}">Go Back</a>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">إضافة متجر</div>
                <div class="panel-body">
                    <form class="form" role="form" method="POST" action="{{ url('store') }}">
                        {!! csrf_field() !!}

                        <div class="row form-group">

                            <div class="col-md-8">
                                <input type="text" class="form-control" dir="rtl" name="name"  required="">
                            </div>
                            <label class="col-md-2 control-label">اسم المتجر</label>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-8">
                                <input type="text" class="form-control" dir="rtl" name="location" required="">
                            </div>
                            <label class="col-md-4 control-label">موقع </label>
                        </div>

                        <div class=" row form-group">
                            <div class="col-md-3 col-md-offset-3">
                                <button type="submit" class="btn btn-success">
                                    إضافة متجر

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
