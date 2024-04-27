<div>
    <!-- resources/views/livewire/manage-roles.blade.php -->

    <div class="p-6">
        <!-- Role Creation Form -->
        <div class="flex">
            <div class="flex">
                <x-input type="text" wire:model="name" placeholder="Role Name"/>
                @error('name')
                <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <x-button wire:click="save">
                @if($editing)
                    Update Role
                @else
                    Create Role
                @endif

            </x-button>
        </div>

        <!-- List of Roles -->


        <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-5">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Role Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Edit
                            <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                                </svg></a>
                        </div>
                    </th>

                </tr>
                </thead>
                <tbody>
                @foreach($business_roles as $role)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                      {{ $role->name }}
                    </th>
                    <td class="px-6 py-4">
                        <button wire:click="edit({{ $role->id }})" class="font-medium text-blue-600 dark:text-blue-500 hover:underline cursor-pointer">Edit</button>
                        <span class="mx-2"></span>
                        <button wire:click="delete({{ $role->id }})" class="font-medium text-red-600 dark:text-reed-500 hover:underline  cursor-pointer">Delete</button>

                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            <div class="mt-5">
                {{ $business_roles->links() }}
            </div>
        </div>

    </div>

</div>
