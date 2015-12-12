@if(Session::has('global'))
	<div class="wrapper">
		<div class="container">
			<div class="row">
				<div class="alert alert-success">
					<button type="button" class="close" data-dismiss="alert">×</button>
					{{ Session::get('global') }}
				</div>
			</div>
		</div>
	</div>
@endif