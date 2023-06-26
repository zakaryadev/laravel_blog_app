<x-layouts.main>
    <x-slot:title>
        Post jaratıw
    </x-slot:title>
    <x-slot:style>
        <style>
            .form-control {
                border-radius: 0;
            }
        </style>
    </x-slot:style>
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <h1 class="mb-4">Post jaratıw</h1>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="contact-form bg-secondary" style="padding: 30px;">
                    <div id="success"></div>
                    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="user_id" value="{{ 1 }}">

                        <div class="control-group mb-3">
                            <select class="form-control border-0 @error('category_id') is-invalid @enderror"
                                name="category_id">
                                <option class="form-control border-0 p-4" selected>Kategoriya</option>
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
                            <input type="text" name="title" placeholder="Tema" value="{{ old('title') }}"
                                class="form-control border-0 p-4 @error('title') is-invalid @enderror" />
                            @error('title')
                                <p class="help-block text-danger">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="control-group mb-3">
                            <input type="text" value="{{ old('short_content') }}"name="short_content"
                                placeholder="Qısqasha mazmunı"
                                class="form-control border-0 p-4 @error('short_content') is-invalid @enderror" />
                            @error('short_content')
                                <p class="help-block text-danger">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="control-group mb-3">
                            <textarea rows="3" name="content" placeholder="Maqala"
                                class="form-control border-0 py-3 px-4 @error('content') is-invalid @enderror">{{ old('content') }}</textarea>
                            @error('content')
                                <p class="help-block text-danger">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="control-group mb-3">
                            <label for="photo">Foto</label>
                            <input type="file" value="{{ old('photo') }}" name="photo"
                                placeholder="Fotoǵa silteme" class="form-control border-0" />
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
                            <button class="btn btn-primary py-3 px-4" type="submit">Post jaratiw</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layouts.main>
