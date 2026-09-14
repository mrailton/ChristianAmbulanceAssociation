<header x-data="{ open: false }" class="relative z-20 border-b border-black/5 bg-white">
    <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-4 lg:px-8">
        <a href="{{ route('index') }}" class="shrink-0" aria-label="Christian Ambulance Association home">
            <img src="{{ asset('images/logo.png') }}" alt="Christian Ambulance Association" class="h-16 w-auto">
        </a>

        <button
            type="button"
            class="inline-flex items-center justify-center rounded-lg p-2 text-caa-forest transition hover:bg-caa-cream lg:hidden"
            @click="open = !open"
            :aria-expanded="open.toString()"
            aria-controls="primary-navigation"
            aria-label="Toggle navigation"
        >
            <svg x-show="!open" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <svg x-cloak x-show="open" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M6 6l12 12M18 6L6 18" />
            </svg>
        </button>

        <nav id="primary-navigation" class="absolute inset-x-0 top-full border-b border-black/5 bg-white px-6 py-5 shadow-lg lg:static lg:block lg:border-0 lg:bg-transparent lg:p-0 lg:shadow-none" :class="{ 'block': open, 'hidden': !open }">
            <div class="flex flex-col gap-5 text-sm font-semibold uppercase tracking-[0.14em] text-caa-ink lg:flex-row lg:items-center lg:gap-8">
                <a href="#about" @click="open = false" class="transition hover:text-caa-green">About us</a>
                <a href="#community" @click="open = false" class="transition hover:text-caa-green">Our community</a>
                <a href="#support" @click="open = false" class="transition hover:text-caa-green">Support us</a>
                <a href="#contact" @click="open = false" class="transition hover:text-caa-green">Contact</a>
                @auth()
                    <a href="{{ route('member.dashboard') }}" @click="open = false" class="transition hover:text-caa-green">Dashboard</a>
                    <form method="post" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="inline-flex items-center justify-center whitespace-nowrap rounded-full bg-caa-green px-5 py-3 text-center text-white transition hover:bg-caa-forest">Logout</button>
                    </form>
                @endauth
                @guest
                    <a href="{{ route('login') }}" class="{inline-flex items-center justify-center whitespace-nowrap rounded-full bg-caa-green px-5 py-3 text-center text-white transition hover:bg-caa-forest">Member login</a>
                @endguest
            </div>
        </nav>
    </div>
</header>
