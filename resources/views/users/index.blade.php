<x-FreindsLayout>
<div class="px-4 py-6 sm:px-0">
            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <div class="px-4 py-5 border-b border-gray-200 sm:px-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        All Users
                    </h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">
                        A complete list of all registered users.
                    </p>
                </div>
                <div>
    <div class="px-4 py-3 bg-gray-50">
        <form action="{{ url('/users') }}" method="POST" class="flex items-center space-x-2">
            @csrf
            <div class="relative flex-grow">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                    </svg>
                </div>
                <input 
                    type="text" 
                    name="search"
                    placeholder="Search users..." 
                    class="pl-10 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md p-2"
                >
            </div>
            <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Search
            </button>
        </form>
    </div>

    <ul class="divide-y divide-gray-200">
        @foreach($users as $user)
        <li 
            class="px-4 py-4 flex items-center hover:bg-gray-50 transition-colors duration-150"
            x-show="!searchTerm || '{{ strtolower($user->name) }}'.includes(searchTerm.toLowerCase()) || '{{ strtolower($user->email) }}'.includes(searchTerm.toLowerCase())"
        >
            <div class="min-w-0 flex-1">
                <div class="flex items-center">
                    <div class="h-14 w-14 rounded-full bg-indigo-100 flex items-center justify-center overflow-hidden border-2 border-indigo-200 shadow-sm">
                        <img 
                            src="{{ asset('storage/' . $user->image) }}" 
                            alt="{{ $user->name }}" 
                            class="h-full w-full object-cover"
                            onerror="this.onerror=null; this.src=null; this.parentNode.innerHTML='<span class=\'text-xl font-semibold text-indigo-600\'>{{ substr($user->name, 0, 1) }}</span>';"
                        >
                    </div>
                    <div class="ml-4">
                        <a href="{{url('/USERPROFILE/'. $user->id)}}" class="text-sm font-medium text-gray-900">{{ $user->name }}</a>
                        <p class="text-sm text-gray-500">{{ $user->email }}</p>
                        <div class="mt-1 flex items-center">
                            <span class="flex h-2 w-2 relative">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-2 w-2 bg-green-500"></span>
                            </span>
                            <span class="ml-1.5 text-xs text-gray-500">Online</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ml-4 flex-shrink-0 flex space-x-2">
                <form action="{{url('/userAdd')}}" method="POST">
                    @csrf
                    <input type="hidden" value="{{$user->id}}" name="idUser"  id="user-id">
                    <button class="inline-flex items-center p-1.5 border border-transparent rounded-full shadow-sm text-indigo-600 bg-indigo-50 hover:bg-indigo-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                    </svg>
                    </button>   
                </form>
                <button class="inline-flex items-center p-1.5 border border-transparent rounded-full shadow-sm text-gray-500 bg-gray-50 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                    </svg>
                </button>
            </div>
        </li>
        @endforeach
    </ul>
</div>

                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                    <nav class="flex items-center justify-between border-t border-gray-200 px-4 sm:px-0">
                        <div class="flex flex-1 w-0">
                            <a href="#" class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                                Previous
                            </a>
                        </div>
                        <div class="flex justify-center">
                            <span class="text-sm text-gray-700">
                                Showing <span class="font-medium">1</span> to <span class="font-medium">10</span> of <span class="font-medium">{{ count($users) }}</span> results
                            </span>
                        </div>
                        <div class="flex justify-end flex-1 w-0">
                            <a href="#" class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                                Next
                            </a>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        
</x-FreindsLayout>
