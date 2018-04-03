@extends('admin.layouts.layout')

@section('title','تعديل بيانات المستخدم')




@section('content')

		<h3 class="header smaller ">تعديل بيانات المستخدم:</h3>


		@if(Session::has('status'))
		   <div class="alert alert-info text-center">
		  		<h2>
		  	 {{Session::get('status')}}
		  	 	</h2>
		   </div>
		   
		@endif



		<section class="edit">
			<div class="container">
			    <div class="row">
			        <div class="col-md-8 col-md-offset-2">
			            <div class="panel panel-default">
			                <div class="panel-heading" style="color:#fff;background-color:#751a42;">تعديل بيانات المستخدم</div>
			                <div class="panel-body">
			                    <form class="form-horizontal" role="form" method="POST" action="/adminpanel/UsersMangemant/insert" enctype="multipart/form-data">
			                        {{ csrf_field() }}

			                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
			                            <label for="email" class="col-md-2 control-label">اﻻسم:</label>

			                            <div class="col-md-8">
			                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

			                                @if ($errors->has('name'))
			                                    <span class="help-block">
			                                        <strong>{{ $errors->first('name') }}</strong>
			                                    </span>
			                                @endif
			                            </div>
			                        </div>


			                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
			                            <label for="phone" class="col-md-2 control-label">رقم التليفون:</label>

			                            <div class="col-md-8">
			                                <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}" required autofocus>

			                                @if ($errors->has('phone'))
			                                    <span class="help-block">
			                                        <strong>{{ $errors->first('phone') }}</strong>
			                                    </span>
			                                @endif
			                            </div>
			                        </div>



			                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
			                            <label for="email" class="col-md-2 control-label">البريد اﻻلكتروني:</label>

			                            <div class="col-md-8">
			                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

			                                @if ($errors->has('email'))
			                                    <span class="help-block">
			                                        <strong>{{ $errors->first('email') }}</strong>
			                                    </span>
			                                @endif
			                            </div>
			                        </div>

			                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
			                            <label for="password" class="col-md-2 control-label">الرقم السري</label>

			                            <div class="col-md-8">
			                                <input id="password" type="password" value="{{ old('password') }}" required class="form-control" name="password" >

			                                @if ($errors->has('password'))
			                                    <span class="help-block">
			                                        <strong>{{ $errors->first('password') }}</strong>
			                                    </span>
			                                @endif
			                            </div>
			                        </div>


			                        <div class="form-group{{ $errors->has('password_confir') ? ' has-error' : '' }}">
			                            <label for="password_confir" class="col-md-2 control-label">تاكيد الرقم السري</label>

			                            <div class="col-md-8">
			                                <input id="password_confir" type="password" required class="form-control" name="password_confir" >

			                                @if ($errors->has('password_confir'))
			                                    <span class="help-block">
			                                        <strong>{{ $errors->first('password_confir') }}</strong>
			                                    </span>
			                                @endif
			                            </div>
			                        </div>

			                        <div class="form-group{{ $errors->has('photo') ? ' has-error' : '' }}">
			                            <label for="photo" class="col-md-2 control-label">صورة المستخدم</label>

			                            <div class="col-md-8">
			                                <input id="photo" type="file" required="" class="form-control" name="photo" >

			                                @if ($errors->has('photo'))
			                                    <span class="help-block">
			                                        <strong>{{ $errors->first('photo') }}</strong>
			                                    </span>
			                                @endif
			                            </div>
			                        </div>


			                        <div class="form-group{{ $errors->has('is_verified') ? ' has-error' : '' }}">
			                            <label for="is_verified" class="col-md-2 control-label">وضع التحقيق:</label>

			                            <div class="col-md-8">
			                               		<select class="form-control" name="is_verified" >
			                               			<option>...</option>
			                               			<option value="1">تم التحقيق</option>
			                               			<option value="0" >لم يتم التحقيق</option>
			                               		</select>

			                                @if ($errors->has('is_verified'))
			                                    <span class="help-block">
			                                        <strong>{{ $errors->first('is_verified') }}</strong>
			                                    </span>
			                                @endif
			                            </div>
			                        </div>


			                        <div class="form-group{{ $errors->has('is_active') ? ' has-error' : '' }}">
			                            <label for="is_active" class="col-md-2 control-label">وضع التفعيل:</label>

			                            <div class="col-md-8">
			                               		<select class="form-control" name="is_active">
			                               			<option>...</option>
			                               			<option value="1" >مفعل</option>
			                               			<option value="0">معطل</option>
			                               		</select>

			                                @if ($errors->has('is_active'))
			                                    <span class="help-block">
			                                        <strong>{{ $errors->first('is_active') }}</strong>
			                                    </span>
			                                @endif
			                            </div>
			                        </div>



			                        <div class="form-group{{ $errors->has('ghostName') ? ' has-error' : '' }}">
			                            <label for="ghostName" class="col-md-2 control-label">اسم الشبح:</label>

			                            <div class="col-md-8">
			                                <input id="ghostName" type="text" value="{{ old('ghostName') }}" class="form-control" name="ghostName" required>

			                                @if ($errors->has('ghostName'))
			                                    <span class="help-block">
			                                        <strong>{{ $errors->first('ghostName') }}</strong>
			                                    </span>
			                                @endif
			                            </div>
			                        </div>


			                        <div class="form-group{{ $errors->has('GhostImage') ? ' has-error' : '' }}">
			                            <label for="GhostImage" class="col-md-2 control-label">صورة الشبح:</label>

			                            <div class="col-md-8">


			                            	@foreach($GhostImage as $image)
			                                <div style="width:50px; height:50px; float:left; margin-left:15px; margin-bottom: 40px;">
			                                	<input  id="GhostImage"
			                                	    	type="radio"
			                                	    	class="form-control"
			                                	    	name="GhostImage"
			                                	    	required value="{{$image->id}}">
			                                	<img src="{{$image->imgUrl}}" style="width:50px; height:50px;">
			                                </div>
			                                @endforeach
			                                @if ($errors->has('GhostImage'))
			                                    <span class="help-block">
			                                        <strong>{{ $errors->first('GhostImage') }}</strong>
			                                    </span>
			                                @endif
			                            </div>
			                        </div>
			                        <div class="form-group">
			                            <div class="col-md-8 col-md-offset-4">
			                                <button type="submit" class="btn btn-primary">
			                                  اضافة
			                                   <i class="fa fa-plus"></i> 
			                                </button>
			                            </div>
			                        </div>
			                    </form>
			                </div>
			            </div>
			        </div>
			    </div>
			</div>

		</section>


		

@endsection
