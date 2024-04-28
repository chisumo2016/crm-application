<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Leads') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <a href="{{ route('leads.create') }}" class="bg-blue-300 p-2 block mb-3 float-right">Add Leads</a>

               <div class="mt-5 clear-both">
                   <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                       <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 ">
                           <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                           <tr>
                               <th scope="col" class="px-6 py-3">
                                   Lead Name
                               </th>

                               <th scope="col" class="px-6 py-3">
                                   Lead Email
                               </th>

                               <th scope="col" class="px-6 py-3">
                                   <span class="sr-only">Edit</span>
                               </th>
                           </tr>
                           </thead>
                           <tbody>
                           @foreach($leads as $lead)
                           <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                               <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                   {{ $lead->first_name }}
                               </th>
                               <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                   {{ $lead->email }}
                               </th>
                               <td class="px-6 py-4 text-right">
                                   <a href="{{ route('leads.edit', $lead->id ) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                   <a onclick="deleteLead('lead{{ $lead->id }}')" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Delete</a>
                                   <form id="lead{{ $lead->id }}"   action="{{ route('leads.destroy',$lead->id) }}" method="post">
                                   @csrf
                                   @method('DELETE')
                               </td>
                           </tr>
                           @endforeach

                           </tbody>
                       </table>
                       <div class="py-3">
                           {{ $leads->links() }}
                       </div>
                   </div>

               </div>
            </div>
        </div>
    </div>

    <script>
        function deleteLead(leadId) {
            if (confirm("Are you sure you want to delete this lead ?")) {
                document.getElementById( leadId).submit();
            }
        }
    </script>
</x-app-layout>
