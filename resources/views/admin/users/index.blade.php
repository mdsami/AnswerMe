@extends('admin.layouts.layout')

@section('title','ادارة المستخدمين')
@section('links')
<meta name="description" content="responsive photo gallery using colorbox" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
@endsection



@section('content')


	<style type="text/css">
		.rtl .ace-thumbnails>li>.tools{
			text-align: center;
			right:-30px;
			left:0px;  
		}
		.tags{
			top:0px;
		}
	</style>







		<h3 class="header smaller ">ادارة المستخدمين:</h3>

		@if(Session::has('status'))
		   <div class="alert alert-info text-center">
		  		<h2>
		  	 {{Session::get('status')}}
		  	 	</h2>
		   </div>
		   
		@endif



	<section class="users">
		<div class="container">
				<div style="margin-bottom: 20px;">
				<button type="button"  class="btn btn-primary btn-lg " data-toggle="modal" data-target="#myModal">
				  بحث عن المستخدمين <i class="fa fa-search"></i>
				</button>

				<button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#ghost">
				  صور اﻻشباح <i class="fa fa-info-circle"></i>
				</button>
					</div>
				<div class="row">
					<div class="col-xs-12">
							<div id="content">
						@foreach($users as $user)
						<div  id="{{$user->id}}">
							<div class=" col-md-3 col-sm-6 col-xs-12">
								<div class="ace-thumbnails clearfix">
								<li>
									<a href="/adminpanel/UsersMangemant/profile/{{$user->id}}" data-rel="colorbox">
										<img width="250" height="250" alt="{{$user->name}}" src="{{$user->photo}}" />
										<div class="text" >
											<div class="inner" style="color:#fff; font-size:18px;">{{$user->name}}</div>
										</div>
									</a>
									<div class="tags" id="tags{{$user->id}}">
										@if($user->is_active == 1)
										<span class="label-holder">
											<a href="#"
											   data-id="{{$user->id}}"
											   class="label label-primary disactive"
											   data-toggle="modal"
											   data-target="#user_setting">مفعل</a>
										</span>
										@else
										<span class="label-holder">
											<a 
												href="#"
												data-id="{{$user->id}}"
												class="label label-danger active"
												data-toggle="modal"
												data-target="#user_setting">معطل</a>
										</span>
										
										@endif
									</div>

									<div class="tools tools-bottom">
										<a href="/adminpanel/UsersMangemant/edit/{{$user->id}}">
											<i class="ace-icon fa fa-edit"></i>
										</a>
										<a  class="delete_user" data-id="{{$user->id}}" data-toggle="modal" data-target="#user_setting">
											<i class="ace-icon fa fa-times red"></i>
										</a>
									</div>
								</li>
							</div>
						</div>
					</div>
					@endforeach	
					</div>	
				</div>
			</div>

			<a href="/adminpanel/UsersMangemant/add" style="margin-top:20px;" class="btn btn-primary">اضافة مستخدم جديد</a>
		   	<a
		   		id="load_more"
		   		class="btn btn-success"
		   		data-page="1" 
		   		style="margin-top:20px;"> <i class="fa fa-plus"></i> تحميل المزيد</a>		
		</div>
	</section>


	<!-- Button trigger modal -->


	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">بحث عن المستخدمين </h4>
	      </div>
	      <div class="modal-body">
	      	<div class="row">
	        	
	        	    <label for="password_confir" class="col-md-3 control-label">بحث المستخدمين:</label>
	        	    <div class="col-md-8">
	        	        <input id="txt_name"
	        	        	   type="text"  class="form-control" />
	        	    </div>
	        	
	        </div>	

	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">اغﻻق</button>
	        <button type="button"
	        	    class="btn btn-primary"
	        	    id="search"
	        	    data-toggle="modal" data-target=".bs-example-modal-lg"
	        	    >بحث <i class="fa fa-search"></i></button>
	      </div>
	    </div>
	  </div>
	</div>



	<!-- Large modal -->
	

	<!-- Large modal -->


	<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
	  <div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content">
	         <div class="modal-header">
	         	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	         	<h4 class="modal-title" id="myModalLabel">بحث عن المستخدمين </h4>

	         </div>
	         	<div class="modal-body">
	         		 <div class="text-center">
		          		<div class="row" id="mysearch_content">
		          		
		          		</div>
	          		</div>
	          </div>
	        <div class="modal-footer">
	        	<button type="button" class="btn btn-default" data-dismiss="modal">اغﻻق</button>
	        </div>
	    </div>
	  </div>
	</div>





		          			




    <div class="modal fade" id="ghost" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		          			      <div class="modal-dialog" role="document">
		          			        <div class="modal-content">
		          			          <div class="modal-header">
		          			            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		          			            <h4 class="modal-title" id="myModalLabel">صور اﻻشباح</h4>
		          			          </div>
		          			          <div class="modal-body">
		          			          	<div class="row">
		          			           	@foreach($GhostImage as $image)
		          			           	    <div class="col-md-4 col-sm-6 col-xs-12" ">
		          			           	    	<a href="/adminpanel/UsersMangemant/GhostImage/edit/{{$image->id}}">
		          			             		<img src="{{$image->imgUrl}}" style="width:180px; height:200px;" >
		          			             		</a>
		          			             	</div>
		          			            @endforeach
		          			            </div>
		          			          </div>
		          			          	<div class="modal-footer">
		          			            <button type="button" class="btn btn-default" data-dismiss="modal">اغﻻق</button>
		          			            <a href="/adminpanel/GhostImage" class="btn btn-danger">ادارة اﻻشباح</a>
		          			          </div>
		          			        </div>
		          			      </div>
	</div>





	<!-- Modal -->
	<div class="modal fade" id="user_setting" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="user_setting_title"></h4>
	      </div>
	      <div class="modal-body">
	        	<div class="row">
	        		<p id="user_setting_content" style="font-size: 18px;"></p>
	   		        <input id="user_id" type="hidden"  class="form-control"  />
	   		        <input id="user_operation" type="hidden" >
	          </div>	
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">اغﻻق</button>
	        <button type="button" class="btn btn-primary" id="submit" data-dismiss="modal">حفظ</button>
	      </div>
	    </div>
	  </div>
	</div>



		          			 

