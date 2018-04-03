@extends('admin.layouts.layout')

@section('title','الصفحة الرئيسية')


@section('content')

		     {!! Charts::styles() !!}

		<h3 class="header smaller ">الصفحة الرئيسية</h3>
	<div class="container">
		<div class="row">
			
			 <div class="col-md-10 col-md-offset-1" style="border:1px solid #751a42; margin-bottom: 15px;">
			    {!! $chart->html() !!}
			</div>


			<div class="col-md-10 col-md-offset-1" style="border:1px solid #751a42;   ">
					{!! $Users_actions->html() !!}
			</div>
		</div>
		<div class="row" style="margin-top:25px; ">
			<h4 class="header smaller ">اخر المنشورات المضافة:</h4>
			<div class="container">
				  
				            <div class="row">
				              @if(count($last_posts) == 0)
				                  <div class="alert alert-info">ﻻ يوجد منشورات</div>
				              @else    
				              @foreach($last_posts as $posts)

				           <div class="all   col-md-10 col-md-offset-1" id="{{$posts->id}}">
				                  <div class="panel panel-default" style="border:1px solid #751a42;">
				                      <div class="panel-body">
				                        @if($posts->is_ghost == 1)
				                        <span class="pull-left">
				                          <i class="fa fa-user-secret fa-4x"></i>
				                        </span>
				                        @endif
				                        <h4>{{$posts->title}}({{$posts->cat_name}})</h4>
				                         <span>{{$posts->created_at}}</span>
				                         
				                      <img src="{{$posts->image}}"
				                           style="width:100%; height:300px; margin-bottom:10px;">    <p class="text-center" style="font-size:15px;">{{$posts->content}}</p>
				                  <div class=" pull-left" style="font-size:18px;" >
				                  
				                    <span class="delete" data-post="{{$posts->id}}"
				                    data-toggle="modal" data-target="#delete"><i class="fa fa-trash-o"></i></span>



				<span class="likes" data-post="{{$posts->id}}"  data-toggle="modal" data-target="#likes"> <i class="fa fa-heart"></i>{{$posts->likes}}</span>

				<span class="comments" data-post="{{$posts->id}}"  data-toggle="modal" data-target="#comments"> <i class="fa fa-comments"></i>{{$posts->comments}}</span>

				<span class="share" data-post="{{$posts->id}}" data-toggle="modal" data-target="#shares"><i class="fa fa-share-alt"></i>{{$posts->share}} </span>
				        

				                  </div>
				                      </div>
				                  </div>
				              </div>
				              @endforeach
				      
				        @endif
		    
				</div>
			</div>
		</div>
	</div>






	<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	    <div class="modal-dialog" role="document">
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	          <h4 class="modal-title" id="myModalLabel">حذف المنشور</h4>
	        </div>
	        <div class="modal-body">
	           <p style="font-size:18px;">هل تريد حذف المنشور؟؟؟</p>
	           <input type="hidden" id="post_id" name="">
	        </div>
	        <div class="modal-footer">
	          <button type="button" class="btn btn-default" data-dismiss="modal">اغﻻق</button>
	          <button type="button" id="delete_post" class="btn btn-danger" data-dismiss="modal">حذف</button>
	         
	        </div>
	      </div>
	    </div>
	</div>






	<div class="modal fade" id="comments" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	    <div class="modal-dialog" role="document">
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	          <h4 class="modal-title" id="myModalLabel">التعليقات الخاصة بالمنشور</h4>
	        </div>
	        <div class="modal-body" >
	          

	            <div class="widget-box">
	              <div class="widget-header">
	                <h4 class="widget-title lighter smaller">
	                  <i class="ace-icon fa fa-comment blue"></i>
	                  التعليقات
	                </h4>
	              </div>
	              <div class="widget-body">
	                <div class="widget-main no-padding">
	                  <div class="dialogs" id="comments_content">



	                  </div>
	                </div><!-- /.widget-main -->
	             </div><!-- /.widget-body -->
	           </div><!-- /.widget-box -->
	


	        </div>
	        <div class="modal-footer">
	          <button type="button" class="btn btn-default" data-dismiss="modal">اغﻻق</button>
	         
	        </div>
	      </div>
	    </div>
	</div>





	<div class="modal fade" id="shares" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	    <div class="modal-dialog" role="document">
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	          <h4 class="modal-title" id="myModalLabel">المشاركات الخاصة بالمنشور</h4>
	        </div>
	        <div class="modal-body" id="share_content">
	          
	        </div>
	        <div class="modal-footer">
	          <button type="button" class="btn btn-default" data-dismiss="modal">اغﻻق</button>
	         
	        </div>
	      </div>
	    </div>
	</div>








	<div class="modal fade" id="likes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	    <div class="modal-dialog" role="document">
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	          <h4 class="modal-title" id="myModalLabel">اﻻعجابات الخاصة بالمنشور</h4>
	        </div>
	        <div class="modal-body" id="likes_content">
	          
	        </div>
	        <div class="modal-footer">
	          <button type="button" class="btn btn-default" data-dismiss="modal">اغﻻق</button>
	         
	        </div>
	      </div>
	    </div>
	</div>













	        {!! Charts::scripts() !!}
        {!! $chart->script() !!}
        {!! $Users_actions->script() !!}
