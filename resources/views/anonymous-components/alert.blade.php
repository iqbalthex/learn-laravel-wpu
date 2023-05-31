@if (session()->has('alert'))
  <div class="alert alert-{{ session('alert')['color'] }} alert-dismissible fade show text-center" role="alert">
    {{ session('alert')['message'] }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  </div>
@endif
