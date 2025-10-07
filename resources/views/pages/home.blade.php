@extends('layouts.default')

@section('title')
    KGM | Premium Wines and Spirits
@endsection

@section('head-end')
    @vite (['resources/scss/pages/home.scss'])
@endsection

@section('content')
    @if ($admin = 1)
        <section>
            logged in
        </section>
    @endif


    <section class="hero-section">
        <div class="container-scroll-grow">
            <div class="hero-video-wrapper">
                <video src="/static/media/videos/home-video.webm" class="hero-video" autoplay muted loop></video>
                <div class="hero-text-wrapper">
                    <h3>honour our past</h2>
                        <h2>enrich the present</h2>
                        <h3>inspire the future</h2>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('body-end')
    @vite (['resources/js/pages/home.js'])
@endsection
