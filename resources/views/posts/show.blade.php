<x-layouts.main>
    <x-slot:title>
        {{ $post->title }}
    </x-slot:title>
    <x-jumbotron>
        {{ $post->title }}
    </x-jumbotron>
    <!-- Blog Start -->
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-8">
                @auth
                    @canany(['update', 'delete'], $post)
                        <div class="text-right mb-4">
                            <a href="{{ route('posts.edit', ['post' => $post->id]) }}" class="btn btn-success">Ózgertiw</a>
                            <form onsubmit="return confirm('Siz bul posttı óshirejaqsızba?');" class="d-inline"
                                action="{{ route('posts.destroy', ['post' => $post->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Óshiriw</button>
                            </form>
                        </div>
                    @endcanany
                @endauth
                <!-- Blog Detail Start -->
                <div class="pb-3">
                    <div class="position-relative">
                        <img class="img-fluid w-100" src="{{ asset('storage/' . $post->photo) }}" alt="">
                        <div class="position-absolute bg-primary d-flex flex-column align-items-center justify-content-center rounded-circle"
                            style="width: 60px; height: 60px; bottom: -30px; right: 30px;">
                            <h4 class="font-weight-bold mb-n1">{{ getDay($post->created_at) }}</h4>
                            <small class="text-white text-uppercase">{{ getMonth($post->created_at) }}</small>
                        </div>
                    </div>
                    <div class="bg-secondary mb-3" style="padding: 30px;">
                        <div class="d-flex mb-3">
                            <div class="d-flex align-items-center">
                                <img class="rounded-circle" style="width: 40px; height: 40px;"
                                    src="{{ $post->user->photo }}" alt="{{ $post->user->photo }}">
                                <a class="text-muted ml-2" href="">{{ $post->user->name }}</a>
                            </div>
                            <div class="d-flex align-items-center ml-4">
                                <i class="far fa-bookmark text-primary"></i>
                                <a class="text-muted ml-2" href="">{{ $post->category->name }}</a>
                            </div>
                            <div class="d-flex align-items-center ml-4">
                                <i class="far fa-calendar text-primary"></i>
                                <a class="text-muted ml-2" href="">{{ getFullTime($post->created_at) }}</a>
                            </div>
                        </div>
                        <h4 class="font-weight-bold mb-3">{{ $post->title }}</h4>
                        <p>{{ $post->content }}</p>
                    </div>
                </div>
                <!-- Blog Detail End -->

                <!-- Comment List Start -->
                <div class="bg-secondary" style="padding: 30px; margin-bottom: 30px;">
                    <h3 class="mb-4">
                        {{ $post->comments()->count() }} kommentariya</h3>

                    @foreach ($post->comments as $comment)
                        <div class="media mb-4">
                            <div class="media-head">
                                <img style="width: 40px; height: 40px;"
                                    src="{{ strpos($comment->user->photo, 'https') !== false ? $comment->user->photo : asset('storage/' . $comment->user->photo) }}"
                                    alt="Image" class="img-fluid mr-3 mt-1 rounded-circle" style="width: 45px;">
                                <small>{{ getHour($comment->created_at) }}</small>
                            </div>

                            <div class="media-body">
                                <h6><a href="">{{ $comment->user->name }}</a>
                                    <small><i>{{ getShortTime($comment->created_at) }}</i></small>
                                </h6>
                                <p>{{ $comment->body }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- Comment List End -->

                <!-- Comment Form Start -->
                <div class="bg-secondary mb-3" style="padding: 30px;">
                    <h3 class="mb-4">Kommentariya qaldiriw</h3>
                    @auth
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form action="{{ route('comments.store') }}" method="POST">
                            @csrf
                            <input type="text" class="form-control border-0" hidden name="post_id"
                                value="{{ $post->id }}">
                            <div class="form-group">
                                <label for="message">Xabar *</label>
                                <textarea name="body" cols="30" rows="5" class="form-control border-0"></textarea>
                            </div>
                            <div class="form-group mb-0">
                                <button type="submit"
                                    class="btn btn-primary font-weight-semi-bold py-2 px-3">Jiberiw</button>
                            </div>
                        </form>
                    @else
                        <div class="alert alert-danger">
                            <a href="{{ route('login') }}">Saytqa kirseńizǵana, kommentariya qaldira alasız</a>
                        </div>
                    @endauth
                </div>
                <!-- Comment Form End -->
            </div>

            <!-- Sidebar Start -->
            <div class="col-lg-4 mt-5 mt-lg-0">
                <!-- Search Form Start -->
                <div class="mb-5">
                    <div class="bg-secondary" style="padding: 30px;">
                        <div class="input-group">
                            <input type="text" class="form-control border-0 p-4" placeholder="Keyword">
                            <div class="input-group-append">
                                <span class="input-group-text bg-primary border-primary text-white"><i
                                        class="fa fa-search"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Search Form End -->

                <!-- Category Start -->
                <x-categories :categories="$categories" />
                <!-- Category End -->

                <!-- Recent Post Start -->
                <div class="mb-5">
                    <h3 class="mb-4">Recent Post</h3>
                    @foreach ($recent_posts as $recent_post)
                        <x-sidebar_post_card :post="$recent_post" />
                    @endforeach
                </div>

                <!-- Recent Post End -->
                <!-- Tags Start -->
                <div class="mb-5">
                    <h3 class="mb-4">Tag Cloud</h3>
                    <div class="d-flex flex-wrap m-n1">
                        @foreach ($post->tags as $tag)
                            <a href="" class="btn btn-secondary m-1">{{ $tag->name }}</a>
                        @endforeach
                    </div>
                </div>
                <!-- Tags End -->

            </div>
            <!-- Sidebar End -->
        </div>
    </div>
    <!-- Blog End -->
</x-layouts.main>
