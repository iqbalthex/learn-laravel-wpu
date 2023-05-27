<article class="mb-4 pb-2 border-bottom border-dark">
  <h2>
    <a href="{{ route('posts.detail', $slug) }}"
      class="text-decoration-none text-dark">
      {{ $title }}
    </a>
  </h2>
  <p>
    By.
    <a href="{{ route('authors.posts' , $authorUsername) }}"
      class="text-decoration-none text-danger fw-bold">
      {{ $authorName }}
    </a>
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