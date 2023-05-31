<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="X-UA-Compatible" content="ie=edge" />

<link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" />
<link type="text/css" rel="stylesheet" href="{{ route('home') }}/css/style.css" />

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" defer></script>
<script type="text/javascript" src="{{ route('home') }}/js/script.js" defer></script>

<title>WPU - Blog | {{ $title }}</title>

</head>
<body>

@include('partials.navbar')

<div class="container mt-3">
  @yield('container')
</div>

</body>
</html>
