<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily Expense</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{url('/')}}/assets/img/svg/logo.svg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <!-- Custom styles -->
    <link rel="stylesheet" href="{{url('/')}}/assets/css/style.css">
    @stack('css')
</head>

<body>
    <div class="layer"></div>
    <!-- ! Body -->
    <a class="skip-link sr-only" href="#skip-target">Skip to content</a>
    <div class="page-flex">
        <!-- ! Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-start">
                <div class="sidebar-head">
                    <a href="{{ route('dashboard') }}" class="logo-wrapper" title="Home">
                        <span class="sr-only">Home</span>
                        <span class="icon logo" aria-hidden="true"></span>
                        <div class="logo-text">
                            <span class="logo-title">Panel</span>
                            <span class="logo-subtitle">Daily Expense</span>
                        </div>

                    </a>
                    <button class="sidebar-toggle transparent-btn" title="Menu" type="button">
                        <span class="sr-only">Toggle menu</span>
                        <span class="icon menu-toggle" aria-hidden="true"></span>
                    </button>
                </div>
                <div class="sidebar-body">
                    <ul class="sidebar-body-menu">
                        <li>
                            <a class="{{ Request::routeIs('dashboard') ? 'active' : '' }}"
                                href="{{ route('dashboard') }}"><span class="icon home"
                                    aria-hidden="true"></span>Dashboard</a>
                        </li>
                        <li>
                            <a class="show-cat-btn" href="##">
                                <span class="icon document" aria-hidden="true"></span>Expenses
                                <span class="category__btn transparent-btn" title="Open list">
                                    <span class="sr-only">Open list</span>
                                    <span class="icon arrow-down" aria-hidden="true"></span>
                                </span>
                            </a>
                            <ul class="cat-sub-menu visible">
                                <li>
                                    <a href="{{ route('expenses.index')}}">Admin Expenses</a>
                                </li>
                                  <li>
                                    <a href="{{ route('warehouse.expense')}}">Warehouse Expenses</a>
                                </li>
                            </ul>
                        </li>
                        @if(Auth::user()->user_group_id == 1)
                        <li>
                            <a class="{{ Request::routeIs('users.index') ? 'active' : '' }}"
                                href="{{ route('users.index') }}"><span class="icon user-3"
                                    aria-hidden="true"></span>Users</a>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </aside>
        <div class="main-wrapper">
            <!-- ! Main nav -->
            <nav class="main-nav--bg">
                <div class="container main-nav">
                    <div class="main-nav-start">
                        <div class="search-wrapper">

                        </div>
                    </div>
                    <div class="main-nav-end">
                        <button class="sidebar-toggle transparent-btn" title="Menu" type="button">
                            <span class="sr-only">Toggle menu</span>
                            <span class="icon menu-toggle--gray" aria-hidden="true"></span>
                        </button>
                        <div class="nav-user-wrapper">
                            <button href="##" class="nav-user-btn dropdown-btn" title="My profile" type="button">
                                <span class="sr-only">My profile</span>
                                <span class="nav-user-img">
                                    <picture>
                                        <source srcset="{{url('/')}}/assets/img/avatar/avatar-illustrated-02.webp"
                                            type="image/webp"><img
                                            src="{{url('/')}}/assets/img/avatar/avatar-illustrated-02.png"
                                            alt="User name">
                                    </picture>
                                </span>
                            </button>
                            <ul class="users-item-dropdown nav-user-dropdown dropdown">
                                <li><a href="{{ route('users.account')}}">
                                        <i data-feather="settings" aria-hidden="true"></i>
                                        <span>Account settings</span>
                                    </a></li>
                                <li><a class="danger" href="{{ route('logout') }}">
                                        <i data-feather="log-out" aria-hidden="true"></i>
                                        <span>Log out</span>
                                    </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- ! Main -->
            <main class="main users chart-page" id="skip-target">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                @yield('content')
            </main>
            <!-- ! Footer -->
            <!-- <footer class="footer">
                <div class="container footer--flex">
                    <div class="footer-start">
                        <p>2022 © Elegant Dashboard - <a href="elegant-dashboard.com" target="_blank"
                                rel="noopener noreferrer">elegant-dashboard.com</a></p>
                    </div>
                    <ul class="footer-end">
                        <li><a href="##">About</a></li>
                        <li><a href="##">Support</a></li>
                        <li><a href="##">Puchase</a></li>
                    </ul>
                </div>
            </footer> -->
        </div>
    </div>
    <script src="{{url('/')}}/assets/js/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="{{url('/')}}/assets/js/datepicker.js"></script>
    <script src="{{url('/')}}/assets/js/feather.min.js"></script>
    <!-- Custom scripts -->
    <script src="{{url('/')}}/assets/js/script.js"></script>
    @include('sweetalert::alert')
    @stack('scripts')
</body>

</html>