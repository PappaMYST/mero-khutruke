<section id="blogs" class="bg-gray-900">
    <div class="container px-10 py-8 mx-auto">
        <div class="flex items-center justify-between">
            <h1 class="text-2xl font-semibold capitalize lg:text-3xl text-gray-100">interesting posts </h1>
        </div>

        <hr class="my-8 border-gray-700">

        <div class="grid grid-cols-1 gap-8 md:grid-cols-2 xl:grid-cols-3">
            <x-landing-blog-card src="{{ asset('img/tracking-expenses.jpg') }}"
                heading="The Benefits of Tracking Your Spending Habits"
                text="Managing money is an important aspect of our daily lives. In today's fast-paced world, it's easier than ever to lose track of our spending habits, leading to financial problems. One way to avoid this is by tracking our expenses. "
                author="Hubble Money" authorLink="https://www.myhubble.money/" date="March 10, 2024"
                blogLink="https://www.myhubble.money/blog/the-benefits-of-tracking-your-spending-habits#:~:text=Tracking%20your%20expenses%20gives%20you,that%20money%20for%20other%20things.">
            </x-landing-blog-card>
            
            <x-landing-blog-card src="{{ asset('images/tracking-expenses.jpg') }}"
                heading="The Benefits Of Expense Tracking And How You Can Do It Effectively"
                text="Managing your money effectively is a cornerstone of financial health. This article explores key reasons expense tracking is crucial for personal finance, from enhancing financial control to reducing stress, and provides actionable tips on how to do it effectively."
                author="Forbes" authorLink="https://www.forbes.com/" date="January 15, 2025"
                blogLink="https://www.forbes.com/sites/truetamplin/2025/01/15/the-benefits-of-expense-tracking-and-how-you-can-do-it-effectively/">
            </x-landing-blog-card>

            <x-landing-blog-card src="{{ asset('images/tracking-expenses.jpg') }}"
                heading="11 Reasons You Need a Daily Expense Manager"
                text="If you are not using an expense tracker, you are missing out on the ability to manage your finances wisely and effortlessly.On the other hand, if you use a money manager app, you will be aware when and why you are spending money and how much you spend."
                author="Money View" authorLink="https://www.moneyview.in/" date="2024"
                blogLink="https://moneyview.in/beginners-guide-managing-money/11-reasons-need-daily-expense-manager">
            </x-landing-blog-card>
        </div>

    </div>
</section>
