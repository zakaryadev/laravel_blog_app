<div class="d-flex mb-3">
    <img class="img-fluid" src="{{ asset('storage/' . $post->photo) }}"
        style="width: 80px; height: 80px; object-fit: cover;" alt="{{ $post->photo }}">
    <a href="{{ route('posts.show', ['post' => $post->id]) }}"
        class="w-100 d-flex align-items-center bg-secondary text-dark text-decoration-none px-3" style="height: 80px;">
        {{ substr($post->title, 0, 10) }}...
    </a>
</div>
