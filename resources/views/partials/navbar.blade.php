<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId"
        aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation"></button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <span class="navbar-brand me-auto ms-3">Gallery Foto</span>
        <ul class="navbar-nav">
            <li class="nav-item me-5">
                <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/" aria-current="page">Home</a>
            </li>
            @if (Auth::user())
                <li class="nav-item me-5">
                    <a class="nav-link " href="/dashboard" aria-current="page">Dashboard</a>
                </li>
                <li class="nav-item me-5">
                    <a class="nav-link {{ Request::is('categori*') ? 'active' : '' }}" href="/categoris-home"
                        aria-current="page">Categori</a>
                </li>
                <li class="nav-item me-5">
                    <a class="nav-link" href="/logout">Logout</a>
                </li>
            @else
                <li class="nav-item me-5">
                    <a class="nav-link" href="/login" aria-current="page">Login</a>
                </li>
            @endif
        </ul>

    </div>
</nav>
