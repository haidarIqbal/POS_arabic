@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">تحديث المنتج</div>
                <div class="panel-body">
                    <form class="form" role="form" method="POST" action="{{ url('/store/'.$store.'/product', $productToUpdate->id) }}">
                        {!! csrf_field() !!}
						<input type="hidden" name="_method" value="PUT">
                         <div class="row form-group">
                            <div class="col-md-6">
                                <input type="text"  class="form-control" name="bar" required="" value="{!! $productToUpdate->bar !!}">
                            </div>
                            <label class="col-md-4 control-label">رقم الباركود</label>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-6">
                                <input type="text" dir="rtl" class="form-control" name="name" required="" value="{!! $productToUpdate->name !!}">
                            </div>
                            <label class="col-md-4 control-label">اسم المنتج</label>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-6">
                                <input type="text" dir="rtl" class="form-control" name="company" required="" value="{!! $productToUpdate->company !!}">
                            </div>
                            <label class="col-md-4 control-label">شركة البند</label>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="cash_price" required="" value="{!! $productToUpdate->cash_price !!}">                            
                            </div>
                            <label class="col-md-4 control-label">السعر النقدي</label>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="credit_price" required="" value="{!! $productToUpdate->credit_price !!}">
                            </div>
                            <label class="col-md-4 control-label">سعر الائتمان</label>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-6">
                                <input type="text" dir="rtl" class="form-control" name="color" required="" value="{!! $productToUpdate->color !!}">
                            </div>
                            <label class="col-md-4 control-label">اللون</label>
                        </div>

                         <div class="row form-group">
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="quantity" required="" value="{!! $productToUpdate->cash_price !!}">
                            </div>
                            <label class="col-md-4 control-label">كمية</label>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="vat" required="" value="{!! $productToUpdate->vat !!}">
                            </div>
                            <label class="col-md-4 control-label">رضريبة القيمة المضافة</label>
                        </div>

                         <div class="row form-group">
                            <div class="col-md-6">
                                <input type="text"  dir="rtl" class="form-control" name="desc" required="" value="{!! $productToUpdate->desc !!}">
                            </div>
                            <label class="col-md-4 control-label">روصف</label>
                        </div>




                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                   تحديث المنتج
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
