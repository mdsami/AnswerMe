@extends('admin.layouts.layout')
@section('title','ادارة صورة اﻻشباح')
@section('content')

<h3 class="header smaller ">ادارة صور اﻻشباح:</h3>
@if(Session::has('status'))
   <div class="alert alert-info text-center">
        <h2>
     {{Session::get('status')}}
        </h2>
   </div>
   
@endif

	<button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#myModal">
		اضافة اشباح <i class="fa fa-plus"></i>
	</button>
	<hr>
	<div class="container">
		<div class="row">
				@foreach($GhostImage as $image)
				    <div class="col-md-4 col-sm-6 col-xs-12"
				     style="width:250px; height: 250px; border:1px solid #751a42; margin-bottom:5px; margin-right:5px; border-radius: 5px;   ">
				    	<a href="/adminpanel/UsersMangemant/GhostImage/edit/{{$image->id}}">
			  		<img src="{{$image->imgUrl}}" style="width:100%; height: 100% "  >
			  		</a>
			  	</div>
			 @endforeach
		</div>
	</div>



	<!-- Button trigger modal -->


	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">اضافة صورة شبح</h4>
	      </div>
	      <div class="modal-body">
	       
	      	<form class="form-horizontal"  method="POST" action="/adminpanel/UsersMangemant/insertghost" enctype="multipart/form-data">
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
	      	                اضافة  <i class="fa fa-plus"></i>
	      	            </button>
	      	            <button type="button" class="btn btn-default" data-dismiss="modal">اغﻻق</button>
	      	        </div>
	      	    </div>
	      	</form>
	       	
	      </div>

	    </div>
	  </div>
	</div>









      



@endsection