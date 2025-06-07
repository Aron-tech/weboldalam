<header id="navbar" class="fixed top-0 left-0 w-full bg-white transition-all duration-300 border-b-2 border-gray-300 z-50">
    <div class="grid grid-cols-[1fr_5fr_1fr] items-center justify-items-center">
        <img src="{{ asset('images/logo.svg') }}" class="ml-auto size-24 scale-110" alt="">

        <x-navigation.destop-nav/>

        <div class="max-w-screen lg:hidden flex text-right ml-auto cursor-pointer" id="hamburger-icon">
            <svg xmlns="http://www.w3.org/2000/svg" class="hover:text-primary w-8 h-8 text-gray-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </div>
    </div>

    <x-navigation.mobile-nav/>
</header>
r