@endsection

@section('footer')
	{{csrf_field()}}


<script type="text/javascript">


		$(document).ready(function(){
			$(document).on('click','#load_more',function(){
				var page=$(this).data("page");
				$('#load_more').data('page',page+1);
			
				$.post('/adminpanel/loadUser',
					{'page':page, 
				     '_token':$('input[name=_token]').val()
				    },function(data){

				    	var root = location.protocol + '//' + location.host;
				    	var img=root+"/profile.svg";
				    	if(data.length == 0)
				    		$('#load_more').hide();
				    	else{

				    	for (var i=0; i <data.length;i++) {
				    		var image=data[i]["photo"];
				    		if(image == null){
				    			image=img;	
				    		}
				    		var status="";
				    			if(data[i]["is_active"] == 1){
				    				status='<span class="label-holder"><a href="#" data-id="'+data[i]["id"]+'" class="label label-primary disactive" data-toggle="modal" data-target="#user_setting">مفعل</a></span>';
				    			}else if(data[i]["is_active"] == 0){
				    				status='<span class="label-holder"><a href="#"data-id="'+data[i]["id"]+'"class="label label-danger active" data-toggle="modal" data-target="#user_setting">معطل</a> </span>';
				    			}
				    		document.getElementById('content').innerHTML +='<div id="'+data[i]["id"]+'"><div class="col-md-3 col-sm-6 col-xs-12"><div class="ace-thumbnails clearfix"><li><a href="/adminpanel/UsersMangemant/profile/'+data[i]["id"]+'" data-rel="colorbox"><img width="250" height="250" alt="'+data[i]["name"]+'" src="'+image+'" /><div class="text" ><div class="inner" style="color:#fff; font-size:18px;">'+data[i]["name"]+'</div></div></a><div class="tags" id="tags'+data[i]["id"]+'">'+status+'</div><div class="tools tools-bottom"><a href="/adminpanel/UsersMangemant/edit/'+data[i]["id"]+'"><i class="ace-icon fa fa-edit"></i></a><a  class="delete_user" data-id="'+data[i]["id"]+'" data-toggle="modal" data-target="#user_setting"><i class="ace-icon fa fa-times red"></i></a></div></li></div></div>';                                                  
				    		}
				    		
				    	}
					});
			});	



			$(document).on('click','#search',function(event){
				var content=$('#txt_name').val();
					if(content == "")
						document.getElementById('mysearch_content').innerHTML="<h2>ﻻ يوجد نتائج للبحث</h2>";
					else{
						console.log(content);
						$.post('/adminpanel/search',
							    {'content':content,'_token':$('input[name=_token]').val()},
							    function(data){
							    	
							    	var root = location.protocol + '//' + location.host;
							    	var img=root+"/profile.svg";
							    	if(data.length == 0)
							    		document.getElementById('mysearch_content').innerHTML="<h2>ﻻ يوجد نتائج للبحث</h2>";
							    	else{
							    		document.getElementById('mysearch_content').innerHTML="";
							  for (var i=0; i <data.length;i++) {
								  	var image=data[i]["photo"];
								  	if(image == null){
								  		image=img;	
							 		 	}
							  	document.getElementById('mysearch_content').innerHTML +='<div id="'+data[i]["id"]+'"><div class="col-md-3 col-sm-6 col-xs-12"><div class="ace-thumbnails clearfix"><li><a href="/adminpanel/UsersMangemant/profile/'+data[i]["id"]+'" data-rel="colorbox"><img width="200" height="200" alt="'+data[i]["name"]+'" src="'+image+'" /><div class="text" ><div class="inner" style="color:#fff; font-size:18px;">'+data[i]["name"]+'</div></div></a><div class="tools tools-bottom"><a href="/adminpanel/UsersMangemant/edit/'+data[i]["id"]+'"><i class="ace-icon fa fa-edit"></i></a></div></li></div></div>';                                                  
							  	}
							    		
							    	}
							    });
					}
			});


			$(document).on('click','.delete_user',function(event){
				var id =$(this).data('id');
				$('#user_setting_content').text("هل انت متاكد من حذف المستخدم؟");
				$('#user_setting_title').text('حذف المستخدم');
				$('#user_id').val(id);
				$('#user_operation').val("delete_user");

			});


			$(document).on('click','#submit',function(event){
				var id=$('#user_id').val();
				var user_operation=$('#user_operation').val();
				

				if (user_operation == "delete_user") {
					$.post('/adminpanel/UsersMangemant/delete_user',
							{'user_id':id,'_token':$('input[name=_token]').val()},
							function(data){
								if(data == "error")
									alert('not allowed');
								else
								$('#'+id).hide();
							});
				}else if(user_operation =="disactive"){
					$.post('/adminpanel/UsersMangemant/disactive',
							{'user_id':id,'_token':$('input[name=_token]').val()},
							function(data){
								if(data == "error")
									alert('not allowed');
								else{
								$('#tags'+id).html('<span class="label-holder"><a href="#" data-id="'+id+'"class="label label-danger active" data-toggle="modal" data-target="#user_setting">معطل</a></span>');
								}
							});
				}else if(user_operation == "active"){
					$.post('/adminpanel/UsersMangemant/active',
							{'user_id':id,'_token':$('input[name=_token]').val()},
							function(data){
								if(data == "error")
									alert('not allowed');
								else{
								$('#tags'+id).html('<span class="label-holder"><a href="#" data-id="'+id+'"class="label label-primary disactive" data-toggle="modal" data-target="#user_setting">مفعل</a></span>');
								}
							});
				}


			});

			$(document).on('click','.disactive',function(event){
				var id=$(this).data('id');
				$('#user_setting_content').text("هل تريد تعطيل المستخدم؟");
				$('#user_setting_title').text('تعطيل المستخدم');
				$('#user_id').val(id);
				$('#user_operation').val("disactive");
			});

			$(document).on('click','.active',function(event){
				var id=$(this).data('id');
				$('#user_setting_content').text("هل تريد تفعيل المستخدم؟");
				$('#user_setting_title').text('تفعيل المستخدم');
				$('#user_id').val(id);
				$('#user_operation').val("active");
			});
		});

</script>

@endsection


		













