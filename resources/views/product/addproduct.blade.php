@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">اضافة عنصر</div>
                
                <div class="panel-body " >
                    <form class="form" role="form" method="POST" action="{{ url('store/'.$store.'/product') }}">
                        {!! csrf_field() !!}

                        <div class="row form-group">
                            <div class="col-md-6">
                                <input type="text"  class="form-control" name="bar" required="">
                            </div>
                            <label class="col-md-4 control-label">رقم الباركود</label>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-6">
                                <input type="text" dir="rtl" class="form-control" name="name" value="{{ old('name') }}" required="">
                            </div>
                            <label class="col-md-4 control-label">اسم المنتج</label>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-6">
                                <input type="text" dir="rtl" class="form-control" name="company" required="">
                            </div>
                            <label class="col-md-4 control-label">شركة البند</label>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="cash_price" required="">                               
                            </div>
                            <label class="col-md-4 control-label">السعر النقدي</label>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="credit_price" required="">
                            </div>
                            <label class="col-md-4 control-label">سعر الائتمان</label>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-6">
                                <input type="text" dir="rtl" class="form-control" name="color" required="">
                            </div>
                            <label class="col-md-4 control-label">اللون</label>
                        </div>

                        
                        <div class="row form-group">

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="quantity" required="">

                            </div>
                            <label class="col-md-4 control-label">كمية</label>
                        </div>
                        <div class="row form-group">

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="vat" required="">

                            </div>
                            <label class="col-md-4 control-label">رضريبة القيمة المضافة</label>
                        </div>
                         <div class="row form-group">
                            <div class="col-md-6">
                                <input type="text"  dir="rtl" class="form-control" name="desc" required="">
                            </div>
                            <label class="col-md-4 control-label">روصف</label>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                  اضافة عنصر
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
