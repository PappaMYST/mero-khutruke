<section id="about" class="bg-white dark:bg-gray-900">
    <div class="container px-6 py-8 mx-auto">

        <h2 class="text-2xl font-semibold text-center text-gray-800 capitalize lg:text-4xl dark:text-gray-200">
            About Us
        </h2>
        <article class="space-y-4 mt-4 text-base text-gray-500 dark:text-gray-400 lg:text-lg">
            <p>
                This is the actual project for the partial fulfilment of the requirements for the degree of
                Bachelor in Information Technology (BIT). This project is submitted to Department Information
                Technology, Central Campus of Technology, Dharan, Sunsari, Nepal. Our project is named Mero
                Khutruke.
            </p>
        </article>
        {{-- <div class="mt-8 grid grid-cols-1 gap-8 lg:grid-cols-2 lg:gap-16">
            <div class="relative h-64 overflow-hidden sm:h-80 lg:h-full">
                <img alt=""
                    src="https://images.unsplash.com/photo-1496843916299-590492c751f4?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1771&q=80"
                    class="absolute inset-0 h-full w-full object-cover" />
            </div>

            <div class="lg:px-10 lg:py-8">
                <article class="space-y-4 mt-4 text-base text-gray-500 dark:text-gray-400 lg:text-lg">
                    <p>
                        This is the actual project for the partial fulfilment of the requirements for the degree of
                        Bachelor in Information Technology (BIT). This project is submitted to Department Information
                        Technology, Central Campus of Technology, Dharan, Sunsari, Nepal. Our project is named Mero
                        Khutruke.
                    </p>
                </article>
            </div>
        </div> --}}

        <h2 class="text-2xl font-semibold text-center text-gray-800 capitalize lg:text-3xl dark:text-white">
            Our Team
        </h2>
        <div class="grid mt-8 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 ">
            <x-landing-team-card name="Darshan Shakya" title="Frontend Developer"
                src="{{ asset('img/darshan..jpg') }}"></x-landing-team-card>
            <x-landing-team-card name="Sanjiv Rai" title="Frontend Developer"
                src="{{ asset('img/sanjiv.jpg') }}"></x-landing-team-card>
            <x-landing-team-card name="Santosh Rai" title="Fullstack Developer"
                src="{{ asset('img/santosh.jpg') }}"></x-landing-team-card>
        </div>
    </div>

</section>
