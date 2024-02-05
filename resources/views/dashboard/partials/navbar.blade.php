<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <span class="navbar-brand ms-3">Dashboard</span>
    <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId"
        aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation"></button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav me-auto mt-2 mt-lg-0">
            <li class="nav-item">
                <a class="nav-link" href="/" aria-current="page">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" href="/dashboard"
                    aria-current="page">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('foto*') ? 'active' : '' }}" href="/fotos">Foto</a>
            </li>
            @if (Auth::user()->role_id == 1)
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('categori*') ? 'active' : '' }}" href="/categoris">Categori</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('user*') ? 'active' : '' }}" href="/users">User</a>
                </li>
            @endif
            <li class="nav-item">
                <a class="nav-link" href="/logout">logout</a>
            </li>
        </ul>
    </div>
</nav>
