<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>CMSX</title>

    <link rel="stylesheet" href="/dashboard/bower_components/jquery-ui/themes/base/all.css" />
    <link rel="stylesheet" href="/dashboard/node_modules/materialize-css/dist/css/materialize.min.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="/dashboard/node_modules/animate.css/animate.min.css" />
    <link rel="stylesheet" href="/dashboard/css/style.css" type="text/css">
    <link rel="stylesheet" href="/dashboard/css/custom.css" type="text/css">
    <link rel="stylesheet" href="/dashboard/bower_components/font-awesome-animation/dist/font-awesome-animation.min.css">

    <script src="/dashboard/node_modules/jquery/dist/jquery.min.js"></script>
    <script src="/dashboard/bower_components/jquery-ui/jquery-ui.js"></script>
    <script src="/dashboard/node_modules/materialize-css/dist/js/materialize.min.js"></script>
    <script src="/dashboard/node_modules/tinymce/tinymce.min.js"></script>

    <link rel="stylesheet" href="/dashboard/node_modules/fullcalendar/dist/fullcalendar.css"/>
    <script type="text/javascript" src="/dashboard/bower_components/moment/min/moment.min.js"></script>
    <script type="text/javascript" src="/dashboard/bower_components/angular/angular.min.js"></script>
    <script type="text/javascript" src="/dashboard/bower_components/angular-ui-calendar/src/calendar.js"></script>
    <script type="text/javascript" src="/dashboard/node_modules/fullcalendar/dist/fullcalendar.min.js"></script>
    <script type="text/javascript" src="/dashboard/bower_components/fullcalendar/dist/lang-all.js"></script>
    <script type="text/javascript" src="/dashboard/node_modules/angular-file-upload-shim/dist/angular-file-upload-shim.min.js"></script>
    <script type="text/javascript" src="/dashboard/node_modules/angular-file-upload-shim/dist/angular-file-upload.min.js"></script>

    <script src="/dashboard/js/init.js"></script>
    <script src="/dashboard/js/dashboard.js"></script>
    <script src="/dashboard/js/app.js"></script>
</head>
<body ng-app="cmsxApp">
<header class="navbar-fixed">
    <nav>
        <div class="nav-wrapper">
            <a href="{{url('/admin')}}" class="brand-logo animated flipInY">
                cms
                <u>X</u>
            </a>
            <a href="#" data-activates="side-out" class="button-collapse">
                <i class="material-icons">menu</i>
            </a>
            <ul class="right hide-on-med-and-down">
                <li>
                    <a href="#">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-bell" aria-hidden="true"></i>
                    </a>
                </li>
                <li>
                    <a class="dropdown-button" data-beloworigin="true" href="#!" data-activates="dropdown-navbar">
                            <span class="navbar__avatar">
                                <img src="/dashboard/images/avatar-male.svg" class="responsive-img">
                            </span>
                        <span class="navbar__user-info">
                                <span class="navbar__user-name">{{ Auth::user()->name }}</span>
                                <u class="navbar__user-role">Administrator</u>
                            </span>
                        <i class="fa fa-angle-down" aria-hidden="true"></i>
                    </a>
                </li>
                <ul id="dropdown-navbar" class="dropdown-content dropdown__navbar">
                    <li><a href="/admin/users/{{ Auth::user()->id }}/edit">Moje konto</a></li>
                    <li class="divider"></li>

                    <li>
                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                        <a href="#!" href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fa fa-power-off" aria-hidden="true"></i>
                            <span>Wyloguj</span>
                        </a>
                    </li>
                </ul>
            </ul>
        </div>
    </nav>
