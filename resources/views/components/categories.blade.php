<div class="mb-5">
    <h3 class="mb-4">Kategoriyalar</h3>
    <div class="bg-secondary" style="padding: 30px;">
        <ul class="list-inline m-0">
            @foreach ($categories as $category)
                <li class="mb-1 py-2 px-3 bg-light d-flex justify-content-between align-items-center">
                    <a class="text-dark" href="#"><i
                            class="fa fa-angle-right text-primary mr-2"></i>{{ $category->name }}</a>
                    <span class="badge badge-secondary badge-pill">{{ $category->posts->count() }}</span>
                </li>
            @endforeach
        </ul>
    </div>
</div>
