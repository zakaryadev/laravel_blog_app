<!-- Navbar Start -->
<div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-lg-5">
        <a href="/" class="navbar-brand ml-lg-3">
            <h1 class="m-0 display-5 text-uppercase text-primary"><i class="fa fa-truck mr-2"></i>Pátte</h1>
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between px-lg-3" id="navbarCollapse">
            <div class="navbar-nav m-auto py-0">
                <a href="/"
                    class="nav-item nav-link {{ Route::currentRouteName() === 'main' ? 'active' : '' }}">Bas
                    bet</a>

                <a href="{{ route('about') }}"
                    class="nav-item nav-link {{ Route::currentRouteName() === 'about' ? 'active' : '' }}">Biz
                    haqqımızda</a>

                <a href="{{ route('service') }}"
                    class="nav-item nav-link {{ Route::currentRouteName() === 'service' ? 'active' : '' }}">Servis</a>

                <a href="{{ route('price') }}"
                    class="nav-item nav-link {{ Route::currentRouteName() === 'price' ? 'active' : '' }}">Prays</a>

                <a href="{{ route('posts.index') }}"
                    class="nav-item nav-link {{ Route::currentRouteName() === 'posts.index' || Route::currentRouteName() === 'posts.show' ? 'active' : '' }}
                    ">Blog</a>

                <a href="{{ route('contact') }}"
                    class="nav-item nav-link {{ Route::currentRouteName() === 'contact' ? 'active' : '' }}">Kontakt</a>
            </div>

            @auth
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <img src="{{ strpos(auth()->user()->photo, 'https') !== false ? auth()->user()->photo : asset('storage/' . auth()->user()->photo) }}"
                            alt="" class="rounded-circle" width="40" height="40" />
                        <p class="d-inline-block mb-0 ml-2">{{ auth()->user()->name }}</p>
                    </button>
                    <ul class="dropdown-menu">
                        <li>
                            <strong class="dropdown-item disabled">
                                {{ auth()->user()->email }}
                            </strong>
                        </li>
                        <li>
                            <a href="{{ route('posts.mine') }}" class="dropdown-item">
                                Meniń postlarım
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('posts.create') }}" class="dropdown-item">
                                Post jaratıw
                            </a>
                        </li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST" class="dropdown-item">
                                @csrf
                                <button class="btn btn-danger w-100" type="submit">Shıǵıw</button>
                            </form>
                        </li>
                    </ul>
                </div>
            @else
                <a href="{{ route('login') }}" class="btn btn-primary py-2 px-4 d-none d-lg-block">Kiriw</a>
            @endauth
        </div>
    </nav>
</div>
<!-- Navbar End -->
