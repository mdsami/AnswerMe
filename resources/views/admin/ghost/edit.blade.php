@extends('admin.layouts.layout')
@section('title','تعديل بيانات الشبح')
@section('content')

<h3 class="header smaller ">تعديل بيانات:</h3>
@if(Session::has('status'))
   <div class="alert alert-info text-center">
        <h2>
     {{Session::get('status')}}
        </h2>
   </div>
   
@endif
<div class="container">
    <div class="row">
        


        <div class="col-md-5">
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color: #751a42;color:#fff ">تعديل بيانات الشبح</div>

                <div class="panel-body">
                    <form class="form-horizontal"  method="POST" action="/adminpanel/UsersMangemant/update/{{$ghost_info->id}}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">صورة الشبح</label>

                            <div class="col-md-6">
                                <input id="name" type="file" class="form-control" name="image" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('image'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    تعديل  <i class="fa fa-edit"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6" style="border:1px solid #751a42;">
            <img src="{{$ghost_info->imgUrl}}" style="width:100%; height:100%;">
        </div>



    </div>
</div>
@endsection
