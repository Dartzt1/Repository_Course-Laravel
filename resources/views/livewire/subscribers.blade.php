<div class="p-6 bg-white border-b border-gray-200">
    <p class="text-2xl text-gray-600 font-bold mb-6 underline">
        Subscribers
    </p>  

    <div class="px-8">
    	<input
    		type="text"
    		class="rounded-lg border float-right right border-gray-300 mb-4 w-1/3 pl-8"
    		placeholder="Search"
            wire:model="search"
    	>
    		
    	</input>


	    @if ($subscribers->isEmpty())
	        <div class="flex w-full bg-red-100 p-5 rounded-lg">
	            <p class="text-red-400">
	                No subscribers found
	            </p>
	        </div>

	    @else 
	        <table class="w-full">
	            <thead 
	            class="border-b-2 border-gray-300 text-indigo-600">
	                <tr>
	                    <th class="px-6 py-3 text-left">Email </th>
	                    <th class="px-6 py-3 text-left">Verified</th>
	                    <th class="px-6 py-3 text-left">Delete</th>
	                </tr>
	            </thead>

	            <tbody>
	                @foreach ($subscribers as $subscriber)
	                    <tr class="text-sm text-indigo-900 border-b border-gray-400">
	                       	<td class="px-6 py-4">
	                            {{$subscriber->email}}
	                        </td>

	                        <td>
	                            {{ optional($subscriber->email_verified_at)->diffForHumans() ?? 'Por verificar' }}
	                        </td>

	                        <td class="px-6 py-4">
	                            <button class="border border-red-500 rounded-md bg-red-500 text-white focus:ring-red-600 px-4 py-2"
	                            wire:click="delete({{ $subscriber->id }})">
	                            	Delete
	                            </button>
	                        </td>
	                    </tr>
	                @endforeach
	            </tbody>
	        </table>  
	    @endif
    </div>
</div>
