<footer class="relative overflow-hidden border-t border-white/10 bg-[#050506]">
    <div class="pointer-events-none absolute inset-x-0 bottom-0 h-64 bg-[radial-gradient(circle_at_center,rgba(245,158,11,0.14),transparent_60%)]"></div>

    <div class="mx-auto max-w-7xl px-6 py-20">
        <div class="grid gap-12 lg:grid-cols-[1.5fr,1fr,1fr,1.2fr]">
            <div class="space-y-6">
                <img
                    src="https://goldenbee.sa/images/Golden-Bee--white-logo.png"
                    alt="Golden Bee"
                    class="h-12 w-auto object-contain"
                >
                <p class="max-w-md text-lg font-light leading-relaxed text-zinc-400">
                    A creative powerhouse specialized in high-performance digital architectures and global-scale brand transformations.
                </p>
            </div>

            <div>
                <h3 class="mb-6 text-xs font-black uppercase tracking-[0.35em] text-white/80">Services</h3>
                <ul class="space-y-4 text-zinc-400">
                    <li><a href="{{ route('services') }}" class="transition-colors hover:text-white">Digital Marketing</a></li>
                    <li><a href="{{ route('services') }}" class="transition-colors hover:text-white">Web Development</a></li>
                    <li><a href="{{ route('services') }}" class="transition-colors hover:text-white">Media Production</a></li>
                </ul>
            </div>

            <div>
                <h3 class="mb-6 text-xs font-black uppercase tracking-[0.35em] text-white/80">Agency</h3>
                <ul class="space-y-4 text-zinc-400">
                    <li><a href="{{ route('about') }}" class="transition-colors hover:text-white">About Us</a></li>
                    <li><a href="{{ route('portfolio') }}" class="transition-colors hover:text-white">Our Projects</a></li>
                    <li><a href="{{ route('contact') }}" class="transition-colors hover:text-white">Contact</a></li>
                </ul>
            </div>

            <div>
                <h3 class="mb-6 text-xs font-black uppercase tracking-[0.35em] text-white/80">Connect</h3>
                <ul class="space-y-4 text-zinc-400">
                    <li><span class="block text-[11px] font-black uppercase tracking-[0.24em] text-primary/70">Email</span><a href="mailto:info@goldenbee.sa" class="transition-colors hover:text-white">info@goldenbee.sa</a></li>
                    <li><span class="block text-[11px] font-black uppercase tracking-[0.24em] text-primary/70">Phone</span><a href="tel:+966558781218" class="transition-colors hover:text-white">+966 55 878 1218</a></li>
                    <li><span class="block text-[11px] font-black uppercase tracking-[0.24em] text-primary/70">Headquarters</span><span>Riyadh, Saudi Arabia</span></li>
                </ul>
            </div>
        </div>

        <div class="mt-16 flex flex-col gap-4 border-t border-white/10 pt-8 text-sm text-zinc-500 md:flex-row md:items-center md:justify-between">
            <p>&copy; {{ date('Y') }} Golden Bee Agency. All rights reserved.</p>
            <div class="flex gap-6">
                <a href="{{ route('privacy') }}" class="transition-colors hover:text-white">Privacy</a>
                <a href="{{ route('terms') }}" class="transition-colors hover:text-white">Terms</a>
            </div>
        </div>
    </div>
</footer>
