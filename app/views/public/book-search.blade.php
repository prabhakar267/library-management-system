@extends('account.index')

@section('content')

<div class="wrapper">
	<div class="container">
		<div class="row">
			<div class="module span12">
				<div class="module-head">
					<h3>Student Registration Form</h3>
				</div>
				<div class="module-body">
					<form class="form-horizontal row-fluid">
						<div class="control-group">
							<label class="control-label">Name or author<br>of the book</label>
							<div class="controls">
								<textarea class="span12" rows="2"></textarea>
							</div>
						</div>

						<div class="control-group">
							<div class="controls" id="search_book_button">
								<a class="btn btn-default">Search Book</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="row" style="display: none;">
			<div class="module span12">
				<div class="module-body">
		            <table class="table table-striped table-bordered table-condensed">
		                <thead>
		                    <tr>
		                        <th>Book ID</th>
		                        <th>Book Title</th>
		                        <th>Author</th>
		                        <th>Description</th>
		                        <th>Category</th>
		                        <th>Status</th>
		                    </tr>
		                </thead>
		                <tbody id="book-results"></tbody>
		            </table>
				</div>
			</div>
		</div>
	</div>
</div>

@stop

@section('custom_bottom_script')
<script type="text/javascript">
    var categories_list = {{ json_encode($categories_list) }}
</script>
<script type="text/javascript" src="{{ Config::get('view.custom.js') }}/script.searchbook.js"></script>

<script type="text/template" id="search_book">
    @include('underscore.search_book')
</script>
@stop