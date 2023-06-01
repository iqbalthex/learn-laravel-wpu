<nav class="navbar navbar-dark navbar-expand-lg bg-primary bg-gradient bg-opacity-75">
  <div class="container-fluid">
    <a class="navbar-brand" href="./">WPU Blog</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link {{ Request::routeIs('home') ? 'active' : '' }}"
            href="{{ route('home') }}">
            Home
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::routeIs('about') ? 'active' : ''}}"
            href="{{ route('about') }}">
            About
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::routeIs('posts') ? 'active' : ''}}"
            href="{{ route('posts') }}">
            Blog
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::routeIs('categories') ? 'active' : ''}}"
            href="{{ route('categories') }}">
            Categories
          </a>
        </li>
      </ul>
      <ul class="navbar-nav">
        @auth
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Welcome back, {{ auth()->user()->name }}
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">My Dashboard</a></li>
              <li><hr class="dropdown-divider"></li>
              <li>
                <form action="{{ route('logout') }}" method="post">
                  @csrf
                  <button type="submit" class="dropdown-item">Logout</button>
                </form>
              </li>
            </ul>
          </li>
        @else
          <li class="nav-link">
            <a href="{{ route('login') }}" class="nav-link ms-auto text-white">
              Sign in
            </a>
          </li>
        @endauth
      <ul>
    </div>
  </div>
</nav>
