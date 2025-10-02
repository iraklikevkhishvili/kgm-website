@extends('layouts.default')

@section('title')
    KGM | Our Spirits
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
            <h1>Our Spirits</h1>
            <h2>Crafting Spirits With Character</h2>
            <p>At KGM, our spirits are born from the same dedication and artistry that define our wines. Blending
                time-honored traditions with modern craftsmanship, we create distinctive chacha and other fine spirits that
                capture the essence of Georgia. Each bottle reflects purity, depth, and authenticity — a celebration of
                heritage elevated for today’s discerning tastes.</p>
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

            @if ($spirits->count())
                <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach ($spirits as $spirit)
                        <a href="{{ route('products.spirits.show', $spirit) }}"
                            class="block border rounded overflow-hidden hover:shadow">
                            <article>
                                @if ($spirit->image_path)
                                    <img src="{{ asset('storage/' . $spirit->image_path) }}" alt="{{ $spirit->name }}"
                                        class="w-full h-48 object-cover">
                                @endif
                                <div class="p-3">
                                    <h2 class="font-semibold">{{ $spirit->name }}</h2>
                                    <p class="text-sm text-gray-500">{{ $spirit->trademark }} • {{ $spirit->color }} •
                                        {{ $spirit->category }}</p>
                                </div>
                            </article>
                        </a>
                    @endforeach
                </div>

                <div class="mt-6">
                    {{ $spirits->links() }}
                </div>
            @else
                <p>No spirits found.</p>
            @endif
        </div>
    </section>
@endsection

@section('body-end')
    @vite (['resources/js/pages/wines.js'])
@endsection
