<article class="mb-4 pb-2 border-bottom border-dark">
  <h2>
    <a href="{{ route('posts.detail', $slug) }}"
      class="text-decoration-none text-dark">
      {{ $title }}
    </a>
  </h2>
  <p>
    By.
    <span class="text-decoration-none text-danger fw-bold">
      {{ $author }}
    </span>
    in
    <a href="{{ route('categories.posts', $categorySlug) }}"
      class="text-decoration-none text-danger fw-bold">
      {{ $categoryName }}
    </a>
  </p>

  <p>{{ $excerpt }}</p>
  <a href="{{ route('posts.detail', $slug) }}"
    class="text-decoration-none text-dark fw-bold">
    Read more
  </a>
</article>