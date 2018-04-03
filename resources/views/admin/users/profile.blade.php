@extends('admin.layouts.layout')

@section('title','صفحة شخصية')





@section('content')
<h3 class="header smaller ">صفحة شخصية :{{$arrayName["user_profile"][0]->name}}</h3>

@if(Session::has('status'))
   <div class="alert alert-info text-center">
  		<h2>
  	 {{Session::get('status')}}
  	 	</h2>
   </div>
   
@endif



   	<div id="user-profile-1" class="user-profile row">
   		<div class="col-xs-12 col-sm-3 center">
   			<div>
   												<span class="profile-picture">
   													<img id="avatar" class="editable img-responsive" alt="{{$arrayName["user_profile"][0]->name}}" src="{{$arrayName["user_profile"][0]->photo}}" />
   												</span>
   												<div class="space-4"></div>
   												<div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
   													<div class="inline position-relative">
   														<a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
   														 <span id="activation_label">
                              	@if($arrayName["user_profile"][0]->is_active == 1)
   																<i class="ace-icon fa fa-circle light-green"></i>
   															@else 
   																<i class="ace-icon fa fa-circle light-red"></i>
   															@endif
                                </span>		
   															&nbsp;
   															<span class="white">{{$arrayName["user_profile"][0]->name}}</span>
   														</a>

   													</div>
   												</div>
   											</div>
   											<div class="hr hr12 dotted"></div>
   											<div class="clearfix">
   												<div class="grid2">
   													<span class="bigger-175 blue">{{$arrayName["user_info"][0]->followers}}</span>
   													<br />
   													المتابعين
   												</div>
   												<div class="grid2">
   													<span class="bigger-175 blue">{{$arrayName["user_info"][0]->following}}</span>
   													<br />
   													يتابع
   												</div>
   											</div>

   											<div class="hr hr16 dotted"></div>
   										</div>

   										<div class="col-xs-12 col-sm-9">
   											<div class="center">
   												<span class="btn btn-app btn-sm btn-light no-hover">
   													<span class="line-height-1 bigger-170 blue">{{$arrayName["user_info"][0]->following}}</span>

   													<br />
   													<span class="line-height-1 smaller-90">يتابع</span>
   												</span>

   												<span class="btn btn-app btn-sm btn-yellow no-hover">
   													<span class="line-height-1 bigger-170"> {{$arrayName["user_info"][0]->followers}} </span>

   													<br />
   													<span class="line-height-1 smaller-90">المتابعين</span>
   												</span>

   												<span class="btn btn-app btn-sm btn-pink no-hover">
   													<span class="line-height-1 bigger-170">{{$arrayName["user_info"][0]->block}}</span>

   													<br />
   													<span class="line-height-1 smaller-90">المحظرون</span>
   												</span>
   											</div>

   											<div class="space-12"></div>

   											<div class="profile-user-info profile-user-info-striped">
   												<div class="profile-info-row">
   													<div class="profile-info-name"> اﻻسم </div>

   													<div class="profile-info-value">
   														<span class="editable" id="username">{{$arrayName["user_profile"][0]->name}}</span>
   													</div>
   												</div>

   												<div class="profile-info-row">
   													<div class="profile-info-name"> رقم التليفون </div>

   													<div class="profile-info-value">
   														<span class="editable" id="country">{{$arrayName["user_profile"][0]->phone}}</span>
   													</div>
   												</div>

   												<div class="profile-info-row">
   													<div class="profile-info-name"> البريد اﻻلكتروني </div>

   													<div class="profile-info-value">
   														<span class="editable" id="age">{{$arrayName["user_profile"][0]->email}}</span>
   													</div>
   												</div>

   												<div class="profile-info-row">
   													<div class="profile-info-name"> تاريخ التسجيل </div>

   													<div class="profile-info-value">
   														<span class="editable" id="signup">{{$arrayName["user_profile"][0]->created_at}}</span>
   													</div>
   												</div>

   												<div class="profile-info-row">
   													<div class="profile-info-name"> وضع التفعيل </div>

   													<div class="profile-info-value">
   														<span class="editable" id="login">
   															@if($arrayName["user_profile"][0]->is_active == 1)
   																مفعل
   															@else 
   																معطل
   															@endif		
   														</span>
   													</div>
   												</div>

   												<div class="profile-info-row">
   													<div class="profile-info-name"> وضع التاكيد </div>

   													<div class="profile-info-value">
   														<span class="editable" id="about">
   															@if($arrayName["user_profile"][0]->is_verified == 1)
   																تم التحقيق 
   															@else 
   																لم يتم التحقيق
   															@endif
   														</span>
   													</div>
   												</div>
   											</div>
   										</div>
   									</div>
   								</div>






                           <div class="controls text-center">          
                              <a " class="btn btn-success btn-lg" data-toggle="modal" data-target="#following">
                                 يتابع
                              </a>
                              <a  class="btn btn-danger btn-lg" data-toggle="modal" data-target="#block">
                                 المحظرون
                              </a>
                                  <a  class="btn btn-primary btn-lg" data-toggle="modal" data-target="#followers">
                               المتابيعن
                              </a>

                              <span id="active_status">
                                @if($arrayName["user_profile"][0]->is_active ==1)
                                  <a 
                                   class="btn btn-success btn-lg disactive"
                                  data-toggle="modal"
                                  data-target="#activation"
                                  data-id='{{$arrayName["user_profile"][0]->id}}'>
                                          مفعل
                                  </a>
                                @else
                                  <a  
                                    class="btn btn-warning btn-lg active"
                                    data-toggle="modal"
                                    data-target="#activation"
                                    data-id='{{$arrayName["user_profile"][0]->id}}'>
                                          معطل
                                  </a>
                                @endif 
                              </span>   
                                  

                              <a class="btn btn-primary btn-lg" href='/adminpanel/UsersMangemant/edit/{{$arrayName["user_profile"][0]->id}}' >تعديل البيانت</a>

                              <a  class="btn btn-danger btn-lg"
                                  data-id='{{$arrayName["user_profile"][0]->id}}' data-toggle="modal" data-target="#user_setting">
                                      حذف المستخدم
                              </a>



                           </div>


                           <hr>
                           <section class="posts" >

                              <div class="container">
                                <h3 class="header smaller ">المنشورات:</h3>
                                <div class="container">
                                <div class="row" style="margin-bottom:15px; ">
                                    <div class="col-md-4">
                                  
                                      <select id="selectorId" class="form-control">
                                        <option value="date">تاريخ اﻻضافة</option>
                                        <option value="likes">اﻻكثر اعجابا</option>
                                        <option value="shares">اﻻكثر مشاركة</option>
                                        <option value="views"> اﻻكثر مشاهدة</option>
                                      </select>

                                    </div>
                                    <a  id="Arrangement" class="btn btn-primary col-md-1" >ترتيب</a>
                          <div class="col-md-6">

                              
                              <div style="float:left; margin-left:15px;  ">            
                                 <input
                                       type="radio" class="form-control"
                                       data-value="all"   name="optradio"
                                       checked id="all" 
                                       name="optradio" > كل المنشورات
                              </div>   

                              <div style="float:left; margin-left:15px; ">            
                                 <input type="radio" class="form-control"
                                        name="optradio" data-value="ghost" id="ghost" > اﻻكونت الخفي
                              </div>

                              <div style="float:left; margin-left:15px; ">            
                                 <input type="radio" class="form-control"
                                        name="optradio" data-value="main" id="main"> اﻻكونت اﻻساسي
                              </div>   

             
                          </div>

                                </div>
                                </div>

                                <div class="row" id="posts">
                                  @if(count($arrayName["posts"]) == 0)
                                      <div class="alert alert-info">ﻻ يوجد منشورات</div>
                                  @else    
                                  @foreach($arrayName["posts"] as $posts)

                                <div class="all  is_ghost{{$posts->is_ghost}} col-md-10 col-md-offset-1" id="{{$posts->id}}">
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
                                               style="width:100%; height:300px; margin-bottom:10px; ">    <p class="text-center" style="font-size:15px;">{{$posts->content}}</p>
                                      <div class=" pull-left" style="font-size:18px;" >
                                        <span class="delete" data-post="{{$posts->id}}"
                                        data-toggle="modal" data-target="#delete"><i class="fa fa-trash-o"></i> </span>



                    <span class="likes" data-post="{{$posts->id}}"  data-toggle="modal" data-target="#likes"                    > <i class="fa fa-heart"></i>{{$posts->likes}}</span>
                    <span class="comments" data-post="{{$posts->id}}"
                          data-toggle="modal" data-target="#comments"> <i class="fa fa-comments"></i>{{$posts->comments}}</span>
                                <span class="share" data-post="{{$posts->id}}"
                                  data-toggle="modal" data-target="#shares"><i class="fa fa-share-alt"></i>{{$posts->share}} </span>
                            

                                      </div>
                                          </div>
                                      </div>
                                  </div>
                                  @endforeach
                          
                                  @endif
                                
                                </div>
                                  @if(count($arrayName["posts"]) != 0)
                                  <a
                                    id="load_more"
                                    class="btn btn-success"
                                   data-page="1" 
                                   data-id="{{$arrayName['user_profile'][0]->id}}"
                                   style="margin-top:20px;"> <i class="fa fa-plus"></i> تحميل المزيد</a>
                                  @endif
                              </div>
                           </section>












                    
                           <!-- Modal -->
                           <div class="modal fade" id="followers" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                             <div class="modal-dialog" role="document">
                               <div class="modal-content">
                                 <div class="modal-header">
                                   <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                   <h4 class="modal-title" id="myModalLabel">المتابعين</h4>
                                 </div>
                                 <div class="modal-body">
                                  
                                    @if(count($arrayName["followers"]) == 0)
                                       <div class="alert alert-info">ﻻ يوجد متابعون</div>
                                     @else  
                                     <ul class="list-group">
                                    @foreach( $arrayName["followers"]  as $user)
                                       <li class="list-group-item"><a href="/adminpanel/UsersMangemant/profile/{{$user->id}}">{{$user->name}}</a></li>
                                    @endforeach
                                    </ul>
                                    @endif
                                 </ul>
                                 </div>
                                 <div class="modal-footer">
                                   <button type="button" class="btn btn-default" data-dismiss="modal">اغﻻق</button>
                                   
                                 </div>
                               </div>
                             </div>
                           </div>
                           <!-- Modal -->
                           <div class="modal fade" id="following" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                             <div class="modal-dialog" role="document">
                               <div class="modal-content">
                                 <div class="modal-header">
                                   <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                   <h4 class="modal-title" id="myModalLabel">يتابع</h4>
                                 </div>
                                 <div class="modal-body">
                                  
                                    @if(count($arrayName["following"]) == 0)
                                       <div class="alert alert-info">ﻻ يوجد متابعين</div>
                                     @else  
                                     <ul class="list-group">
                                    @foreach( $arrayName["following"]  as $user)
                                       <li class="list-group-item"><a href="/adminpanel/UsersMangemant/profile/{{$user->id}}">{{$user->name}}</a></li>
                                    @endforeach
                                    </ul>
                                    @endif
                                 </ul>
                                 </div>
                                 <div class="modal-footer">
                                   <button type="button" class="btn btn-default" data-dismiss="modal">اغﻻق</button>
                                   
                                 </div>
                               </div>
                             </div>
                           </div>
                           <!-- Modal -->
                           <div class="modal fade" id="block" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                             <div class="modal-dialog" role="document">
                               <div class="modal-content">
                                 <div class="modal-header">
                                   <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                   <h4 class="modal-title" id="myModalLabel">محظرون</h4>
                                 </div>
                                 <div class="modal-body">
                                  
                                    @if(count($arrayName["block"]) == 0)
                                       <div class="alert alert-info">ﻻ يوجد محظرون</div>
                                     @else  
                                     <ul class="list-group">
                                    @foreach( $arrayName["block"]  as $user)
                                       <li class="list-group-item"><a href="/adminpanel/UsersMangemant/profile/{{$user->id}}">{{$user->name}}</a></li>
                                    @endforeach
                                    </ul>
                                    @endif
                                 </ul>
                                 </div>
                                 <div class="modal-footer">
                                   <button type="button" class="btn btn-default" data-dismiss="modal">اغﻻق</button>
                                   
                                 </div>
                               </div>
                             </div>
                           </div>
                           <!-- Modal -->
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




                         <div class="modal fade" id="activation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                           <div class="modal-dialog" role="document">
                             <div class="modal-content">
                               <div class="modal-header">
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                 <h4 class="modal-title" id="activation_title"></h4>
                               </div>
                               <div class="modal-body">
                                          <p style="font-size:18px;"   id="activation_p"></p>
                                          <input type="hidden" id="activation_id">
                                          <input type="hidden" id="activation_type">
                               </div>
                               <div class="modal-footer">
                                 <button type="button" class="btn btn-default" data-dismiss="modal">اغﻻق</button>
                                 <button type="button" class="btn btn-primary" data-dismiss="modal" id="activation_submit">حفظ</button>
                               </div>
                             </div>
                           </div>
                         </div>









                        <div class="modal fade" id="user_setting" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="user_setting_title">حذف المستخدم؟؟</h4>
                              </div>
                              <div class="modal-body">
                               
                                  <div class="row">
                                    <form class="form-horizontal" role="form" method="POST" action="/adminpanel/UsersMangemant/delete_user" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                    <p id="user_setting_content" style="font-size: 18px;">هل تريد حذف المستخدم؟؟</p>
                                      
                                      <input  type="hidden" name="user_id"  class="form-control" value="{{$arrayName['user_profile'][0]->id}}"  />
                                      <div class="form-group">
                                          <div class="col-md-8 col-md-offset-4">
                                              <button data-dismiss="modal" class="btn btn-default btn-lg">اغﻻق</button>
                                              <button type="submit" class="btn btn-danger btn-lg">
                                                حذف 
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

          $(document).on('click','#all',function(){
                
                all();
          });

          $(document).on('click','#ghost',function(){
                    ghost();
          });


          $(document).on('click','#main',function(){
                  main();
          });

      
          $(document).on('click','#Arrangement',function(evevt){
              var select=$('#selectorId').val();
              var id=$('#load_more').data('id');  
              var page=0;
              $('#load_more').data('page',1);



              if (select == "date") {
                  $.post('/adminpanel/UsersMangemant/profile/postsLoad',
                     {'user_id':id,'page':page,'type':select,'_token':$('input[name=_token]').val()},function(data){
                                document.getElementById('posts').innerHTML ="";  
                                  $('#load_more').show(400);  
                                draw_posts(data);
                    });  

              }else if(select == "likes"){
                  $.post('/adminpanel/UsersMangemant/profile/postsLoad',
                     {'user_id':id,'page':page,'type':select,'_token':$('input[name=_token]').val()},function(data){
                                document.getElementById('posts').innerHTML ="";  
                                  $('#load_more').show(400);   
                                draw_posts(data);
                    });
              }else if(select == "shares"){
                $.post('/adminpanel/UsersMangemant/profile/postsLoad',
                                    {'user_id':id,'page':page,'type':select,'_token':$('input[name=_token]').val()},function(data){
                                               document.getElementById('posts').innerHTML ="";   
                                                 $('#load_more').show(400);  
                                               draw_posts(data);
                                  });
              }else if(select == "views"){
                $.post('/adminpanel/UsersMangemant/profile/postsLoad',
                   {'user_id':id,'page':page,'type':select,'_token':$('input[name=_token]').val()},function(data){
                              document.getElementById('posts').innerHTML ="";   
                                $('#load_more').show(400);  
                              draw_posts(data);
                  });
              }



          });

          $(document).on('click','#load_more',function(){
            var page=$(this).data("page");
            var id=$(this).data('id');
            var select=$('#selectorId').val();
            $('#load_more').data('page',page+1);
                       
              $.post('/adminpanel/UsersMangemant/profile/postsLoad',
                    {'user_id':id,'page':page,'type':select,'_token':$('input[name=_token]').val()},function(data){
                            draw_posts(data);
                    });                
          });
          

                function main(){
                  $('.all').show(400);
                  $('.is_ghost1').hide(400);
                    
                }

                function ghost(){

                    $('.all').show(400);
                    $('.is_ghost0').hide(400);
                }

                function all(){
                     $('.all').show(400);
                }

                 function draw_posts(data){
                           if(data.length == 0){
                               $('#load_more').hide(400);
                           }else{

                             var root = location.protocol + '//' + location.host;
                             var img=root+"/profile.svg";


                             for (var i =0;i<data.length;i++){
                                    var image=data[i]["image"];
                                    var is_ghost="";
                                    if(image == null)
                                     image=img; 

                                   if(data[i]["is_ghost"] == 1)
                                       is_ghost='<span class="pull-left"><i class="fa fa-user-secret fa-4x"></i></span>';
                 
                                   document.getElementById('posts').innerHTML +='<div class="all  is_ghost'+data[i]["is_ghost"]+' col-md-10 col-md-offset-1" id="'+data[i]["id"]+'"><div class="panel panel-default" style="border:1px solid #751a42;"><div class="panel-body">'+is_ghost+'<h4>'+data[i]["title"]+'('+data[i]["cat_name"]+')</h4><span>'+data[i]["created_at"]+'</span><img src="'+data[i]["image"]+'" style="width:100%; height:300px; margin-bottom:10px; "><p class="text-center" style="font-size:15px;">'+data[i]["content"]+'</p><div class=" pull-left" style="font-size:18px;" ><span class="delete" data-post="'+data[i]["id"]+'"data-toggle="modal" data-target="#delete"><i class="fa fa-trash-o"></i> </span><span class="likes" data-post="'+data[i]["id"]+'"data-toggle="modal" data-target="#likes"> <i class="fa fa-heart"></i>'+data[i]["likes"]+'</span><span class="comments" data-post="'+data[i]["id"]+'" data-toggle="modal" data-target="#comments"> <i class="fa fa-comments"></i>'+data[i]["comments"]+'</span><span class="share" data-post="'+data[i]["id"]+'"data-toggle="modal" data-target="#shares"><i class="fa fa-share-alt"></i>'+data[i]["share"]+'</span></div></div></div></div>';        
                             }

                             if (document.getElementById('all').checked) 
                                    all();
                             else if(document.getElementById('main').checked)
                                    main();
                             else if(document.getElementById('ghost').checked)
                                    ghost();    


                           }
                     }

          $(document).on('click','.disactive',function(evevt){
                var user_id=$(this).data('id');
                
              $('#activation_id').val(user_id);
              $('#activation_type').val("disactive");
              $('#activation_title').text('تريد تعطيل ');
              $('#activation_p').text('هل تريد تعطيل المستخدم');  
          });   

          $(document).on('click','.active',function(evevt){
                var user_id=$(this).data('id');
               
              $('#activation_id').val(user_id);
              $('#activation_type').val("active");
              $('#activation_title').text(' تريد تفعيل ');
              $('#activation_p').text('هل تريد تفعيل المستخدم؟؟')
                
          });   

          $(document).on('click','#activation_submit',function(evevt){


                 var user_id=$('#activation_id').val();
                 var type =$('#activation_type').val();


                 if(type == "disactive"){
                      $.post('/adminpanel/UsersMangemant/disactive',
                          {'user_id':user_id,'_token':$('input[name=_token]').val()},
                          function(data){
                            if(data == "error")
                              alert('not allowed');
                            else{
                              $('#active_status').html('<a class="btn btn-warning btn-lg active" data-toggle="modal"data-target="#activation" data-id='+user_id+'>معطل</a>');
                               $('#activation_label').html('<i class="ace-icon fa fa-circle light-red"></i>');
                            }
                          });
                 }else if(type == "active"){
                      $.post('/adminpanel/UsersMangemant/active',
                          {'user_id':user_id,'_token':$('input[name=_token]').val()},
                          function(data){
                            if(data == "error")
                              alert('not allowed');
                            else{
                              $('#active_status').html('<a class="btn btn-success btn-lg disactive" data-toggle="modal"data-target="#activation" data-id='+user_id+'>مفعل</a>');

                              $('#activation_label').html('<i class="ace-icon fa fa-circle light-green"></i>');
                                
                            }
                          });
                 }







          })        








       });
</script>
@endsection