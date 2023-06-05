<div class="col-md-4 mb-3">
  <div class="card">
    <div class="position-absolute px-3 py-2"
      style="background-color: rgba(0, 0, 0, .6)">
      <a href="{{ route('posts', ['category' => $post->category->slug]) }}"
        class="text-decoration-none text-white fw-bold">
        {{ $post->category->name }}
      </a>
    </div>

    <img alt="{{ $categoryName }}" class="card-img-top"
    @if ($post->image)
      src="{{ asset('storage/' . $post->image) }}"
    @else
      src="https://source.unsplash.com/900x300?{{ $post->category->name }}"
    @endif
    />

    <div class="card-body">
      <h5 class="card-title">
        <a href="{{ route('posts.detail', $post->slug) }}"
          class="text-decoration-none text-dark">
          {{ $post->title }}
        </a>
      </h5>
      <p>
        <span>By.</span>
        <a href="{{ route('posts', ['author' => $post->author->username]) }}"
          class="text-decoration-none text-danger fw-bold">
          {{ $post->author->name }}
        </a>
        <span>in</span>
        <a href="{{ route('posts', ['category' => $post->category->slug]) }}"
          class="text-decoration-none text-danger fw-bold">
          {{ $post->category->name }}
        </a>
        <small>{{ $post->created_at }}</small>
      </p>
      <p class="card-text">{{ $post->excerpt }}</p>
      <a href="{{ route('posts.detail', $post->slug) }}"
        class="btn btn-primary">
        Read more...
      </a>
    </div>
  </div>
</div>