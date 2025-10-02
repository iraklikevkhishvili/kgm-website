@extends('layouts.default')

@section('title', $spirit->name)

@section('head-end')
    @vite (['resources/scss/pages/wine.scss'])
@endsection

@section('content')
    <section class="hero-section">
        <div class="hero-img-wrapper">

        </div>
    </section>
    <div class="container mx-auto px-4 py-8">
        <a href="{{ route('products.spirits.index') }}" class="text-sm underline">&larr; All spirits</a>

        <div class="grid md:grid-cols-2 gap-8 mt-4">
            <div>
                @if ($spirit->image_path)
                    <img src="{{ asset('storage/' . $spirit->image_path) }}" alt="{{ $spirit->name }}" class="w-full rounded">
                @endif
            </div>

            <div>
                <h1 class="text-3xl font-bold mb-2">{{ $spirit->name }}</h1>
                <dl class="space-y-2 text-sm">
                    <div>
                        <dt class="font-medium inline">Trademark:</dt>
                        <dd class="inline">{{ $spirit->trademark }}</dd>
                    </div>
                    <div>
                        <dt class="font-medium inline">Colour:</dt>
                        <dd class="inline">{{ $spirit->color }}</dd>
                    </div>
                    <div>
                        <dt class="font-medium inline">Category:</dt>
                        <dd class="inline">{{ $spirit->category }}</dd>
                    </div>
                    <div>
                        <dt class="font-medium inline">Making:</dt>
                        <dd class="inline">{{ $spirit->making }}</dd>
                    </div>
                    <div>
                        <dt class="font-medium inline">Region:</dt>
                        <dd class="inline">{{ $spirit->region }}</dd>
                    </div>
                    <div>
                        <dt class="font-medium inline">Appellation:</dt>
                        <dd class="inline">{{ $spirit->appellation }}</dd>
                    </div>
                    <div>
                        <dt class="font-medium inline">Serving temperature:</dt>
                        <dd class="inline">{{ $spirit->serving_temperature }}</dd>
                    </div>
                    <div>
                        <dt class="font-medium inline">Food pairings:</dt>
                        <dd class="inline">{{ $spirit->food_pairings }}</dd>
                    </div>
                    <div>
                        <dt class="font-medium inline">Acidity:</dt>
                        <dd class="inline">{{ $spirit->acidity }}</dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>
@endsection

@section('body-end')
    @vite (['resources/js/pages/wine.js'])
@endsection
