<!-- Main navbar -->
<div class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ route('admin.dashboard') }}"><!--<img src="assets/images/logo_light.png" alt="">--></a>

        <ul class="nav navbar-nav visible-xs-block">
            <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
            <li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
        </ul>
    </div>

    <div class="navbar-collapse collapse" id="navbar-mobile">
        <ul class="nav navbar-nav">
            <li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>
        </ul>

        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown dropdown-user">
                <a class="dropdown-toggle" data-toggle="dropdown">
                    <span>{{ Sentinel::getUser()->name }}</span>
                    <i class="caret"></i>
                </a>

                <ul class="dropdown-menu dropdown-menu-right">
                    <li><a href="{{ route('admin.profile') }}"><i class="icon-cog5"></i> Настройки профиля</a></li>
                    <li class="divider"></li>
                    <li><a href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="icon-switch2"></i> Выход</a></li>

                    {!! Form::open(['route' => 'logout', 'id' => 'logout-form', 'style' => 'display: none;']) !!}
                    {!! Form::close() !!}
                </ul>
            </li>
        </ul>
    </div>
</div>
<!-- /main navbar -->