<div>
        @if($showButton && auth()->user()->businesses->count() > 1)
            <x-button wire:click="change">Change Business</x-button>
        @endif

            {{ session('businessId') }}
    <x-dialog-modal wire:model="showSelection">
        <x-slot name="title">Select Business</x-slot>

        <x-slot name="content">

            @foreach(auth()->user()->businesses as  $business)

                <div class="border rounded p-4 mb-3 flex  gap-4">
                    <input type="radio" wire:model="businessId" name="businessId" id="businessId{{ $business->id }}" value="{{ $business->id }}">
                    <x-label  class="cursor-pointer" for="businessId{{ $business->id }}" value="{{ $business->name }}" />
                </div>

            @endforeach

        </x-slot>

        <x-slot name="footer">

        </x-slot>
    </x-dialog-modal>
</div>

