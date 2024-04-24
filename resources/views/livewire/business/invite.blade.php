<div>
   <x-button wire:click="invite">Invite Users</x-button>

    <x-dialog-modal wire:model="inviteModal">
        <x-slot name="title">Invite User</x-slot>

        <x-slot name="content">
            <div class="mb-3">
                <x-label for="email" value="{{ __('Email:') }}" />
                <x-input id="email" class="block mt-1 w-full" type="text" wire:model="email" />
                @error('email')
                <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-button wire:click="$toggle('inviteModal')" wire:loading.attr="disabled">
                Cancel
            </x-button>

            <x-button class="ml-2" wire:click="sendInvite" wire:loading.attr="disabled">
                Send Invite
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>
