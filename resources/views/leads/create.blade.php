<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Lead') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form action="{{ route('leads.store') }}"  method="post">
                    @csrf
                    <div>
                        <x-label for="first_name" value="{{ __('First Name') }}" />
                        <x-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')" autofocus autocomplete="first_name" />
                        @error('first_name')
                        <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <x-label for="last_name" value="{{ __('Last Name') }}" />
                        <x-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')"  autofocus autocomplete="last_name" />
                        @error('last_name')
                        <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <x-label for="email" value="{{ __('Email') }}" />
                        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" autofocus autocomplete="email" />
                        @error('email')
                        <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <x-label for="phone" value="{{ __('Phone') }}" />
                        <x-input id="phone" class="block mt-1 w-full" type="phone" name="phone" :value="old('phone')" autofocus autocomplete="phone" />
                        @error('phone')
                        <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <x-label for="company" value="{{ __('Company') }}" />
                        <x-input id="company" class="block mt-1 w-full" type="text" name="company" :value="old('company')" required autofocus autocomplete="company" />
                        @error('company')
                        <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <x-label for="status" value="{{ __('Status') }}" />
                        <x-select id="status" class="block mt-1 w-full" type="text" name="status" :value="old('status')" autofocus autocomplete="status" >
                            <option value="">Select</option>
                            <option value="new">New</option>
                            <option value="contacted">Contacted</option>
                            <option value="converted">Converted</option>
                        </x-select>
                        @error('status')
                        <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <x-label for="status" value="{{ __('Notes') }}"/>
                        <x-textarea id="notes" name="notes" rows="4" class="block w-full mt-1" :value="old('notes')" />

                        @error('notes')
                        <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                    <x-button  class="mt-5">Submit</x-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
