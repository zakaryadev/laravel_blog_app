<!-- Header Start -->
<div class="jumbotron jumbotron-fluid mb-5">
    <div class="container text-center py-5">
        <h1 class="text-white display-3">{{ $slot }}</h1>
        <div class="d-inline-flex align-items-center text-white">
            <p class="m-0"><a class="text-white" href="{{ route('main') }}">Bas bet</a></p>
            <i class="fa fa-circle px-3"></i>
            <p class="m-0">{{ $slot }}</p>
        </div>
    </div>
</div>
<!-- Header End -->
