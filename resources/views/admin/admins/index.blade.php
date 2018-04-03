@extends('admin.layouts.layout')
@section('title','ادارة المسئولين')
@section('content')

<div class="header smaller lighter blue"><h1>ادارة المسئولين:</h1></div>




		   <div class="text-center" style="font-size: 18px; display: none;" id="alert"> </div>
		   <div id="notifaction" class="alert alert-danger text-center" style="margin:20px; display: none; font-size: 18px;"></div>




<section class="admins">
	<div class="container">
		<div class="row" id="items">


			@if(count($admins)==0)
				<div class="alert alert-info text-center" style="font-size:18px ">ﻻ يوجد مسئولين للعرض برجاء اضافة احد المسئولين</div>
			@else
				<div class="table-responsive col-md-12" style="font-size: 18px; overflow-y:hidden;  ">
					<table class="table col-" >
						<thead>
							<tr>
								
								<td>البريد اﻻلكتروني</td>
							
								<td>التحكم</td>
							</tr>
						</thead>
						<tbody>
							@foreach($admins as $admin)
								<tr>
								
									<td>{{$admin->email}}</td>
																<td>
										<a href="#"
		   								   data-toggle="modal"
		  								   data-target="#myModal"
		  								   data-id="{{$admin->id}}"
		  								   data-name="{{$admin->name}}"
		  								   data-email="{{$admin->email}}"
		  								   class="label label-primary update">تعديل</a>
											<a href="#"
		   									   data-toggle="modal"
		  									   data-target="#myModal"
		  									   data-id="{{$admin->id}}"
		  									   data-name="{{$admin->name}}"
		  								  	   data-email="{{$admin->email}}"		  									   
		  									   class="label label-danger delete ">حذف</a>
									</td>
									</tr>
							@endforeach
						</tbody>
					</table>
							{{ $admins->links() }}
						
				</div>
			@endif
			
		</div>	
		<a href="#"
		   id="insert_admin"
		   data-toggle="modal"
		   data-target="#myModal"
		   class="btn btn-primary">اضافة مسئول جديد</a>
	</div>
</section>





<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
      					<div id="modal_body" style="display: none; font-size: 18px;"></div>
        		<div class="row" id="mymodal_contant">
        			<input type="hidden" id="id">
        		
        			 <div class="col-xs-12" style="margin-top:10px; ">
        			 	   <label for="policy_user_ar" class="col-md-3" >اﻻسم:</label>
        			     <div class="col-md-6">
        			 	    <input type="text"  id="name" class="form-control">
        			 </div>
        			</div> 


	        	     <div class="col-xs-12" style="margin-top:10px; ">
	        	     	   <label for="policy_user_ar" class="col-md-3" >البريد اﻻلكتروني:</label>
	        	         <div class="col-md-6">
	        	     	    <input type="text"  id="email" class="form-control">
	        	     </div>
	        	    </div> 


	        	     <div class="col-xs-12" style="margin-top:10px; ">
	        	     	   <label for="policy_user_ar" class="col-md-3" >الرقم السري:</label>
	        	         <div class="col-md-6">
	        	     	    <input type="password"  id="password" class="form-control">
	        	     </div>
	        	    </div> 


	        	     <div class="col-xs-12" style="margin-top:10px; ">
	        	     	   <label for="policy_user_ar" class="col-md-3" >تاكيد الرقم السري:</label>
	        	         <div class="col-md-6">
	        	     	    <input type="password"  id="password_confirm" class="form-control">
	        	     </div>
	        	    </div> 

        	     
        	     </div>




      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">اغﻻق</button>
        <button type="button" id="add"     class="btn btn-primary" data-dismiss="modal">ادخال</button>
        <button type="button" id="update"  class="btn btn-success" data-dismiss="modal">حفظ التغيرات</button>
        <button type="button" id="delete"  class="btn btn-danger" data-dismiss="modal">حذف</button>

       
      </div>
    </div>
  </div>
</div>





@endsection

