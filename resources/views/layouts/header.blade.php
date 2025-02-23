<header class="mb-5">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('index') ? 'active' : '' }}"
                           href="{{ route('index') }}">Главная</a>
                    </li>

                    @if(Auth::check())
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('user.dashboard') ? 'active' : '' }}"
                               href="{{ route('user.dashboard') }}">Личный кабинет</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>
