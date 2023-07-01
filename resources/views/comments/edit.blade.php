<x-layouts.main>
    <x-slot:title>
        {{ $comment->body }}
    </x-slot:title>
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <h1 class="mb-4">Komment redaktorlaw</h1>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="contact-form bg-secondary" style="padding: 30px;">
                    <div id="success"></div>
                    <form action="{{ route('comments.update', ['comment' => $comment->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="post_id" value="{{ $comment->post_id }}" />
                        <div class="control-group mb-3">
                            <input type="text" name="body" placeholder="Komment" value="{{ $comment->body }}"
                                class="form-control border-0 p-4 @error('body') is-invalid @enderror" />
                            @error('body')
                                <p class="help-block text-danger">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div>
                            <button class="btn btn-primary py-3 px-4" type="submit">Jiberiw</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layouts.main>
