<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ Route('home')}}">Innaco</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <div class="navbar-nav nav navbar-right">
                <li class="dropdown dropdown-user">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="dropdown-profile">
                        @include('laravel-authentication-acl::admin.layouts.partials.avatar', ['size' => 30])
                        <span id="nav-email">{{\Sentry::getUser()->email}}</span> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{URL::route('users.selfprofile.edit')}}"><i class="fa fa-user"></i> Your profile</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="{{URL::action('Jacopo\Authentication\Controllers\AuthController@getLogout')}}"><i class="fa fa-sign-out"></i> Logout</a>
                        </li>
                    </ul>
                </li>
            </div><!-- nav-right -->
        </div>
    </div>
</nav>