@extends('layouts.default')
@section('title')
    KGM | About Us
@endsection

@section('head-end')
    @vite (['resources/scss/pages/about.scss'])
@endsection

@section(section: 'content')
    @php($content = $page->content ?? [])
    <section class="hero-section">
        <div class="hero-img-wrapper">
            <img src="https://kgmwines.com/wp-content/uploads/Our-Vineyards-Grgich-Hills-Estate-Best-Vineyards-in-Napa.jpg"
                alt="">
        </div>
        <div class="hero-text-wrapper">
            <h1>about us</h1>
            <h2>Honoring Georgia’s winemaking heritage while embracing the future</h2>
            <p>KGM is a family-owned winery dedicated to honoring Georgia’s ancient winemaking traditions. We craft our
                wines with respect for the land and a passion for authentic storytelling. Every bottle reflects our
                commitment to quality, heritage, and innovation.</p>
        </div>
    </section>
    <section class="section-2"></section>
@endsection


@section('body-end')
    @vite (['resources/scss/pages/about.js'])
@endsection
