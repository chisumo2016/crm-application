<div>
    <x-dialog-modal wire:model="showForm">
        <x-slot name="title"></x-slot>

        <x-slot name="content">
            <div class="container mx-auto py-8">
                <div x-data="{ step: 1 }">
                    <!-- Step 1: Plans/Pricing -->
                    <div x-show="step === 1">
                        <h2 class="text-2xl font-semibold mb-4">Step 1: Choose a Plan</h2>
                        <div class="mb-4">
                            <label for="plan" class="block mb-2">Select a Plan:</label>
{{--                            <select id="plan" class="border rounded-md px-4 py-2 w-full mb-4">--}}
{{--                                <option value="" disabled selected>Select a Plan</option>--}}
{{--                                <option value="basic">Basic Plan</option>--}}
{{--                                <option value="standard">Standard Plan</option>--}}
{{--                                <option value="premium">Premium Plan</option>--}}
{{--                            </select>--}}
                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                                <!-- Plan 1 -->
                                <div class="bg-white rounded-lg shadow-md p-6">
                                    <div class="text-xl font-semibold mb-2">Basic Plan</div>
                                    <div class="text-gray-600 mb-4">$10/month</div>
                                    <label for="plan3" class="flex items-center">
                                        <input type="radio" id="plan3" class="form-radio text-blue-500" name="plan" value="Basic Plan">
                                        <span class="ml-2">Select</span>
                                    </label>
                                </div>
                                <!-- Plan 2 -->
                                <div class="bg-white rounded-lg shadow-md p-6">
                                    <div class="text-xl font-semibold mb-2">Standard Plan</div>
                                    <div class="text-gray-600 mb-4">$20/month</div>
                                    <label for="plan1" class="flex items-center">
                                        <input type="radio" id="plan1" class="form-radio text-blue-500" name="plan" value="Standard Plan">
                                        <span class="ml-2">Select</span>
                                    </label>
                                </div>
                                <!-- Plan 3 -->
                                <div class="bg-white rounded-lg shadow-md p-6">
                                    <div class="text-xl font-semibold mb-2">Premium Plan</div>
                                    <div class="text-gray-600 mb-4">$30/month</div>
                                    <label for="plan2" class="flex items-center">
                                        <input type="radio" id="plan2" class="form-radio text-blue-500" name="plan" value="Premium Plan">
                                        <span class="ml-2">Select</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <button @click="step = 2" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                            Next
                        </button>
                    </div>

                    <!-- Step 2: Business User Details -->
                    <div x-show="step === 2">
                        <h2 class="text-2xl font-semibold mb-4">Step 2: Business Information</h2>
                        <div class="mb-4">
                            <div class="mb-3">
                                <x-label for="business.name" value="{{ __('Industry:') }}" />
                                <x-input id="business.name" class="block mt-1 w-full" type="text" name="business.name" />
                                @error('business.name')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                            <x-label for="business.industry" value="{{ __('Status') }}" />
                            <x-select id="status" class="block mt-1 w-full" type="text" name="business.industry">
                                <option value="">Select</option>

                            </x-select>
                            @error('status')
                            <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                        </div>


                        <div class="flex justify-between">
                            <button @click="step = 1" class="mr-4 bg-gray-400 hover:bg-gray-500 text-white font-bold py-2 px-4 rounded">
                                Previous
                            </button>
                            <button @click="step = 3" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                                Next
                            </button>
                        </div>
                    </div>

                    <!-- Step 3: Review and Submit -->
                    <div x-show="step === 3">
                        <h2 class="text-2xl font-semibold mb-4">Step 3: User details: </h2>
                       <div>
                           <div class="mb-3">
                               <x-label for="first_name" value="{{ __('First Name') }}" />
                               <x-input id="first_name" class="block mt-1 w-full" type="text" name="first_name"   autofocus autocomplete="first_name" />
                               @error('first_name')
                               <div class="text-red-500">{{ $message }}</div>
                               @enderror
                           </div>
                           <div class="mb-3">
                               <x-label for="last_name" value="{{ __('Last Name') }}" />
                               <x-input id="last_name" class="block mt-1 w-full" type="text" name="last_name"   autofocus autocomplete="last_name" />
                               @error('last_name')
                               <div class="text-red-500">{{ $message }}</div>
                               @enderror
                           </div>
                           <div class="mb-3">
                               <x-label for="email" value="{{ __('Email') }}" />
                               <x-input id="email" class="block mt-1 w-full" type="email" name="email"  required />
                               @error('email')
                               <div class="text-red-500">{{ $message }}</div>
                               @enderror
                           </div>
                           <div class="mb-3">
                               <x-label for="password" value="{{ __('Password') }}" />
                               <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                           </div>

                           <div class="mb-3">
                               <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                               <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                           </div>
                       </div>
                        <div class="flex justify-between">
                            <button @click="step = 2" class="mr-4 bg-gray-400 hover:bg-gray-500 text-white font-bold py-2 px-4 rounded">
                                Previous
                            </button>
                            <button class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
                                Submit
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">

        </x-slot>
    </x-dialog-modal>
</div>
