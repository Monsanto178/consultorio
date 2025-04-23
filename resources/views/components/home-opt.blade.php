@props([
    'btnUrl',
    'btnTitle',
    'btnClass',
    'portraitSrc'
])

<a href="{{ $btnUrl }}" class="{{ $btnClass }} option">
    <div class="home_portraits">
        <picture>
            <img src="{{ $portraitSrc }}" alt="{{ $btnClass }}">
        </picture>
    </div>
    <div class="option_button">
        <p>{{ $btnTitle }}</p>
    </div>
</a>

