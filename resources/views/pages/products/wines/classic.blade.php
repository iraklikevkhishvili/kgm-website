@extends('layouts.default')

@section('title')
    KGM | Our Classic Wines
@endsection

@section('head-end')
    @vite (['resources/scss/pages/wines.scss'])
@endsection

@section('content')
    <section class="hero-section">
        <div class="hero-img-wrapper">
            <img src="https://kgmwines.com/wp-content/uploads/achievements-page-hero-image.webp" alt="">
        </div>
        <div class="hero-text-wrapper">
            <h1>Classic Wines</h1>
            <h2>Explore Our Collection of Handcrafted Wines</h2>
            <p>At KGM, each bottle tells a story rooted in tradition, terroir, and innovation. From bold reds to refined
                whites and distinctive amber wines, our collection reflects the rich diversity of Georgian winemaking.
                Carefully cultivated and expertly crafted, these wines embody our pursuit of excellence and our passion for
                sharing Georgia’s viticultural heritage with the world.</p>
        </div>
    </section>
    <section class="grid-section">
        <div class="container mx-auto px-4 py-8">
            <h1 class="text-3xl font-bold mb-6">Wines</h1>

            <form class="grid md:grid-cols-6 gap-3 mb-6">
                <input name="q" value="{{ $filters['q'] ?? '' }}" placeholder="Search…"
                    class="md:col-span-2 border p-2 rounded w-full" />
                <input name="trademark" value="{{ $filters['trademark'] ?? '' }}" placeholder="Trademark"
                    class="border p-2 rounded w-full" />
                <input name="color" value="{{ $filters['color'] ?? '' }}" placeholder="Color"
                    class="border p-2 rounded w-full" />
                <input name="category" value="{{ $filters['category'] ?? '' }}" placeholder="Category"
                    class="border p-2 rounded w-full" />
                <input name="making" value="{{ $filters['making'] ?? '' }}" placeholder="Making"
                    class="border p-2 rounded w-full" />
                <button class="bg-black text-white rounded px-4 py-2">Filter</button>
            </form>

            @if ($wines->count())
                <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach ($wines as $wine)
                        <a href="{{ route('products.wines.show', $wine) }}"
                            class="block border rounded overflow-hidden hover:shadow">
                            <article>
                                @if ($wine->image_path)
                                    <img src="{{ asset('storage/' . $wine->image_path) }}" alt="{{ $wine->name }}"
                                        class="w-full h-48 object-cover">
                                @endif
                                <div class="p-3">
                                    <h2 class="font-semibold">{{ $wine->name }}</h2>
                                    <p class="text-sm text-gray-500">{{ $wine->trademark }} • {{ $wine->color }} •
                                        {{ $wine->category }}</p>
                                </div>
                            </article>
                        </a>
                    @endforeach
                </div>

                <div class="mt-6">
                    {{ $wines->links() }}
                </div>
            @else
                <p>No wines found.</p>
            @endif
        </div>
    </section>
@endsection

@section('body-end')
    @vite (['resources/js/pages/wines.js'])
@endsection
