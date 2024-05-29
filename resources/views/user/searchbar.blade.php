<div class="search-bar mt-3" style="width: 50%; margin: 0 auto;">
    <form action="{{ isset($category) ? url('category/' . $category . '/search') : url('search') }}" method="get">
        <div class="input-group mb-3">
            @csrf
            <input type="text" class="form-control" placeholder="Search..." name="search">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit">Search</button>
            </div>
        </div>
    </form>
</div>