@endsection




@section('footer')
	  {{csrf_field()}}
<script type="text/javascript">
	
	$(document).ready(function(){


		$(document).on('click','.likes',function(evevt){
		    var post_id=$(this).data("post");
		    $.post('/adminpanel/UsersMangemant/profile/getLikes',
		        {'id':post_id,'_token':$('input[name=_token]').val()},
		        function(data){
		            $('#likes_content').html('');
		            if(data.length == 0)
		                $('#likes_content').html('<p class="alert alert-info">ﻻ يوجد اعجابات للمنشور</p>');
		            else{
		              console.log(data);
		              document.getElementById('likes_content').innerHTML="<ul class='list-group'>";
		            for (var i=0;data.length; i++){
		              document.getElementById('likes_content').innerHTML +='<li class="list-group-item"><a href="/adminpanel/UsersMangemant/profile/'+data[i]["user_id"]+'">'+data[i]["name"]+'</a></li>';
		               }
		               document.getElementById("likes_content").innerHTML="</ul>";                        
		            }  
		
		        });
		});


		$(document).on('click','.comments',function(evevt){
		    var post_id=$(this).data('post');
		    $.post('/adminpanel/UsersMangemant/profile/getComment',
		        {'id':post_id,'_token':$('input[name=_token]').val()},function(data){
		            if(data.length == 0){
		              document.getElementById("comments_content").innerHTML="<p class='alert alert-info'>ﻻ يوجد تعليقات</p>";
		            }else{

		                  document.getElementById("comments_content").innerHTML="";
		              for (var i=0;i< data.length; i++) {
		                  document.getElementById('comments_content').innerHTML +='<div class="itemdiv dialogdiv"><div class="user"><img alt="'+data[i]["user_name"]+'" src="'+data[i]["user_photo"]+'" /></div><div class="body"><div class="time"><i class="ace-icon fa fa-clock-o"></i><span class="green">'+data[i]["created_at"]+'</span></div><div class="name"><a href="/adminpanel/UsersMangemant/profile/'+data[i]["id"]+'">'+data[i]["user_name"]+'</a></div><div class="text">'+data[i]["content"]+'</div></div></div>';
		              }


		            }
		        });
		    
		});

		$(document).on('click','.share',function(evevt){
		    var post_id=$(this).data('post');
		    $.post('/adminpanel/UsersMangemant/profile/getShare',
		        {'id':post_id,'_token':$('input[name=_token]').val()},
		        function(data){
		            $('#share_content').html('');
		            if(data.length == 0)
		                $('#share_content').html('<p class="alert alert-info">ﻻ يوجد مشاركات للمنشور</p>');
		            else{
		              console.log(data);
		              document.getElementById('share_content').innerHTML="<ul class='list-group'>";
		            for (var i=0;data.length; i++){
		              document.getElementById('share_content').innerHTML +='<li class="list-group-item"><a href="/adminpanel/UsersMangemant/profile/'+data[i]["user_id"]+'">'+data[i]["name"]+'</a></li>';
		               }
		               document.getElementById("share_content").innerHTML="</ul>";                        
		            }  
		    
		        });
		});

		$(document).on('click','.delete',function(evevt){
		  var id=$(this).data("post");
		  $('#post_id').val(id);
		});


		$(document).on('click','#delete_post',function(evevt){
		  var post_id=$('#post_id').val();
		  $.post('/adminpanel/UsersMangemant/profile/delete_post',
		        {'id':post_id,'_token':$('input[name=_token]').val()},
		            function(data){
		              $('#'+post_id).html('');
		              $('#'+post_id).hide(400);
		        });
		});



	});



</script>

@endsection


