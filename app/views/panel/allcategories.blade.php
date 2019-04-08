@extends('layout.index')

@section('custom_top_script')
@stop

@section('content')
<div class="content">
    <div class="module">
        <div class="module-head">
            <h3>Books Categories</h3>
        </div>
        <div class="module-body">           
            <table class="table table-striped table-bordered table-condensed">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Category</th>
                        <th>Added at</th>
                        <th>Updated at</th>
                    </tr>
                </thead>
                <tbody id="allcategories-table">
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
<script type="text/javascript" src="{{ Config::get('view.custom.js') }}/script.addcategory.js"></script>
<script type="text/template" id="allcategories_show">
    @include('underscore.allcategories_show')
</script>
@stop