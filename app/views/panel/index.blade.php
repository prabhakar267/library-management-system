@extends('layout.index')

@section('content')
<div class="content">
    <div class="btn-controls">
        <div class="btn-box-row row-fluid">
            <a class="btn-box span12"><b>NSIT Automated Library Management System</b></a>
        </div>

        <div class="btn-box-row row-fluid">
            <a class="btn-box big span4 homepage-form-box" id="findbookbox">
                <i class="icon-list"></i>
                <b>Find Book</b>
            </a>

            <a class="btn-box big span4 homepage-form-box" id="findissuebox">
                <i class="icon-book"></i>
                <b>Find Book Issue</b>
            </a>

            <a class="btn-box big span4 homepage-form-box" id="findstudentbox">
                <i class="icon-user"></i>
                <b>Find Student</b>
            </a>
        </div>

        <div class="content">
            <div class="module" style="display: none;">
                <div class="module-body">
                    <form class="form-horizontal row-fluid" id="findbookform">
                        <div class="control-group">
                            <label class="control-label">Name or author<br>of the book</label>
                            <div class="controls">
                                <div class="span9">
                                    <textarea class="span12" rows="2"></textarea>
                                </div>
                                <div class="span3">
                                    <a class="btn homepage-form-submit">Submit</a>
                                </div>
                            </div>
                        </div>
                    </form>
                    <hr>
                    <table class="table table-striped table-bordered table-condensed" style="display: none;">
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
            <div class="module" style="display: none;">
                <div class="module-body">
                    <form class="form-horizontal row-fluid" id="findissueform">
                        <div class="control-group">
                            <label class="control-label">Enter Book ID</label>
                            <div class="controls">
                                <input type="number" placeholder="" class="span9">
                                <a class="btn homepage-form-submit">Submit</a>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="module-body">
                    <table class="table table-striped table-bordered table-condensed" style="display: none;">
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
                        <tbody id="seached-book-results">
                            <tr>
                                <td>1</td>
                                <td>Operating System Concepts</td>
                                <td>Silberschatz, Galvin and Gagne</td>
                                <td>An operating system (OS) is software that manages computer hardware and software resources and provides common services for computer programs. The operating system is an essential component of the system software in a computer system.</td>
                                <td>Computer</td>
                                <td><a class="btn btn-success">Available</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="module" style="display: none;">
                <div class="module-body">
                    <form class="form-horizontal row-fluid" id="findstudentform">
                        <div class="control-group">
                            <label class="control-label">Enter Student Name</label>
                            <div class="controls">
                                <input type="text" placeholder="" class="span9">
                                <a class="btn homepage-form-submit">Submit</a>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="module-body">
                </div>
            </div>
        </div>
    </div>
</div>
@stop


@section('custom_bottom_script')
<script type="text/javascript">
    var branches_list = {{ json_encode($branch_list) }},
        student_categories_list = {{ json_encode($student_categories_list) }};
    var categories_list = {{ json_encode($categories_list) }}
</script>

<script type="text/javascript" src="{{ Config::get('view.custom.js') }}/script.mainpage.js"></script>


<script type="text/template" id="search_book">
    @include('underscore.search_book')
</script>
<script type="text/template" id="approvalstudents_show">
    @include('underscore.approvalstudents_show')
</script>
@stop