@section('footer')
	{{csrf_field()}}

	<script type="text/javascript">
		$(document).ready(function(){
			
			$(document).on('click','#insert_admin',function(event){
				$('#notifaction').hide(400);
				$('#alert').hide(400);
				$('#update').hide(400);
				$('#delete').hide(400);
				$('#add').show(400);
				$('#myModalLabel').text('ادخال مسئول جديد');
				$('#mymodal_contant').show(400);
				$('#modal_body').hide(400);
				$('#name').val("");
				$('#email').val('');
				$('#password').val("");
				$('#password_confirm').val("");
			});


			$(document).on('click','.update',function(event){
				var id=$(this).data("id");
				var name=$(this).data("name");
				var email=$(this).data("email");
				$('#name').val(name);
				$('#email').val(email);
				$('#id').val(id);
				$('#notifaction').hide(400);
				$('#alert').hide(400);
				$('#update').show(400);
				$('#delete').hide(400);
				$('#add').hide(400);
				$('#myModalLabel').text('تعديل بيانات');
					$('#mymodal_contant').show(400);
					$('#modal_body').hide(400);

			});


			$(document).on('click','.delete',function(event){
				var id=$(this).data("id");
				$('#id').val(id);
				$('#notifaction').hide(400);
				$('#alert').hide(400);
				$('#update').hide(400);
				$('#delete').show(400);
				$('#add').hide(400);
				$('#myModalLabel').text('حذف المسئول');
				$('#mymodal_contant').hide(400);
				$('#modal_body').show('400');
				$('#modal_body').text('هل انت متاكد من حذف المسئول المحدد؟؟؟');
			});

			$(document).on('click','#add',function(event){
				var name=$('#name').val();
				var email=$('#email').val();
				var password=$('#password').val();
				var password_confirm=$('#password_confirm').val();
				var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
				         var error=[];
					
					if(name.length <=3)
						error.push('يجب ان يكون اﻻسم ثﻻثة حروف فاكثر');
								
					if(reg.test(email) == false) 
							error.push("يجب ادخال البريد اﻻلكتروني بالطريقة الصحيحىة");
					if(password !==password_confirm || password.length <3)
						error.push("يجب ادخال وتاكيد الرقم السري بالطريقة الصحيحة وانت يكون اكثر من او يساوي 3 حروف");
						
					if(error.length !=0){
					
						
						$('#notifaction').show(400);
						document.getElementById('notifaction').innerHTML = '';
						for (var i = 0; i < error.length; i++) {
							document.getElementById('notifaction').innerHTML +="<p>"+error[i]+"<p/>";
						}
					}else{
						$.post('/adminpanel/admins/insert',
							{'name':name,
							'email':email,
							'password':password,
							'_token':$('input[name=_token]').val()},
								function(data){
							$('#name').val('');
							$('#email').val('');
							$('#password').val("");
							$('#password_confirm').val("");
							
							$('#alert').show();
							document.getElementById('alert').innerHTML =data;
							$('#items').load(location.href+' #items');
						});
					} 	
			});

			$(document).on('click','#update',function(event){
				var id=$('#id').val();
				var name=$('#name').val();
				var email=$('#email').val();
				var password=$('#password').val();
				var password_confirm=$('#password_confirm').val();
				var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
       			var error=[];

       			if(name.length <=3)
       				error.push('يجب ان يكون ثﻻثة حروف او اكثر');

       			if(reg.test(email) == false) 
       					error.push("يجب ادخال البريد اﻻلكتروني بالطريقة الصحيحىة");
       			if(password.length > 1){
       				if(password !==password_confirm || password.length <3)
       					error.push("يجب ادخال وتاكيد الرقم السري بالطريقة الصحيحة وانت يكون اكثر من 3  او يساوي حروف");
       			}



       			if(error.length !=0){
       				$('#notifaction').show();
       				document.getElementById('notifaction').innerHTML = '';
       				for (var i = 0; i < error.length; i++) {
       					document.getElementById('notifaction').innerHTML +="<p>"+error[i]+"<p/>";
       				}
       			}else{
       				$.post('/adminpanel/admins/update',
       					{'id':id,
       					 'name':name,	
       					 'email':email,
       					 'password':password,
       				     '_token':$('input[name=_token]').val()},
       						function(data){
       					$('#name').val('');		
       					$('#email').val('');
       					$('#password').val("");
       					$('#password_confirm').val("");
       					$('#alert').show();
       					document.getElementById('alert').innerHTML =data;
       					$('#items').load(location.href+' #items');
       				});
       			}	
			});

			$(document).on('click','#delete',function(event){
					var id=$('#id').val();
					$('#mymodal_contant').show(400);
					$('#modal_body').hide(400);
					$.post('/adminpanel/admins/delete',
						{'id':id,'_token':$('input[name=_token]').val()},
							function(data){
															$('#alert').show();
								document.getElementById('alert').innerHTML =data;
								$('#items').load(location.href+' #items');
					});
					
			});

		});
	</script>




@endsection




