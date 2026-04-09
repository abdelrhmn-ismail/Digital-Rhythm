@props([
    'cards' => [
        [
            'icon' => 'fa-map-marker-alt',
            'title' => __('Location'),
            'copy' => __('Riyadh, Saudi Arabia') . "<br>" . __('King Fahd Road, 4th Floor'),
        ],
        [
            'icon' => 'fa-envelope',
            'title' => __('Email Access'),
            'copy' => '<a href="mailto:info@goldenbee.sa" class="contact-info__link">info@goldenbee.sa</a>',
        ],
        [
            'icon' => 'fa-phone',
            'title' => __('Direct Line'),
            'copy' => '<a href="tel:+966558781218" class="contact-info__link">+966 55 878 1218</a>',
        ],
    ],
])

<div class="contact-info" data-aos="fade-right">
    <h3>{{ __('Headquarters') }}</h3>
    <div class="contact-info__list">
        @foreach($cards as $card)
            <div class="contact-info__item">
                <div class="contact-info__icon">
                    <i class="fas {{ $card['icon'] }}"></i>
                </div>
                <div>
                    <p class="contact-info__label">{{ strtoupper($card['title']) }}</p>
                    <p class="contact-info__value">{!! $card['copy'] !!}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>
