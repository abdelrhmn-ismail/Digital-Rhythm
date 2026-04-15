<section class="py-24 md:py-32 bg-white relative overflow-hidden">
    <!-- Background Effects -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[400px] bg-primary/5 blur-[160px] rounded-full"></div>
    </div>

    <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 md:gap-12" data-aos="fade-up">
            <!-- Stat 1: Years -->
            <div class="text-center group">
                <div class="mb-4 inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-primary/10 group-hover:bg-primary/20 transition-colors duration-500">
                    <span class="material-icons text-3xl text-primary">calendar_today</span>
                </div>
                <div class="text-5xl md:text-7xl font-black bg-clip-text text-transparent bg-gradient-to-r from-primary to-secondary mb-2 counter" data-target="7">
                    0+
                </div>
                <div class="text-xs md:text-sm font-bold uppercase tracking-[0.2em] text-gray-500 group-hover:text-gray-600 transition-colors">
                    {{ __('YEARS OF MASTERY') }}
                </div>
            </div>

            <!-- Stat 2: Projects -->
            <div class="text-center group">
                <div class="mb-4 inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-primary/10 group-hover:bg-primary/20 transition-colors duration-500">
                    <span class="material-icons text-3xl text-primary">work_outline</span>
                </div>
                <div class="text-5xl md:text-7xl font-black bg-clip-text text-transparent bg-gradient-to-r from-primary to-secondary mb-2 counter" data-target="50">
                    0+
                </div>
                <div class="text-xs md:text-sm font-bold uppercase tracking-[0.2em] text-gray-500 group-hover:text-gray-600 transition-colors">
                    {{ __('GLOBAL PROJECTS') }}
                </div>
            </div>

            <!-- Stat 3: Strategies -->
            <div class="text-center group">
                <div class="mb-4 inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-primary/10 group-hover:bg-primary/20 transition-colors duration-500">
                    <span class="material-icons text-3xl text-primary">trending_up</span>
                </div>
                <div class="text-5xl md:text-7xl font-black bg-clip-text text-transparent bg-gradient-to-r from-primary to-secondary mb-2 counter" data-target="150">
                    0+
                </div>
                <div class="text-xs md:text-sm font-bold uppercase tracking-[0.2em] text-gray-500 group-hover:text-gray-600 transition-colors">
                    {{ __('ELITE STRATEGIES') }}
                </div>
            </div>

            <!-- Stat 4: Success Rate -->
            <div class="text-center group">
                <div class="mb-4 inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-primary/10 group-hover:bg-primary/20 transition-colors duration-500">
                    <span class="material-icons text-3xl text-primary">emoji-events</span>
                </div>
                <div class="text-5xl md:text-7xl font-black bg-clip-text text-transparent bg-gradient-to-r from-primary to-secondary mb-2 counter" data-target="100" data-suffix="%">
                    0%
                </div>
                <div class="text-xs md:text-sm font-bold uppercase tracking-[0.2em] text-gray-500 group-hover:text-gray-600 transition-colors">
                    {{ __('SUCCESS RATE') }}
                </div>
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script>
// Counter Animation
document.addEventListener('DOMContentLoaded', () => {
    const counters = document.querySelectorAll('.counter');
    
    const observerOptions = {
        threshold: 0.5,
        rootMargin: '0px'
    };
    
    const animateCounter = (element) => {
        const target = parseInt(element.getAttribute('data-target'));
        const suffix = element.getAttribute('data-suffix') || '+';
        const duration = 2000; // 2 seconds
        const start = 0;
        const startTime = performance.now();
        
        const updateCounter = (currentTime) => {
            const elapsed = currentTime - startTime;
            const progress = Math.min(elapsed / duration, 1);
            
            // Easing function (ease-out)
            const easeOut = 1 - Math.pow(1 - progress, 3);
            const current = Math.floor(start + (target - start) * easeOut);
            
            element.textContent = current + suffix;
            
            if (progress < 1) {
                requestAnimationFrame(updateCounter);
            }
        };
        
        requestAnimationFrame(updateCounter);
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting && entry.intersectionRatio >= 0.5) {
                animateCounter(entry.target);
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);
    
    counters.forEach(counter => observer.observe(counter));
});
</script>
@endpush



