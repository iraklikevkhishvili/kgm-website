@extends('layouts.default')

@section('title', $wine->name)

@section('head-end')
    @vite(['resources/scss/pages/single-wine.scss'])
@endsection

@section('content')
    <!-- HERO SECTION -->
    <section class="hero-section">
        <h1 class="sr-only">Premium Georgian Wine {{ $wine->name }}</h1>

        <div class="title-wrapper-mobile">
            <h4 class="line-name">{{ $wine->trademark }}</h4>
            <h2 class="product-title">{{ $wine->name }}</h2>
        </div>

        <div class="short-info">
            <div class="product-image-wrapper" data-slider role="region" aria-label="Product image gallery">
                @php
                    $hero = $wine->getFirstMedia('hero');
                    $galleryItems = $wine->getMedia('gallery');
                    $totalImages = ($hero ? 1 : 0) + $galleryItems->count();
                @endphp

                @if ($hero)
                    <img src="{{ $hero->hasGeneratedConversion('web') ? $hero->getUrl('web') : $hero->getUrl() }}"
                        @if (method_exists($hero, 'getSrcset')) srcset="{{ $hero->hasGeneratedConversion('web') ? $hero->getSrcset('web') : '' }}"
            sizes="(min-width: 768px) 50vw, 100vw" @endif
                        alt="{{ $wine->name }} — hero" loading="eager" decoding="async" class="product-image active">
                @endif

                @foreach ($galleryItems as $media)
                    <img src="{{ $media->hasGeneratedConversion('web') ? $media->getUrl('web') : $media->getUrl() }}"
                        @if (method_exists($media, 'getSrcset')) srcset="{{ $media->hasGeneratedConversion('web') ? $media->getSrcset('web') : '' }}"
            sizes="(min-width: 768px) 25vw, 50vw" @endif
                        alt="{{ $wine->name }} — gallery {{ $loop->iteration }}" loading="lazy" decoding="async"
                        class="product-image">
                @endforeach
                @if ($totalImages > 1)
                    <button type="button" class="image-button" id="prev" aria-label="Previous image">
                        <span aria-hidden="true" class="image-button-icon">
                            <svg class="image-button-svg" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round"
                                class="lucide lucide-chevron-down-icon lucide-chevron-down">
                                <path d="m6 9 6 6 6-6"></path>
                            </svg>
                        </span>
                    </button>
                    <button type="button" class="image-button" id="next" aria-label="Next image">
                        <span aria-hidden="true" class="image-button-icon">
                            <svg class="image-button-svg" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round"
                                class="lucide lucide-chevron-down-icon lucide-chevron-down">
                                <path d="m6 9 6 6 6-6"></path>
                            </svg>
                        </span>
                    </button>
                @endif
            </div>

            <div>
                <div class="title-wrapper-desktop">
                    <h4 class="line-name">{{ $wine->trademark }}</h4>
                    <h2 class="product-title">{{ $wine->name }}</h2>
                </div>
                <ul class="hero-info-list">
                    <!-- COLOR -->
                    <li class="hero-info-item">
                        <div class="hero-info-label-wrapper">
                            <strong class="hero-info-label">Colour</strong>
                        </div>
                        <div class="hero-info-value-wrapper">
                            <p class="hero-info-value">{{ $wine->color }}</p>
                        </div>
                    </li>

                    <!-- SWEETNESS / CATEGORY -->
                    <li class="hero-info-item">
                        <div class="hero-info-label-wrapper">
                            <strong class="hero-info-label">Sweetness:</strong>
                        </div>
                        <div class="hero-info-value-wrapper">
                            <p class="hero-info-value">{{ $wine->category }}</p>
                        </div>
                    </li>

                    <!-- GRAPE VARIETY -->
                    <li class="hero-info-item">
                        <div class="hero-info-label-wrapper">
                            <strong class="hero-info-label">Grape Variety:</strong>
                        </div>
                        <div class="hero-info-value-wrapper">
                            <p class="hero-info-value">
                                @php
                                    $grapes = is_array($wine->grape_variety)
                                        ? $wine->grape_variety
                                        : preg_split(
                                            '/[,;]\s*/',
                                            (string) $wine->grape_variety,
                                            -1,
                                            PREG_SPLIT_NO_EMPTY,
                                        );
                                @endphp
                                {{ collect($grapes)->filter()->join(', ') ?: '—' }}
                            </p>
                        </div>
                    </li>

                    <!-- VINIFICATION -->
                    <li class="hero-info-item">
                        <div class="hero-info-label-wrapper">
                            <strong class="hero-info-label">Vinification:</strong>
                        </div>
                        <div class="hero-info-value-wrapper">
                            <p class="hero-info-value">{{ $wine->making }}</p>
                        </div>
                    </li>

                    <!-- REGION -->
                    <li class="hero-info-item">
                        <div class="hero-info-label-wrapper">
                            <strong class="hero-info-label">Region:</strong>
                        </div>
                        <div class="hero-info-value-wrapper">
                            <p class="hero-info-value">{{ $wine->region }}</p>
                        </div>
                    </li>

                    <!-- APPELLATION -->
                    <li class="hero-info-item">
                        <div class="hero-info-label-wrapper">
                            <strong class="hero-info-label">Region of Appellation:</strong>
                        </div>
                        <div class="hero-info-value-wrapper">
                            <p class="hero-info-value">{{ $wine->appellation }}</p>
                        </div>
                    </li>

                    <!-- ALCOHOL CONTENT -->
                    <li class="hero-info-item">
                        <div class="hero-info-label-wrapper">
                            <strong class="hero-info-label">Alcohol Content:</strong>
                        </div>
                        <div class="hero-info-value-wrapper">
                            <p class="hero-info-value">
                                @if ($wine->abv !== null && $wine->abv !== '')
                                    {{ number_format((float) $wine->abv, 2) }} %
                                @else
                                    —
                                @endif
                            </p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <!-- TECHNICAL INFO SECTION -->
    <section class="technical-info-section">
        <div class="tech-info-wrapper">
            <div class="tech-info-inner">
                <div class="tech-info-track">
                    <!-- Enjoyment -->
                    <div class="tech-info-card active">
                        <h4 class="tech-info-title">Enjoyment</h4>
                        <ul class="tech-info-list">
                            @if (!empty($wine->serving_temperature))
                                <li class="tech-info-item">
                                    <strong class="tech-info-label">Serving Temperature:</strong>
                                    <p class="tech-info-value">{{ $wine->serving_temperature }}°C</p>
                                </li>
                            @endif
                            @if (!empty($wine->food_pairings))
                                @php
                                    $pairs = is_array($wine->food_pairings)
                                        ? $wine->food_pairings
                                        : preg_split(
                                            '/[,;]\s*/',
                                            (string) $wine->food_pairings,
                                            -1,
                                            PREG_SPLIT_NO_EMPTY,
                                        );
                                @endphp
                                <li class="tech-info-item">
                                    <strong class="tech-info-label">Food Pairings:</strong>
                                    <p class="tech-info-value">{{ collect($pairs)->filter()->join(', ') }}</p>
                                </li>
                            @endif
                        </ul>
                    </div>

                    <!-- Packaging -->
                    <div class="tech-info-card">
                        <h4 class="tech-info-title">Packaging</h4>
                        <ul class="tech-info-list">
                            @if (!empty($wine->closure))
                                <li class="tech-info-item">
                                    <strong class="tech-info-label">Bottle Closure:</strong>
                                    <p class="tech-info-value">{{ $wine->closure }}</p>
                                </li>
                            @endif
                            @if (!empty($wine->volume))
                                <li class="tech-info-item">
                                    <strong class="tech-info-label">Bottle Volume:</strong>
                                    <p class="tech-info-value">{{ $wine->volume }} mL</p>
                                </li>
                            @endif
                        </ul>
                    </div>

                    <!-- Technical -->
                    <div class="tech-info-card">
                        <h4 class="tech-info-title">Technical</h4>
                        <ul class="tech-info-list">
                            @if (!empty($wine->acidity))
                                <li class="tech-info-item">
                                    <strong class="tech-info-label">Acidity:</strong>
                                    <p class="tech-info-value">{{ $wine->acidity }}</p>
                                </li>
                            @endif
                            @if (!empty($wine->tannins))
                                <li class="tech-info-item">
                                    <strong class="tech-info-label">Tannins:</strong>
                                    <p class="tech-info-value">{{ $wine->tannins }}</p>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>

                <div class="tech-buttopn-wrapper">
                    <button type="button" class="tech-info-button" id="card-prev" aria-label="Previous card">
                        <span aria-hidden="true" class="tech-info-button-icon">
                            <svg class="tech-info-button-svg" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="m6 15 6-6 6 6"></path>
                            </svg>
                        </span>
                    </button>
                    <button type="button" class="tech-info-button" id="card-next" aria-label="Next card">
                        <span aria-hidden="true" class="tech-info-button-icon">
                            <svg class="tech-info-button-svg" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="m6 9 6 6 6-6"></path>
                            </svg>
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- TASTING NOTES SECTION -->
    @if ($wine->visual || $wine->aroma || $wine->taste)
        <section class="tasting-notes-section">
            <h2 class="tasting-notes-heading">tasting notes</h2>

            {{-- Uncomment when you add a file path in DB --}}
            {{-- @if ($wine->description_pdf)
                <div class="download-button-wrapper">
                    <div class="download-button">
                        <a href="{{ asset($wine->description_pdf) }}" target="_blank" rel="noopener noreferrer">
                            download description
                            <span class="download-icon-wrapper">
                                <svg aria-hidden="true" class="download-icon" viewBox="0 0 320 512" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M313.553 392.331L209.587 504.334c-9.485 10.214-25.676 10.229-35.174 0L70.438 392.331C56.232 377.031 67.062 352 88.025 352H152V80H68.024a11.996 11.996 0 0 1-8.485-3.515l-56-56C-4.021 12.926 1.333 0 12.024 0H208c13.255 0 24 10.745 24 24v328h63.966c20.878 0 31.851 24.969 17.587 40.331z"/>
                                </svg>
                            </span>
                        </a>
                    </div>
                </div>
            @endif --}}

            <div class="tasting-notes-wrapper">
                <div class="tasting-notes">
                    <div class="tasting-notes-image-wrapper">
                        <img class="tasting-notes-image"
                            src="https://kgmwines.com/wp-content/uploads/elegant-wine-spill-stockcake.jpg" alt="">
                        <h2 class="tasting-notes-title">eye</h2>
                    </div>
                    <div class="tasting-notes-text-wrapper active">
                        {{ $wine->visual ?: '—' }}
                    </div>
                </div>

                <div class="tasting-notes">
                    <div class="tasting-notes-image-wrapper">
                        <img class="tasting-notes-image" src="https://kgmwines.com/wp-content/uploads/download.jpeg"
                            alt="">
                        <h2 class="tasting-notes-title">nose</h2>
                    </div>
                    <div class="tasting-notes-text-wrapper">
                        {{ $wine->aroma ?: '—' }}
                    </div>
                </div>

                <div class="tasting-notes">
                    <div class="tasting-notes-image-wrapper">
                        <img class="tasting-notes-image"
                            src="https://kgmwines.com/wp-content/uploads/2CC5VCOI25B5NCUJ6KSDXFUZEA.avif" alt="">
                        <h2 class="tasting-notes-title">palate</h2>
                    </div>
                    <div class="tasting-notes-text-wrapper">
                        {{ $wine->taste ?: '—' }}
                    </div>
                </div>
            </div>
        </section>
    @endif

    <!-- IMAGE + FACTS (kept from your Tailwind block) -->
    <section class="hero-section">
        <div class="hero-img-wrapper"></div>
    </section>

    <div class="container mx-auto px-4 py-8">
        <a href="{{ route('products.wines.index') }}" class="text-sm underline">&larr; All wines</a>

        <div class="grid md:grid-cols-2 gap-8 mt-4">
            <div>
                @if ($wine->image_path)
                    <img src="{{ asset('storage/' . ltrim($wine->image_path, '/')) }}" alt="{{ $wine->name }}"
                        class="w-full rounded" loading="lazy">
                @endif
            </div>

            <div>
                <h1 class="text-3xl font-bold mb-2">{{ $wine->name }}</h1>
                <dl class="space-y-2 text-sm">
                    <div>
                        <dt class="font-medium inline">Trademark:</dt>
                        <dd class="inline">{{ $wine->trademark }}</dd>
                    </div>
                    <div>
                        <dt class="font-medium inline">Colour:</dt>
                        <dd class="inline">{{ $wine->color }}</dd>
                    </div>
                    <div>
                        <dt class="font-medium inline">Category:</dt>
                        <dd class="inline">{{ $wine->category }}</dd>
                    </div>
                    <div>
                        <dt class="font-medium inline">Making:</dt>
                        <dd class="inline">{{ $wine->making }}</dd>
                    </div>
                    <div>
                        <dt class="font-medium inline">Region:</dt>
                        <dd class="inline">{{ $wine->region }}</dd>
                    </div>
                    <div>
                        <dt class="font-medium inline">Appellation:</dt>
                        <dd class="inline">{{ $wine->appellation }}</dd>
                    </div>
                    <div>
                        <dt class="font-medium inline">Serving temperature:</dt>
                        <dd class="inline">{{ $wine->serving_temperature }}</dd>
                    </div>
                    <div>
                        <dt class="font-medium inline">Food pairings:</dt>
                        <dd class="inline">
                            @php
                                $pairs2 = is_array($wine->food_pairings)
                                    ? $wine->food_pairings
                                    : preg_split('/[,;]\s*/', (string) $wine->food_pairings, -1, PREG_SPLIT_NO_EMPTY);
                            @endphp
                            {{ collect($pairs2)->filter()->join(', ') }}
                        </dd>
                    </div>
                    <div>
                        <dt class="font-medium inline">Acidity:</dt>
                        <dd class="inline">{{ $wine->acidity }}</dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>
@endsection

@section('body-end')
    @vite(['resources/js/pages/single-wine.js'])
@endsection
