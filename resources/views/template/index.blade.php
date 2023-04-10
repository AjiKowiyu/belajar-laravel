<!doctype html>
<html lang="id">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Aji Kowiyu">
        <title>Dashboard Template · Bootstrap v5.2</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/dashboard.js') }}"></script>
    </head>

    <body>
        
        <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
            <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">Company name</a>
            <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <input class="form-control form-control-dark w-100 rounded-0 border-0" type="text" placeholder="Search" aria-label="Search">
            <div class="navbar-nav">
                <div class="nav-item text-nowrap">
                <a class="nav-link px-3" href="#">Sign out</a>
                </div>
            </div>
        </header>

        <div class="container-fluid">
            <div class="row">
                <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                    <div class="position-sticky pt-3 sidebar-sticky">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link {{ (Request::segment(1) == 'home') ? 'active' : '' }}" aria-current="page" href="{{ route('home') }}">
                                    <span data-feather="home" class="align-text-bottom"></span>
                                    Dashboard
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ (Request::segment(1) == 'berita') ? 'active' : '' }}" href="{{ route('berita') }}">
                                    <span data-feather="file" class="align-text-bottom"></span>
                                    Berita
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>

                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                    @yield('konten')
                </main>
            </div>
        </div>

    </body>
</html>
