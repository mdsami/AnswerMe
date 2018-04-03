<div id="navbar" class="navbar navbar-default  ace-save-state">
	<div class="navbar-container ace-save-state" id="navbar-container">
		<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
			<span class="sr-only">Toggle sidebar</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<div class="navbar-header pull-right">
			<a href="{{ route('DashboardIndex') }}" class="navbar-brand">جارو</a>
		</div>
		@if(Auth::check())
		<div class="navbar-header pull-left">
			<a href="{{ url('/logout') }}"
					onclick="event.preventDefault();
									 document.getElementById('logout-form').submit();" title="تسجيل خروج">
					<i class="navbar-brand fa fa-sign-out"></i>
			</a>

			<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
					{{ csrf_field() }}
			</form>
			<!--
			<i class="navbar-brand fa fa-cog"></i>
		-->
		</div>
		@endif
		<div class="navbar-buttons navbar-header pull-right" role="navigation">

		</div>
	</div>
</div>
