@props(['solutions' => []])

<section class="goldenbee-section">
    <div class="goldenbee-shell">
        <div class="goldenbee-section-heading">
            <p class="goldenbee-pill" data-aos="fade-up">Our Solutions</p>
            <h2 data-aos="fade-up" data-aos-delay="80">We Engineer <span>Global Impact</span></h2>
            <p data-aos="fade-up" data-aos-delay="140">
                Bespoke strategic frameworks designed to propel your brand from local presence to global dominance with surgical precision.
            </p>
        </div>

        <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-4">
            @foreach ($solutions as $solution)
                <a href="{{ $solution['href'] }}" class="goldenbee-card goldenbee-card--solution" data-aos="fade-up" data-aos-delay="{{ $loop->index * 70 }}">
                    <span class="goldenbee-card__number">{{ $solution['number'] }}</span>
                    <h3>{{ $solution['title'] }}</h3>
                    <p>{{ $solution['description'] }}</p>
                    <span class="goldenbee-card__cta">Discover More</span>
                </a>
            @endforeach
        </div>

        <div class="mt-12 text-center" data-aos="fade-up">
            <a href="{{ route('services') }}" class="goldenbee-button goldenbee-button--ghost">
                Explore All Architectures
            </a>
        </div>
    </div>
</section>
