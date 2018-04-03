<script type="text/javascript">
   try{ace.settings.loadState('main-container')}catch(e){}
</script>
<div id="sidebar" class="sidebar responsive ace-save-state">
   <script type="text/javascript">
      try{ace.settings.loadState('sidebar')}catch(e){}
   </script>
   <ul class="nav nav-list">
      <li class="{{ Request::is(Route::current()->getName() == 'DashboardIndex') ? 'active' : '' }}">
         <a href="{{ route('DashboardIndex') }}">
         <i class="menu-icon fa fa-home"></i>
         <span class="menu-text">لوحة التحكم</span>
         </a>
         <b class="arrow"></b>
      </li>
<!-- ###############################SECTOR######################################### -->

<!-- ###############################SECTOR######################################### -->
   </ul>
   <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
      <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-right ace-save-state" data-icon1="ace-icon fa fa-angle-double-right" data-icon2="ace-icon fa fa-angle-double-left"></i>
   </div>
</div>
