<nav class="navbar navbar-dark navbar-expand-lg bg-primary bg-gradient bg-opacity-75">
  <div class="container-fluid">
    <a class="navbar-brand" href="./">WPU Blog</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link {{ $active === 'home' ? 'active' : ''}}"
            href="{{ route('home') }}">
            Home
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ $active === 'about' ? 'active' : ''}}"
            href="{{ route('about') }}">
            About
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ $active === 'posts' ? 'active' : ''}}"
            href="{{ route('posts') }}">
            Blog
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ $active === 'categories' ? 'active' : ''}}"
            href="{{ route('categories') }}">
            Categories
          </a>
        </li>
      </ul class="navbar-nav">
        <li class="nav-link">
          <a href="{{ route('login') }}" class="nav-link ms-auto text-white">
            Sign in
          </a>
        </li>
      <ul>
    </div>
  </div>
</nav>
