<header class="bg-gray-900">
    <nav x-data="{ isOpen: false }" class="px-4 py-4 shadow">
        <div class="lg:items-center lg:justify-between lg:flex">
            <div class="flex items-center justify-between">
                <a href="#" class="mx-auto ">
                    <img class="h-20" src="{{ @asset('img/mero-khutruke-transparent.PNG') }}" alt="">
                </a>

                <!-- Mobile menu button -->
                <div class="lg:hidden">
                    <button x-cloak @click="isOpen = !isOpen" type="button"
                        class="text-gray-500 dark:text-gray-200 hover:text-gray-600 dark:hover:text-gray-400 focus:outline-none focus:text-gray-600 dark:focus:text-gray-400"
                        aria-label="toggle menu">
                        <svg x-show="!isOpen" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 8h16M4 16h16" />
                        </svg>

                        <svg x-show="isOpen" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Mobile Menu open: "block", Menu closed: "hidden" -->
            <div x-cloak :class="[isOpen ? 'translate-x-0 opacity-100 ' : 'opacity-0 -translate-x-full']"
                class="absolute inset-x-0 z-20 w-full px-6 py-4 transition-all duration-300 ease-in-out bg-white shadow-md lg:bg-transparent lg:dark:bg-transparent lg:shadow-none dark:bg-gray-900 lg:mt-0 lg:p-0 lg:top-0 lg:relative lg:w-auto lg:opacity-100 lg:translate-x-0 lg:flex lg:items-center">
                <x-landing-nav-link url="/">Home</x-landing-nav-link>
                <x-landing-nav-link url="#about">About Us</x-landing-nav-link>
                <x-landing-nav-link url="#features">Features</x-landing-nav-link>
                <x-landing-nav-link url="#blogs">Blogs</x-landing-nav-link>
                <x-landing-nav-link url="#contactus">Contact Us</x-landing-nav-link>
                <x-landing-button-link url="/login" bgClass="bg-gray-200" textClass="text-gray-700"
                    hoverClass="hover:bg-gray-300" icon="arrow-right">
                    Get Started
                </x-landing-button-link>
            </div>
        </div>
    </nav>
</header>
