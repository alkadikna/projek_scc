<section class="new-items">
    <h2>What's New!!</h2>
    <div class="carousel">
        <button class="prev"><</button>
        <div class="items">
            @foreach($data as $item)
                <a href="{{ route('detail', $item->id) }}">
                    <div class="item">
                        <h3>{{ $item->title }}</h3>
                        <!-- <p>Harga: {{ $item->price }}</p>
                        <p>Deskripsi: {{ $item->description }}</p>
                        <p>Kuantitas: {{ $item->quantity }}</p> -->
                        <img height="100" src="productimage/{{$item->image}}" alt="{{ $item->title }}">
                    </div>
                </a>
            @endforeach
        </div>
        <button class="next">></button>
    </div>
</section>
