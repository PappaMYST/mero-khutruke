<section id="blogs" class="bg-white dark:bg-gray-900">
    <div class="container px-6 py-10 mx-auto">
        <div class="flex items-center justify-between">
            <h1 class="text-2xl font-semibold text-gray-800 capitalize lg:text-3xl dark:text-white">recent posts </h1>
        </div>

        <hr class="my-8 border-gray-200 dark:border-gray-700">

        <div class="grid grid-cols-1 gap-8 md:grid-cols-2 xl:grid-cols-3">
            <x-landing-blog-card src="{{ asset('img/tracking-expenses.jpg') }}"
                heading="The Benefits of Tracking Your Spending Habits"
                text="Managing money is an important aspect of our daily lives. In today's fast-paced world, it's easier than ever to lose track of our spending habits, leading to financial problems. One way to avoid this is by tracking our expenses. "
                author="Hubble Money" authorLink="https://www.myhubble.money/" date="March 10, 2024"
                blogLink="https://www.myhubble.money/blog/the-benefits-of-tracking-your-spending-habits#:~:text=Tracking%20your%20expenses%20gives%20you,that%20money%20for%20other%20things.">
            </x-landing-blog-card>
        </div>
    </div>
</section>
