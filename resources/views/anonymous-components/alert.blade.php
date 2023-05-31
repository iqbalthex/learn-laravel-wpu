@if (session()->has('alert'))
  <div id="alert" role="alert"
    class="alert alert-{{ session('alert')['color'] }} alert-dismissible fade show text-center fs-4 slide-down">
    {{ session('alert')['message'] }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  </div>
@endif
