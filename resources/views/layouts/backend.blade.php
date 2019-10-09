<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/backend.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/backend.css') }}" rel="stylesheet">

{{--    <script src="//code.jquery.com/jquery.js"></script>--}}

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

    <style>

        /* ---------------------------------------------------
            SIDEBAR STYLE
        ----------------------------------------------------- */

        .wrapper {
            display: flex;
            width: 100%;
        }

        #sidebar {
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            z-index: 999;
            background: #7386D5;
            color: #fff;
            transition: all 0.3s;
        }

        #sidebar.active {
            margin-left: -250px;
        }

        #sidebar .sidebar-header {
            padding: 20px;
            background: #6d7fcc;
        }

        #sidebar ul.components {
            padding: 20px 0;
            border-bottom: 1px solid #47748b;
        }

        #sidebar ul p {
            color: #fff;
            padding: 10px;
        }

        #sidebar ul li a {
            padding: 10px;
            font-size: 1.1em;
            display: block;
            color: #fff;
        }

        #sidebar ul li a:hover {
            color: #7386D5;
            background: #fff;
        }

        #sidebar ul li.active>a,
        a[aria-expanded="true"] {
            color: #fff;
            background: #6d7fcc;
        }

        a[data-toggle="collapse"] {
            position: relative;
        }

        .dropdown-toggle::after {
            display: block;
            position: absolute;
            top: 50%;
            right: 20px;
            transform: translateY(-50%);
        }

        ul ul a {
            font-size: 0.9em !important;
            padding-left: 30px !important;
            background: #6d7fcc;
        }

        /* ---------------------------------------------------
            CONTENT STYLE
        ----------------------------------------------------- */

        #content {
            width: calc(100% - 250px);
            padding: 40px;
            min-height: 100vh;
            transition: all 0.3s;
            position: absolute;
            top: 0;
            right: 0;
        }

        #content.active {
            width: 100%;
        }

        /* ---------------------------------------------------
            MEDIAQUERIES
        ----------------------------------------------------- */

        @media (max-width: 768px) {
            #sidebar {
                margin-left: -250px;
            }
            #sidebar.active {
                margin-left: 0;
            }
            #content {
                width: 100%;
            }
            #content.active {
                width: calc(100% - 250px);
            }
            #sidebarCollapse span {
                display: none;
            }
        }
    </style>


</head>
<body>

<div class="wrapper">
    <!-- Sidebar  -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3><a href="{{ route('backend') }}" style="color: #fff;">Laravel Backend</a></h3>
        </div>

        <ul class="list-unstyled">
            <li>
                <a href="{{ route('manufacturer.index') }}" class="dropdown-item {{ (\Request::is('backend/manufacturer*')) ? 'font-weight-bold' : '' }}">Hersteller</a>
            </li>
            <li>
                <a href="{{ route('categorie.index') }}" class="dropdown-item {{ (\Request::is('backend/categorie*')) ? 'font-weight-bold' : '' }}">Kategorie</a>
            </li>
            <li>
                <a href="{{ route('article.index') }}" class="dropdown-item {{ (\Request::is('backend/article*')) ? 'font-weight-bold' : '' }}">Artikel</a>
            </li>
            <li>
                <a href="{{ route('tag.index') }}" class="dropdown-item {{ (\Request::is('backend/tag*')) ? 'font-weight-bold' : '' }}">Tag</a>
            </li>
            <hr>
            <li>
                <a href="{{ route('provider.index') }}" class="dropdown-item {{ (\Request::is('backend/provider*')) ? 'font-weight-bold' : '' }}">Provider</a>
            </li>
            <li>
                <a href="{{ route('tarif.index') }}" class="dropdown-item {{ (\Request::is('backend/tarif*')) ? 'font-weight-bold' : '' }}">Tarif</a>
            </li>
            <hr>
            <li>
                <a href="{{ route('changelog') }}" class="dropdown-item {{ (\Request::is('backend/changelog')) ? 'font-weight-bold' : '' }}">Changelog</a>
            </li>
            <li>
                <a href="{{ route('articleInformation') }}" target="_blank" class="dropdown-item">Article Information Mail</a>
            </li>
            <li>
                <a href="{{ route('pdftest') }}" target="_blank" class="dropdown-item">Pdf Test</a>
            </li>
            <li>
                <a href="{{ route('exampleForm') }}" class="dropdown-item {{ (Request::is('backend/exampleForm')) ? 'font-weight-bold' : '' }}">Example Form</a>
            </li>
        </ul>
        <ul class="list-unstyled">
            <hr>
            <li>
                <a href="{{ route('frontend.frontend') }}" target="_blank" class="dropdown-item">Frontend</a>
            </li>
        </ul>
    </nav>

    <!-- Page Content  -->
    <div id="content">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">

                <button type="button" id="sidebarCollapse" class="btn btn-info ml-auto" style="color: #fff;">
                    <i class="fas fa-align-left"></i>
                </button>
                <a class="btn btn-dark ml-2" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </nav>

            <div class="container">
                @yield('content')
            </div>

    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar, #content').toggleClass('active');
            $('.collapse.in').toggleClass('in');
            $('a[aria-expanded=true]').attr('aria-expanded', 'false');
        });
    });
</script>
</body>

@include('backend.elements.toastr')
@stack('scripts')


</html>
