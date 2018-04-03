<div class="modal fade" tabindex="-1" role="dialog" id="{{ $modal_id }}">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">{{ $modal_title }}</h4>
			</div>
			@if(isset($modal_body))
				<div class="modal-body">
					{!! $modal_body !!}
				</div>
			@endif
			<div class="modal-footer">
				@if(isset($modal_href))
					<a href="{{ $modal_href }}" class="btn btn-sm btn-primary"><i class="ace-icon fa fa-check"></i> نعم</a>
				@endif
				<button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><i class="ace-icon fa fa-times"></i> غلق</button>
			</div>
		</div>
	</div>
</div>
