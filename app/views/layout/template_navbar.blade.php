<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                <i class="icon-reorder shaded"></i></a>
                <a class="brand" href="{{ URL::route('home') }}">ALMS</a>
            <div class="nav-collapse collapse navbar-inverse-collapse">
                <ul class="nav pull-right">
                    <li class="nav-user dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ Config::get('view.images') }}/user.png" class="nav-avatar" />
                        <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="https://github.com/prabhakar267/library-management-system" target="_blank">Fork on Github</a></li>
                            <li class="divider"></li>
                            <li><a href="{{ URL::route('account-sign-out') }}">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>