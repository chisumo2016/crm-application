<div class="py-12 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div>
            @if($selectedPlan)
                selected:  {{ $selectedPlan->id }}   {{ $selectedPlan->name }}
            @endif
        </div>
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
                            <a
                                wire:click="selectPlan('{{ $plan->id }}')"
                                class="block w-full
                                text-center bg-indigo-500
                                hover:bg-indigo-600 text-white
                                font-semibold py-2 px-4 rounded-md">Choosse Plan</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
