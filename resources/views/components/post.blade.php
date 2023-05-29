<div class="col-md-4 mb-3">
  <div class="card">
    <div class="position-absolute px-3 py-2"
      style="background-color: rgba(0, 0, 0, .6)">
      <a href="{{ route('posts', ['category' => $categorySlug]) }}"
        class="text-decoration-none text-white fw-bold">
        {{ $categoryName }}
      </a>
    </div>
    <img src="https://source.unsplash.com/400x300?{{ $categoryName }}"
      alt="{{ $categoryName }}"
      class="card-img-top" />
    <div class="card-body">
      <h5 class="card-title">
        <a href="{{ route('posts.detail', $slug) }}"
          class="text-decoration-none text-dark">
          {{ $title }}
        </a>
      </h5>
      <p>
        <span>By.</span>
        <a href="{{ route('posts', ['author' => $authorUsername]) }}"
          class="text-decoration-none text-danger fw-bold">
          {{ $authorName }}
        </a>
        <span>in</span>
        <a href="{{ route('posts', ['category' => $categorySlug]) }}"
          class="text-decoration-none text-danger fw-bold">
          {{ $categoryName }}
        </a>
        <small>{{ $createdAt }}</small>
      </p>
      <p class="card-text">{{ $excerpt }}</p>
      <a href="{{ route('posts.detail', $slug) }}"
        class="btn btn-primary">
        Read more...
      </a>
    </div>
  </div>
</div>