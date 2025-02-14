<section id="about" class="bg-gray-900">
    <div class="container px-10 py-8 mx-auto">

        <h2 class="text-2xl font-semibold capitalize lg:text-4xl text-gray-200">
            About Us
        </h2>
        <article class="space-y-4 mt-4 text-base text-gray-400 lg:text-lg">
            <p>
                This is the actual project for the partial fulfilment of the requirements for the degree of
                Bachelor in Information Technology (BIT). This project is submitted to Department Information
                Technology, Central Campus of Technology, Dharan, Sunsari, Nepal. Our project is named Mero
                Khutruke.
            </p>
        </article>

        <h2 class="mt-6 text-2xl font-semibold text-gray-200 capitalize lg:text-3xl ">
            Our Team
        </h2>
        <div class="grid mt-8 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 ">
            <x-landing-team-card name="Darshan Shakya" title="Backend Developer"
                src="{{ asset('img/darshan..jpg') }}"></x-landing-team-card>
            <x-landing-team-card name="Sanjiv Rai" title="Frontend Developer"
                src="{{ asset('img/sanjiv.jpg') }}"></x-landing-team-card>
            <x-landing-team-card name="Santosh Rai" title="Fullstack Developer"
                src="{{ asset('img/santosh.jpg') }}"></x-landing-team-card>
        </div>
    </div>

</section>
