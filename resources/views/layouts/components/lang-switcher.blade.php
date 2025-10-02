@php
    use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

    $current = app()->getLocale();
    $qs = request()->query();
    //$default = LaravelLocalization::getDefaultLocale();

    // Use package data first, fall back to our own labels
    $labelsFallback = [
        '/' => 'English',
        'ka' => 'Georgian',
        'ru' => 'Russian',
        'zh' => 'Chinese',
        'zh-CN' => 'Chinese',
    ];

    $supported = LaravelLocalization::getSupportedLocales(); // ['en'=>['native'=>'English'], ...]
    $labelFor = function (string $locale) use ($supported, $labelsFallback) {
        return $supported[$locale]['native'] ?? ($labelsFallback[$locale] ?? strtoupper($locale));
    };

    $currentLabel = $labelFor($current);
@endphp

<div class="language-switcher" x-cloak>
    <button class="language-toggle" type="button" aria-haspopup="listbox" aria-expanded="false" aria-label="Select Language"
        id="lang-toggle-btn">
        <span class="language-current-text">
            {{ $currentLabel }}
            <span class="language-arrow" aria-hidden="true">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-chevron-down-icon lucide-chevron-down">
                    <path d="m6 9 6 6 6-6"></path>
                </svg>
            </span>
        </span>
    </button>

    <ul class="language-dropdown" role="listbox" id="lang-list" hidden>
        @foreach ($supported as $code => $props)
            @continue($code === $current) {{-- hide current in the dropdown --}}
            <li role="option" aria-selected="false">
                <a href="{{ LaravelLocalization::getLocalizedURL($code, null, $qs, true) }}">
                    {{ $labelFor($code) }}
                </a>
            </li>
        @endforeach
    </ul>
</div>