</header>
<main>
    <div class="row">
        <aside>
            <ul id="side-out" class="side-nav fixed">
                <li>
                    <a href="{{url('/admin')}}" class="current-page">
                        <sapn class="icon__container">
                            <i class="fa fa-home" aria-hidden="true"></i>
                        </sapn>
                        <span class="side-nav__element">Panel</span>
                    </a>
                </li>
                <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                        <li class="collapsible__element">
                            <a class="collapsible-header">
                                <sapn class="icon__container">
                                    <i class="fa fa-th" aria-hidden="true"></i>
                                </sapn>
                                <span>Strony</span>
                            </a>
                            <div class="collapsible-body">
                                <ul>
                                    <li><a href="{{url('/admin/sites')}}">Lista</a></li>
                                    <li><a href="{{url('/admin/sites/create')}}">Nowa strona</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                        <li class="collapsible__element">
                            <a class="collapsible-header">
                                <sapn class="icon__container">
                                    <i class="fa fa-picture-o" aria-hidden="true"></i>
                                </sapn>
                                <span>Banery</span>
                            </a>
                            <div class="collapsible-body">
                                <ul>
                                    <li><a href="{{url('/admin/sliders')}}">Lista</a></li>
                                    <li><a href="{{url('/admin/sliders/create')}}">Nowy wpis</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                        <li class="collapsible__element">
                            <a class="collapsible-header">
                                <sapn class="icon__container">
                                    <i class="fa fa-folder-open-o" aria-hidden="true"></i>
                                </sapn>
                                <span>Blog</span>
                            </a>
                            <div class="collapsible-body">
                                <ul>
                                    <li><a href="{{url('/admin/blogs')}}">Lista</a></li>
                                    <li><a href="{{url('/admin/blogs/create')}}">Nowy wpis</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                        <li class="collapsible__element">
                            <a class="collapsible-header">
                                <sapn class="icon__container">
                                    <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                                </sapn>
                                <span>Aktualności</span>
                            </a>
                            <div class="collapsible-body">
                                <ul>
                                    <li><a href="{{url('/admin/news')}}">Lista</a></li>
                                    <li><a href="{{url('/admin/news/create')}}">Nowy wpis</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                        <li class="collapsible__element">
                            <a class="collapsible-header">
                                <sapn class="icon__container">
                                    <i class="fa fa-picture-o" aria-hidden="true"></i>
                                </sapn>
                                <span>Galeria</span>
                            </a>
                            <div class="collapsible-body">
                                <ul>
                                    <li><a href="{{url('/admin/albums')}}">Lista</a></li>
                                    <li><a href="{{url('/admin/albums/create')}}">Nowy wpis</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                        <li class="collapsible__element">
                            <a class="collapsible-header">
                                <sapn class="icon__container">
                                    <i class="fa fa-file-image-o" aria-hidden="true"></i>
                                </sapn>
                                <span>Logotypy</span>
                            </a>
                            <div class="collapsible-body">
                                <ul>
                                    <li><a href="{{url('/admin/logos')}}">Lista</a></li>
                                    <li><a href="{{url('/admin/logos/create')}}">Nowy wpis</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                        <li class="collapsible__element">
                            <a class="collapsible-header">
                                <sapn class="icon__container">
                                    <i class="fa fa-list-ul" aria-hidden="true"></i>
                                </sapn>
                                <span>Oferta</span>
                            </a>
                            <div class="collapsible-body">
                                <ul>
                                    <li><a href="{{url('/admin/offer')}}">Lista</a></li>
                                    <li><a href="{{url('/admin/offer/create')}}">Nowy wpis</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                        <li class="collapsible__element">
                            <a class="collapsible-header">
                                <sapn class="icon__container">
                                    <i class="fa fa-briefcase" aria-hidden="true"></i>
                                </sapn>
                                <span>Realizacje</span>
                            </a>
                            <div class="collapsible-body">
                                <ul>
                                    <li><a href="{{url('/admin/realizations')}}">Lista</a></li>
                                    <li><a href="{{url('/admin/realizations/create')}}">Nowy wpis</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                        <li class="collapsible__element">
                            <a class="collapsible-header">
                                <sapn class="icon__container">
                                    <i class="fa fa-tags" aria-hidden="true"></i>
                                </sapn>
                                <span>Technologie</span>
                            </a>
                            <div class="collapsible-body">
                                <ul>
                                    <li><a href="{{url('/admin/technology')}}">Lista</a></li>
                                    <li><a href="{{url('/admin/technology/create')}}">Nowy wpis</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                        <li class="collapsible__element">
                            <a class="collapsible-header">
                                <sapn class="icon__container">
                                    <i class="fa fa-users" aria-hidden="true"></i>
                                </sapn>
                                <span>Użytkownicy</span>
                            </a>
                            <div class="collapsible-body">
                                <ul>
                                    <li><a href="{{url('/admin/users')}}">Lista</a></li>
                                    <li><a href="{{url('/admin/users/create')}}">Nowy użytkownik</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                        <li class="collapsible__element">
                            <a class="collapsible-header">
                                <sapn class="icon__container">
                                    <i class="fa fa-file-picture-o" aria-hidden="true"></i>
                                </sapn>
                                <span>Zdjęcia w tle</span>
                            </a>
                            <div class="collapsible-body">
                                <ul>
                                    <li><a href="{{url('/admin/paralax')}}">Zobacz</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                        <li class="collapsible__element">
                            <a class="collapsible-header">
                                <sapn class="icon__container">
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                </sapn>
                                <span>Kalendarz</span>
                            </a>
                            <div class="collapsible-body">
                                <ul>
                                    <li><a href="{{url('/admin/calendar')}}">Zobacz</a></li>
                                    <li><a href="{{url('/admin/calendar-event-category')}}">Kategorie</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </aside>
        <div class="col s12">
            @yield('content')
        </div>
    </div>
</main>
</body>
</html>