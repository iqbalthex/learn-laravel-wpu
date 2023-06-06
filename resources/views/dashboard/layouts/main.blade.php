<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="X-UA-Compatible" content="ie=edge" />

<link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" />
<link type="text/css" rel="stylesheet" href="{{ asset('css/style.css') }}" />
<link type="text/css" rel="stylesheet" href="{{ asset('css/dashboard.css') }}" />
<style>

trix-toolbar span[data-trix-button-group="file-tools"] { display: none; }

</style>

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" defer></script>

<title>WPU - Blog | {{ $title }}</title>

</head>
<body>

@include('dashboard.layouts.header')

<div class="container-fluid">
  <div class="row">
    @include('dashboard.layouts.sidebar')

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      @yield('container')
    </main>
  </div>
</div>

<script>

const title = document.getElementById("title");
const slug = document.getElementById("slug");

title.addEventListener("change", async () => {
  const response = await fetch(`{{ route('posts.generate-slug') }}/${title.value}`);
  const data = await response.json();
  slug.value = data.slug;
});

document.addEventListener("trix-file-accept", e => e.preventDefault());

</script>

<script type="text/javascript" src="{{ asset('js/trix@2.0.0/trix.umd.min.js') }}"></script>

</body>
</html>
