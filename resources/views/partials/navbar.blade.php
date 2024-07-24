<!-- resources/views/partials/navbar.blade.php -->
<!-- Navbar -->

<!-- Left navbar links -->
<ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    {{-- <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
    </li> --}}
</ul>

<!-- Right navbar links -->
<ul class="navbar-nav ml-auto">
    <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
        </a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            {{ auth()->user()->username }}
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
                <a class="dropdown-item" href="#"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
            </form>
        </div>
    </li>
</ul>



<!-- /.navbar -->
