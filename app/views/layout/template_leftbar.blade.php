<div class="span3">
    <div class="sidebar">
        <ul class="widget widget-menu unstyled">
            <li>
                <a href="{{ URL::route('home') }}">
                    <i class="menu-icon icon-home"></i>Home
                </a>
            </li>
            <li>
                <a href="">
                    <i class="menu-icon icon-signin"></i>Add a student
                </a>
            </li>
            <li>
                <a href="{{ URL::route('registered-students') }}">
                    <i class="menu-icon icon-group"></i>Registered Students
                </a>
            </li>
            <li>
                <a href="{{ URL::route('all-books') }}">
                    <i class="menu-icon icon-th-list"></i>All Books in Library
                </a>
            </li>
            <li>
                <a href="{{ URL::route('add-books') }}">
                    <i class="menu-icon icon-folder-open-alt"></i>Add Books
                </a>
            </li>
            <li>
                <a href="{{ URL::route('currently-issued') }}">
                    <i class="menu-icon icon-signout"></i>Issue A Book
                </a>
            </li>
            <li>
                <a href="">
                    <i class="menu-icon icon-signin"></i>Return A Book
                </a>
            </li>
            <!-- 
            <li>
                <a href="#">
                    <i class="menu-icon icon-inbox"></i>
                    Inbox
                    <b class="label green pull-right">11</b>
                </a>
            </li> -->
        </ul>
        
        <ul class="widget widget-menu unstyled">
            <li><a href="{{ URL::route('account-sign-out') }}"><i class="menu-icon icon-wrench"></i>Logout </a></li>
        </ul>
    </div>
</div>