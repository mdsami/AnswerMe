<script src="//code.jquery.com/jquery.js"></script>
@include('flashy::message')

{!! Html::script('js/common/app.js') !!}
{!! Html::script('js/admin/ace-extra.min.js') !!}

<script type="text/javascript">
	if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
</script>

<!-- page specific plugin scripts -->
{!! Html::script('js/admin/bootstrap-tag.min.js') !!}
{!! Html::script('js/admin/jquery.hotkeys.index.min.js') !!}
{!! Html::script('js/admin/bootstrap-wysiwyg.min.js') !!}

<!-- ace scripts -->
{!! Html::script('js/admin/ace-elements.min.js') !!}
{!! Html::script('js/admin/ace.min.js') !!}
{!! Html::script('js/admin/script.js') !!}
{!! Html::script('js/admin/tree.min.js') !!}

@yield('scripts')