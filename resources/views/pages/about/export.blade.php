@extends('layouts.default')

@section('title')
    KGM | Exports
@endsection

@section('head-end')
    @vite (['resources/scss/pages/wine.scss'])
@endsection

@section('content')
    <section class="hero-section">
        <div class="hero-img-wrapper">
            <img src="https://kgmwines.com/wp-content/uploads/achievements-page-hero-image.webp" alt="">
        </div>
    </section>
@endsection

@section('body-end')
    @vite (['resources/js/pages/wine.js'])
@endsection
