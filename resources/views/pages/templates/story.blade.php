@extends('layouts.default')
@section('title')
    {{ data_get($page->meta, 'meta-title') }}
@endsection

@section('head-end')
    @vite (['resources/scss/pages/about.scss'])
@endsection

@section(section: 'content')
    @php($content = $page->content ?? [])
    <section class="hero-section">
        <div class="hero-img-wrapper">
            <img src="{{ data_get($content, 'hero-image') }}" alt="">
        </div>
        <div class="hero-text-wrapper">
            <h1>{{ data_get($page->content, 'hero-title') }}</h1>
            <h2>{{ data_get($page->content, 'hero-subtitle') }}</h2>
            <p>{{ data_get($page->content, 'hero-paragraph') }}</p>
        </div>
    </section>
    <section class="section-2"></section>
@endsection


@section('body-end')
@endsection
