<div class="col-md-12 mb-3">
    <div class="position-relative">
        <img class="img-fluid w-100" src="{{ getImage($post->photo) }}" height="240">
        <div class="position-absolute bg-primary d-flex flex-column align-items-center justify-content-center rounded-circle"
            style="width: 60px; height: 60px; bottom: -30px; right: 30px;">
            <h4 class="font-weight-bold mb-n1">{{ getDay($post->created_at) }}</h4>
            <small class="text-white text-uppercase">{{ getMonth($post->created_at) }}</small>
        </div>
    </div>
    <div class="bg-secondary mb-3" style="padding: 30px;">
        <div class="d-flex mb-3">
            <div class="d-flex align-items-center">
                <img class="rounded-circle" style="width: 40px; height: 40px;" src="{{ getImage($post->user->photo) }}"
                    alt="">
                <a class="text-muted ml-2" href="">{{ $post->user->name }}</a>
            </div>
            <div class="d-flex align-items-center ml-4">
                <i class="far fa-bookmark text-primary"></i>
                <a class="text-muted ml-2" href="">{{ $post->category->name }}</a>
            </div>
        </div>
        <h4 class="font-weight-bold mb-3">{{ $post->title }}</h4>
        <p>{{ $post->short_content }}</p>
        <div class="d-flex flex-wrap mb-1">
            @foreach ($post->tags as $tag)
                <a href="#" class="btn btn-warning mx-1"> {{ $tag->name }}</a>
            @endforeach
        </div>
        <a class="border-bottom border-primary text-uppercase text-decoration-none"
            href="{{ route('posts.show', ['post' => $post->id]) }}">Read More <i class="fa fa-angle-right"></i></a>
    </div>
</div>
