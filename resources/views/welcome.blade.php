<x-guest-layout>
    <div class="container mx-auto px-4 py-16">
        <div class="py-20 px-4 sm:px-6 lg:px-8 flex items-center justify-center">
            <div class="max-w-7xl mx-auto flex flex-col lg:flex-row items-center">
                <!-- Image Section -->
                <div class="lg:w-1/2 mb-8 lg:mb-0">
                    <img src="/images/undraw_visual_data_re_mxxo.svg" alt="CRM Image" class="w-full rounded-lg shadow-lg">
                </div>
                <!-- Content Section -->
                <div class="lg:w-1/2 lg:ml-8">
                    <h1 class="text-4xl font-bold text-gray-900 mb-4 sm:text-5xl sm:tracking-tight lg:text-6xl">Welcome to Our CRM Platform</h1>
                    <p class="text-lg text-gray-700 mb-8 sm:mt-6 sm:text-xl">Empower your business with powerful customer management tools</p>
                    <div class="space-x-4">
                        <a href="#" class="inline-block bg-indigo-500 py-3 px-8 text-white font-semibold rounded-lg shadow-md hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-900">Get Started</a>
                        <a href="#" class="inline-block bg-gray-800 py-3 px-8 text-white font-semibold rounded-lg shadow-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-800 focus:ring-offset-2 focus:ring-offset-gray-900">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:text-center">
                <h2 class="text-base text-indigo-600 font-semibold tracking-wide uppercase">Plans & Pricing</h2>
                <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                    Flexible Pricing to Fit Your Needs
                </p>
                <p class="mt-4 max-w-2xl text-xl text-gray-500 lg:mx-auto">
                    Choose a plan that works best for your business. All plans come with a trial period.
                </p>
            </div>

            <div class="mt-10">
                <div class="flex flex-col md:flex-row justify-center items-center md:justify-between">
                    @foreach ($plans as $plan)
                        <div class="bg-white rounded-lg shadow-lg overflow-hidden mx-2 mb-4 md:w-1/3 lg:w-1/4">
                            <div class="px-6 py-8">
                                <h3 class="text-2xl font-bold text-gray-800">{{ $plan->name }}</h3>
                                <p class="mt-4 text-gray-600">{{ $plan->description }}</p>
                                <div class="mt-6">
                                    <p class="text-4xl font-semibold text-gray-800">${{ $plan->price }}</p>
                                    <p class="text-gray-600">{{ $plan->interval }} days</p>
                                </div>
                            </div>
                            <div class="bg-gray-100 px-6 py-4">
                                <a href="#" class="block w-full text-center bg-indigo-500 hover:bg-indigo-600 text-white font-semibold py-2 px-4 rounded-md">Get Started</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</x-guest-layout>
