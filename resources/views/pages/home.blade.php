@extends('layouts.default')

@section('title')
    KGM | Premium Wines and Spirits
@endsection

@section('head-end')
    @vite (['resources/scss/pages/home.scss'])
@endsection

@section('content')
    <section class="hero-section">
        <div class="hero-img-wrapper">
            <img src="https://kgmwines.com/wp-content/uploads/achievements-page-hero-image.webp" alt="">
        </div>
        <div class="hero-text-wrapper">
            <h1>Our Wines</h1>
            <h2>Explore Our Collection of Handcrafted Wines</h2>
            <p>At KGM, each bottle tells a story rooted in tradition, terroir, and innovation. From bold reds to refined
                whites and distinctive amber wines, our collection reflects the rich diversity of Georgian winemaking.
                Carefully cultivated and expertly crafted, these wines embody our pursuit of excellence and our passion for
                sharing Georgia’s viticultural heritage with the world.</p>
        </div>
    </section>
    <section class="hero-section">
        <div class="hero-img-wrapper">
            <img src="{{ asset('static/media/images/kgm-kisi.webp') }}" alt="">
        </div>
    </section>
@endsection

@section('body-end')
    @vite (['resources/js/pages/home.js'])
@endsection
