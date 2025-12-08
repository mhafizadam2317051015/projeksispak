<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
    <div class="container">

        <a class="navbar-brand fw-bold" href="{{ url('/') }}">
    Sistem Pakar Kucing
</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
                data-bs-target="#mainNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNav">
            <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('diagnosa') ? 'active' : '' }}" 
                       href="{{ url('/diagnosa') }}">
                        Diagnosa
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('tentang') ? 'active' : '' }}" 
                       href="{{ url('/tentang') }}">
                        Tentang
                    </a>
                </li>

            </ul>
        </div>

    </div>
</nav>
