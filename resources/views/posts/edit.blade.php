<x-layouts.main>
    <x-slot:title>
        Post redaktorlaw
    </x-slot:title>
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <h1 class="mb-4">Post redaktorlaw</h1>
                <div class="contact-form bg-secondary" style="padding: 30px;">
                    <div id="success"></div>
                    <form action="{{ route('posts.update', ['post' => $post->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="control-group mb-3">
                            <select class="form-control border-0 @error('category_id') is-invalid @enderror"
                                name="category_id">
                                <option class="form-control border-0 p-4" value="{{ $post->category->id }}" selected>
                                    {{ $post->category->name }}</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <p class="help-block text-danger">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="control-group mb-3">
                            <input type="text" name="title" placeholder="Title" value="{{ $post->title }}"
                                class="form-control border-0 p-4 @error('title') is-invalid @enderror" />
                            @error('title')
                                <p class="help-block text-danger">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="control-group mb-3">
                            <input type="text"
                                class="form-control border-0 p-4  @error('short_content') is-invalid @enderror"
                                name="short_content" placeholder="Your short content"
                                value="{{ $post->short_content }}" />
                            @error('short_content')
                                <p class="help-block text-danger">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="control-group mb-3">
                            <textarea class="form-control border-0 py-3 px-4  @error('content') is-invalid @enderror" rows="3" name="content"
                                placeholder="Content" name="content">{{ $post->content }}</textarea>
                            @error('content')
                                <p class="help-block text-danger">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="control-group mb-3">
                            <input type="file" class="form-control border-0  @error('photo') is-invalid @enderror""
                                name="photo" placeholder="Photo url" src="{{ $post->photo }}" />
                            @error('photo')
                                <p class="help-block text-danger">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="control-group mb-3">
                            <label for="tag_id">Taglar</label>
                            <select multiple class="form-control border-0 @error('title') is-invalid @enderror"
                                name="tags[]">
                                @foreach ($tags as $tag)
                                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <button class="btn btn-success py-3 px-4" type="submit">Saqlaw</button>
                            <a href="{{ route('posts.show', ['post' => $post->id]) }}"
                                class="btn btn-primary py-3 px-4">Biykar
                                etiw</a>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-5">
                <form class="mb-3" action="{{ route('posts.imageDestroy', ['post' => $post->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger py-3 px-4" type="submit">Fotonı óshiriw</button>
                </form>
                <img class="img-fluid w-100" src="{{ asset('storage/' . $post->photo) }}" alt="">
            </div>
        </div>
    </div>
</x-layouts.main>
