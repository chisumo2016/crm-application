<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Leads') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <a href="{{ route('leads.create') }}" class="bg-blue-300 p-2 ">Add Leads</a>
               <div>
                   @foreach($leads as $lead)
                       <div>
                           {{ $lead->first_name }}
                           <a class="text-blue-500 hover:underline" href="{{ route('leads.edit', $lead->id ) }}">Edit</a>
                           <a class="text-blue-500 hover:underline"  onclick="deleteLead('lead{{ $lead->id }}')" >Delete</a>
                           <form id="lead{{ $lead->id }}"   action="{{ route('leads.destroy',$lead->id) }}" method="post">
                               @csrf
                            @method('DELETE')
                           </form>
                       </div>
                   @endforeach

                   {{ $leads->links() }}
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
