<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>Kabar</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('fontawesome/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/blog.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>
    <script src="{{ asset('fontawesome/js/all.min.js') }}"></script>
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
            font-size: 3.5rem;
            }
        }

        .b-example-divider {
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }
    </style>
</head>
<body>
    <div class="container">
        <header class="blog-header lh-1 py-3">
            <div class="row flex-nowrap justify-content-between align-items-center">
                <div class="col-4 pt-1">
                    <a class="link-secondary" href="#">Subscribe</a>
                </div>
                <div class="col-4 text-center">
                    <a class="blog-header-logo text-dark" href="#">Large</a>
                </div>
                <div class="col-4 d-flex justify-content-end align-items-center">
                    @if (Route::has('login'))
                        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                            @auth
                                <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Home</a>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-outline-primary">Login</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="ml-4 btn btn-outline-secondary">Register</a>
                                @endif
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        </header>
    </div>

    <main class="container">
        <div class="row my-3">
            <div class="col-md-8">
                <article class="blog-post">
                    <h2 class="blog-post-title mb-1">{{ $berita->judul }}</h2>
                    <p class="blog-post-meta">{{ date('d F Y - H:i', strtotime($berita->tanggal_create)) }}</p>
                    <img src="{{ ($berita->foto != 'default-news.jpg') ? asset("storage/$berita->foto") : asset("images/berita/$berita->foto") }}" class="w-100" alt="{{ $berita->judul }}">
                    <p>{!! $berita->isi !!}</p>
                </article>
            </div>
            <div class="col-md-4">
                <div class="position-sticky" style="top: 2rem;">
                    <div class="p-4 mb-3 bg-light rounded">
                        <h4 class="fst-italic">About</h4>
                        <p class="mb-0">Customize this section to tell your visitors a little bit about your publication, writers, content, or something else entirely. Totally up to you.</p>
                    </div>
                    <div class="p-4">
                        <h4 class="fst-italic">Berita {{ $berita->nama_kategori }} Lainnya</h4>
                        <ol class="list-unstyled mb-0">
                            @foreach ($berita_lain as $bl)
                                <li><a href="{{ route('kabar-berita', ['id_berita' => $bl->id, 'judul_berita' => $bl->judul]) }}">{{ $bl->judul }}</a></li>
                            @endforeach
                        </ol>
                    </div>
                    <div class="p-4">
                        <h4 class="fst-italic">Elsewhere</h4>
                        <ol class="list-unstyled">
                            <li><a href="#">GitHub</a></li>
                            <li><a href="#">Twitter</a></li>
                            <li><a href="#">Facebook</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="blog-footer">
        <p>Blog template built for <a href="https://getbootstrap.com/">Bootstrap</a> by <a href="https://twitter.com/mdo">@mdo</a>.</p>
        <p>
            <a href="#">Back to top</a>
        </p>
    </footer>
</body>
</html>
