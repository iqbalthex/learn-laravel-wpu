<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-secondary-subtle sidebar collapse">
  <div class="position-sticky pt-3 sidebar-sticky">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}"
          href="{{ route('dashboard') }}">
          <span data-feather="home" class="align-text-bottom"></span>
          Dashboard
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard/posts') ? 'active' : '' }}"
          href="{{ route('posts.index') }}">
          <span data-feather="file" class="align-text-bottom"></span>
          My Posts
        </a>
      </li>
    </ul>
  </div>
</nav>
