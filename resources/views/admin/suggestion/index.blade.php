@extends('admin.layouts.layout')
@section('title','الشكاوي واﻻقترحات')
@section('content')

<h3 class="header smaller ">اﻻقتراحات و الشكاوي:</h3>
@if(Session::has('status'))
   <div class="alert alert-info text-center">
        <h2>
     {{Session::get('status')}}
        </h2>
   </div>
   
@endif




	<section class="complains">
		<div class="container">
			<div class="row">
				@foreach($complain as $com)
				<div id="{{$com->id}}" class="panel panel-default col-md-10" style="background-color:#eee; ">
					  <div class="panel-body">
							<div class="top">
								<a href="/adminpanel/UsersMangemant/profile/{{$com->id}}" class="pull-left">{{$com->name}}</a>
								<span>{{$com->created_at}}</span>
							</div>
							<div class="image">
								<img src="{{$com->image}}" style="width:100%; height:400px; margin-top:10px; margin-bottom:10px;  ">
							</div>
							<div class="content" style="font-size:18px; ">
								<p>{{$com->message}}</p>
							</div>
							<div >
								<a href="#" class="delete" data-id="{{$com->id}}" data-toggle="modal" data-target="#delete"  >حذف</a>
							</div>	    
					  </div>
				</div>
			@endforeach	
			</div>
		</div>
		{{ $complain->links() }}
	</section>





	<div class="modal fade" tabindex="-1" role="dialog" id="delete">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title">حذف الرسالة</h4>
	      </div>
	      <div class="modal-body">
	        <p style="font-size:18px; ">هل تريد حذف الرسالة المحددة؟؟</p>
	        <input type="hidden"  id="id">
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">اغﻻق</button>
	        <button type="button" class="btn btn-primary" id="submit" data-dismiss="modal">حذف</button>
	      </div>
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->




      



@endsection




@section('footer')
	{{csrf_field()}}


<script type="text/javascript">
	$(document).ready(function(){
		$(document).on('click','.delete',function(evevt){
			var id=$(this).data("id");
			$('#id').val(id);
		});

		$(document).on('click','#submit',function(evevt){
			var id =$('#id').val();
			$.post('/adminpanel/suggestions/delete',{'id':id,'_token':$('input[name=_token]').val()},
					function(data){
						$('#'+id).hide(400);
					});
		});




	});
</script>

@endsection	