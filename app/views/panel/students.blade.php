@extends('layout.index')

@section('custom_top_script')
@stop

@section('content')
<div class="content">
    <div class="module">
        <div class="module-head">
            <h3>Tables</h3>
        </div>
        <div class="module-body">
            <div class="controls">
                <select class="span3" id="branch_select">
                    @foreach($branch_list as $branch)
                        <option value="{{ $branch->id }}">{{ $branch->branch }}</option>
                    @endforeach
                </select>
                <select class="span3" id="category_select">
                    <option value="0">All Categories</option>
                    @foreach($student_categories_list as $student_category)
                        <option value="{{ $student_category->cat_id }}">{{ $student_category->category }}</option>
                    @endforeach
                </select>
                <select class="span3" id="year_select">
                    <option value="0">All Years</option>
                    <option>2015</option>
                    <option>2014</option>
                    <option>2013</option>
                    <option>2012</option>
                    <option>2011</option>
                </select>
            </div>
            <table class="table table-striped table-bordered table-condensed">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Roll Number</th>
                        <th>Branch</th>
                        <th>Category</th>
                        <th>Email ID</th>
                        <th>Books Issued</th>
                    </tr>
                </thead>
                <tbody id="students-table">
                    <tr class="text-center">
                        <td colspan="99">Loading...</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop

@section('custom_bottom_script')
<script type="text/javascript">
    var branches_list = {{ json_encode($branch_list) }},
        categories_list = {{ json_encode($student_categories_list) }};
</script>
<script type="text/javascript" src="{{ Config::get('view.custom.js') }}/script.students.js"></script>
<script type="text/template" id="allstudents_show">
    @include('underscore.allstudents_show')
</script>
@stop