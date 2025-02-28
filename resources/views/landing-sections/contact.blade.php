<section id="contact" class="bg-gray-900 ">
    <div class="container px-6 py-8 mx-auto">
        <div class="lg:flex lg:items-center lg:-mx-6">
            <div class="lg:w-1/2 lg:mx-6">
                <h1 class="text-2xl font-semibold capitalize text-gray-100 lg:text-3xl">
                    Contact us for <br> more info
                </h1>

                <div class="mt-6 space-y-8 md:mt-8">
                    <p class="flex items-start -mx-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mx-2  text-blue-400" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>

                        <span class="mx-2 truncate w-72 text-gray-400">
                            Vijaypur Sadak, Dharan-14,
                            Sunsari, Nepal
                            Postal: 56700
                        </span>
                    </p>

                    <p class="flex items-start -mx-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mx-2 text-blue-400" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>

                        <span class="mx-2  truncate w-72 text-gray-400">(+977) 9807351144</span>
                    </p>

                    <p class="flex items-start -mx-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mx-2 text-blue-400" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>

                        <span class="mx-2 truncate w-72 text-gray-400">info@merokhutruke.com</span>
                    </p>
                </div>

                <div class="mt-6 w-80 md:mt-8">
                    <h3 class="text-gray-300 ">Follow us</h3>

                    <div class="flex mt-4 -mx-1.5 ">
                        <a target="_blank"
                            class="mx-1.5 hover:text-blue-400 text-gray-400 transition-colors duration-300 transform"
                            href="https://github.com/PappaMYST/mero-khutruke-v3.git">
                            <i class="fa-brands fa-github text-2xl"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="mt-8 lg:w-1/2 lg:mx-6">
                <div
                    class="w-full px-8 py-10 mx-auto overflow-hidden rounded-lg shadow-2xl bg-gray-900 lg:max-w-xl shadow-gray-300/50">
                    <h1 class="text-lg mb-2 font-medium text-gray-200">What do you want to ask</h1>
                    {{-- Display alert messages --}}
                    @if (session('success'))
                        <x-alert type="success" message="{{ session('success') }}"></x-alert>
                    @endif
                    @if (session('error'))
                        <x-alert type="error" message="{{ session('error') }}"></x-alert>
                    @endif
                    <form action="{{ route('contact.submitForm') }}" method="POST" class="mt-6">
                        @csrf
                        <div class="flex-1">
                            <label class="block mb-2 text-sm text-gray-200">Full Name</label>
                            <input type="text" placeholder="Your name here" name="name"
                                class="block w-full px-5 py-3 mt-2  border  rounded-md placeholder-gray-500 bg-gray-900 text-gray-300 border-gray-700 focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                        </div>

                        <div class="flex-1 mt-6">
                            <label class="block mb-2 text-sm text-gray-200">Email address</label>
                            <input type="email" placeholder="Your email here" name="email"
                                class="block w-full px-5 py-3 mt-2  border  rounded-md placeholder-gray-500 bg-gray-900 text-gray-300 border-gray-700 focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                        </div>

                        <div class="w-full mt-6">
                            <label class="block mb-2 text-sm text-gray-200">Message</label>
                            <textarea
                                class="block w-full px-5 py-3 mt-2  border  rounded-md placeholder-gray-500 bg-gray-900 text-gray-300 border-gray-700 focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40"
                                placeholder="Message" name="messageContent"></textarea>
                        </div>

                        <button
                            class="w-full px-6 py-3 mt-6 text-sm font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-500 rounded-md hover:bg-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-50">
                            get in touch
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
