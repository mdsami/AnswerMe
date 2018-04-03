@extends('admin.layouts.layout')
@section('title','شروط اﻻستاخدم')
@section('content')

<h3 class="header smaller ">شروط اﻻستخدام:</h3>
@if(Session::has('status'))
   <div class="alert alert-info text-center">
        <h2>
     {{Session::get('status')}}
        </h2>
   </div>
   
@endif




	<section class="policy" id="items">
		<div class="container">
			<div class="row">
				<div class="panel panel-default col-md-10"  >
				  <div class="panel-heading" style="color:#fff; background-color:#751a42;">
				  	<a data-contnt="{{$policy[0]->policy_terms_ar}}" data-toggle="modal" data-target="#myModal" id="arabic" style="color: #fff;" class="pull-left"><i class="fa fa-edit fa-2x"></i> </a>
				    <h3 class="panel-title">العربية</h3>

				  </div>

				  <div class="panel-body">
				 		<div style="width:100%;  max-height:400px;  overflow-y:scroll; word-break:break-all;   ">
				   	<p id="contnt_arabic">{{$policy[0]->policy_terms_ar}}</p></div>
				  </div>
				</div>

				<div class="panel panel-default col-md-10"  >
				  <div class="panel-heading" style="color:#fff; background-color:#751a42;">
				  	<a data-type="english" data-toggle="modal" data-target="#myModal" id="english" style="color: #fff;" class="pull-left"><i class="fa fa-edit fa-2x"></i> </a>
				    <h3 class="panel-title">اﻻنجليزية</h3>
				  </div>
				  <div class="panel-body">
				  		<div style="width:100%; max-height:400px; overflow-y:scroll; word-break:break-all;     ">
				    	<p id="contnt_english">{{$policy[0]->policy_terms_en}}</p></div>
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
	       	<textarea id="theIdOfTheTextarea" class="form-control"></textarea>
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
		$(document).on('click','#arabic',function(evevt){
			$('#myModalLabel').text('شروط اﻻستخدام:العربية');
			$('#type').val("arabic");
			var content=$('#contnt_arabic').text();
			$("#theIdOfTheTextarea").val(content);
		
		});


		$(document).on('click','#english',function(evevt){
			$('#myModalLabel').text('شروط اﻻستخدام:اﻻنجليزية');
			$('#type').val("english");
			var content=$('#contnt_english').text();
			$("#theIdOfTheTextarea").val(content);

	
	});



	
		$(document).on('click','#submit',function(evevt){
			var type =$('#type').val();
			var content=$('#theIdOfTheTextarea').val();
			if(type == "arabic"){
				$.post('/adminpanel/suggestions/update/arabic',{'content':content,'_token':$('input[name=_token]').val()},
					function(data){
						$('#items').load(location.href+'  #items');	
					});
			}else if(type = "english"){
				$.post('/adminpanel/suggestions/update/english',{'content':content,'_token':$('input[name=_token]').val()},
					function(data){
						$('#items').load(location.href+'  #items');	
					});	
			}

		});




	});
</script>

@endsection	