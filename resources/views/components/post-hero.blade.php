<div class="card mb-3">
  <img src="https://source.unsplash.com/900x300?{{ $categoryName }}"
    alt="{{ $categoryName }}"
    class="card-img-top" />
  <div class="card-body text-center">
    <h3 class="card-title">
      <a href="{{ route('posts.detail', $slug) }}"
        class="text-decoration-non text-dark">
        {{ $title }}
      </a>
    </h3>
    <p>
      <span>By.</span>
      <a href="{{ route('authors.posts' , $authorUsername) }}"
        class="text-decoration-non text-danger fw-bold">
        {{ $authorName }}
      </a>
      <span>in</span>
      <a href="{{ route('categories.posts', $categorySlug) }}"
        class="text-decoration-none text-danger fw-bold">
        {{ $categoryName }}
      </a>
      <small>{{ $createdAt }}</small>
    </p>
    <p class="card-text">{{ $excerpt }}</p>
    <a href="{{ route('posts.detail', $slug) }}"
      class="text-decoration-none btn btn-primary">
      Read more...
    </a>
  </div>
</div>