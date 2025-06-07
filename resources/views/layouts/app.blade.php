<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  <link href="{{ asset('assets/bootstrap.min.css') }}" rel="stylesheet">
  <style>
    body { background-color: #f0f2f5; }
    .profile-img { width: 50px; height: 50px; object-fit: cover; border-radius: 50%; }
    .dropdown-menu { max-height: 300px; overflow-y: auto; }
    .profile-img { width: 100px; height: 100px; object-fit: cover; border-radius: 50%; }
  </style>
  </style>
</head>
<body>

    @include('includes.navbar')

    @yield('content')

<script src="{{ asset('assets/bootstrap.bundle.min.js') }}"></script>

<!-- Script Simulasi Jumlah Tayangan -->
<script>
  document.addEventListener("DOMContentLoaded", function () {
    const posts = document.querySelectorAll(".post-card");
    posts.forEach(post => {
      const views = Math.floor(Math.random() * 450) + 50; // Simulasi 50-500 views
      const viewCountElement = post.querySelector(".view-count");
      if (viewCountElement) {
        viewCountElement.textContent = views;
      }
    });
  });
</script>
</body>
</html>
