<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-secondary-subtle sidebar collapse">
  <div class="position-sticky pt-3 sidebar-sticky">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link {{ Request::routeIs('dashboard') ? 'active' : '' }}"
          href="{{ route('dashboard') }}">
          <span data-feather="home" class="align-text-bottom"></span>
          Dashboard
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::routeIs('posts*') ? 'active' : '' }}"
          href="{{ route('posts.index') }}">
          <span data-feather="file" class="align-text-bottom"></span>
          My Posts
        </a>
      </li>
    </ul>

    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
      <span>ADMINISTRATOR</span>
    </h6>
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link {{ Request::routeIs('categories*') ? 'active' : '' }}"
          href="{{ route('categories.index') }}">
          Post Categories
        </a>
      </li>
    </ul>
  </div>
</nav>
