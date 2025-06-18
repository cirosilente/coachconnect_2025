<div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
            <div class="col-md-3 mb-2 mb-md-0">
                <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none">
                    <i class="fa-solid fa-dumbbell fa-1x" style="color: #0a58ca">CoahConnect</i>
                </a>
            </div>
            <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                <li><a href="/dashboard" class="nav-link px-2 link-secondary">Dashboard</a></li>
                <li><a href="#" class="nav-link px-2">Palestra</a></li>
                <li><a href="#" class="nav-link px-2">Chi siamo</a></li>
            </ul>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-outline-primary me-2">Logout</button>
            </form>
        </header>
    </nav>
</div>
