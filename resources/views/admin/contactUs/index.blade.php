@extends('admin.layouts.layout')
@section('title','تواصل معنا')
@section('content')

<h3 class="header smaller ">تواصل معنا :</h3>
<div class="text-center alert alert-info" id="alert" style="display: none;"></div>
@if(Session::has('status'))
   <div class="alert alert-info text-center">
        <h2>
     {{Session::get('status')}}
        </h2>
   </div>
   
@endif


	<section class="contact_us" id="items">
		<div class="container">
			<div class="row">
				<div class="panel panel-default col-md-10 text-center">
				  <div class="panel-body">
				   		<div>
				   			<p class="email"
				   			   data-content="{{$contact_email[0]->contact_email}}"
				   			   style="font-size: 18px; cursor:pointer; "
				   			   data-toggle="modal" data-target="#myModal">اﻻيميل:{{$contact_email[0]->contact_email}}</p>
				   			
				   			<p style="font-size: 18px;">ارقام الهاتف:</p>
				   			<div>
				   				@foreach($phones as $ph)
				   				<span>{{$ph->phone}}--></span>
				   				@endforeach
				   			</div>
				   			<a href="#"    data-toggle="modal" data-target="#myModal" id="phone" class="btn btn-primary" style="margin-top: 10px;">اضافة رقم هاتف</a>
				   		</div>
				  </div>
				</div>
			</div>
		</div>
	</section>

	



	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel"></h4>
	      </div>
	      <div class="modal-body">
	       	<input type="hidden" id="type" >
	       	<input type="text" id="content" class="form-control">
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
		$(document).on('click','.email',function(evevt){
			$('#myModalLabel').text('تعديل بيانات البريد اﻻلكتروني');
			$('#type').val("email");
			var content=$(this).data('content');
			$('#content').val(content); 
			$('#alert').hide(400);
			
		});


		$(document).on('click','#phone',function(evevt){
			$('#myModalLabel').text('اضافة هاتف جديد');
			$('#type').val("phone");
			$('#content').val("");
			$('#alert').hide(400);
		});



	
		$(document).on('click','#submit',function(evevt){
			var type =$('#type').val();
			var content=$('#content').val();
			if(type == "email"){

				var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
					console.log(emailReg.test(content));
					if(emailReg.test(content) == true){
						$.post('/adminpanel/contact_us/update/email',{'content':content,'_token':$('input[name=_token]').val()},
							function(data){
								$('#items').load(location.href+'  #items');	
							});
					}else{
						$('#alert').text('تاكد من ادخال البريد اﻻلكتروني بالطريقة الصحيحة');
						$('#alert').show(400);
					}


			}else if(type = "phone"){
				  if(!content.match(/^\d+/)){
				  	$('#alert').text('تاكد من ادخال رقم الهاتف بالطرقة الصحيحة');
				  	$('#alert').show(400);
				  }else{
				$.post('/adminpanel/contact_us/insert_phone',{'content':content,'_token':$('input[name=_token]').val()},
					function(data){
						$('#items').load(location.href+'  #items');	
					});	
				}
			}

		});




	});
</script>

@endsection	