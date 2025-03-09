<x-FreindsLayout>
    @if(session('success'))
        <div id='sessiont'  class="flex items-center space-x-3 bg-[#d4edda] text-[#155724] p-4 border border-[#c3e6cb] rounded-md mb-7 shadow-md">
        <img class="w-5" src="{{asset('/images/success-filled-svgrepo-com.svg')}}" />
            <span>{{ session('success') }}</span>
        </div>
    @endif
    @if(session('error'))
        <div id='sessiont' class="flex items-center space-x-3 bg-[#f8d7da] text-[#721c24] p-4 border border-[#f5c6cb] rounded-md mb-7 shadow-md">
            <img class="w-5" src="{{asset('/images/error-filled-svgrepo-com.svg')}}" />
            <span>{{ session('error') }}</span>
        </div>
    @endif
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Header Section -->
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">My Friends</h1>
                <p class="mt-1 text-sm text-gray-500">{{count($freinds)}} friends</p>
            </div>
            
            <div class="flex items-center space-x-4">
                <div class="relative">
                    <input type="text" 
                           placeholder="Search friends..." 
                           class="w-64 pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500"
                    >
                    <div class="absolute left-3 top-2.5">
                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
                
                <a  href="{{route('users')}}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700">
                    <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    Add New Friend
                </a>
            </div>
        </div>

        <!-- Friends Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($freinds as $freind)
            <div class="bg-white rounded-lg shadow-sm hover:shadow-md transition-shadow duration-200">
                <div class="p-6">
                    <div class="flex items-center space-x-4">
                        <!-- Profile Image -->
                        <div class="relative">
                            <div class="h-16 w-16 rounded-full bg-indigo-100 flex items-center justify-center overflow-hidden border-2 border-indigo-200">
                                <img 
                                    src="{{asset('/storage/'. $freind->image)}}" 
                                    alt="{{$freind->name}}'s profile" 
                                    class="h-full w-full object-cover"
                                    onerror="this.onerror=null; this.src=null; this.parentNode.innerHTML='<span class=\'text-2xl font-semibold text-indigo-600\'>{{ substr($freind->name, 0, 1) }}</span>';"
                                >
                            </div>
                            @if($freind->is_online)
                            <div class="absolute bottom-0 right-0 h-4 w-4 rounded-full border-2 border-white bg-green-400"></div>
                            @else
                            <div class="absolute bottom-0 right-0 h-4 w-4 rounded-full border-2 border-white bg-gray-400"></div>
                            @endif
                        </div>

                        <!-- User Info -->
                        <div class="flex-1">
                            <a  href="{{url('/USERPROFILE/'. $freind->id)}}"  class="text-lg font-semibold text-gray-900">{{$freind->name}}</a>
                            <p class="text-sm text-gray-500">{{$freind->pseudo ?? ''}}</p>
                            <p class="text-sm text-gray-500 truncate">{{$freind->email}}</p>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="mt-4 flex justify-between items-center pt-4 border-t border-gray-200">
                        <button class="inline-flex items-center text-sm text-gray-500 hover:text-indigo-600">
                            <svg class="h-5 w-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                            </svg>
                            <p>{{$freind->status}}</p>
                        </button>
                        <form action="/accepteRequest" method="POST">
                            @csrf
                            <input type="hidden" name="freindId" value="{{$freind->id}}">
                            <button>accepter</button>
                        </form>
                        <form action="/cancel" method="POST">
                            @csrf 
                            <input type="hidden" name="freindId" value="{{$freind->id}}">
                            <button>refuser</button>
                        </form>

                        <div class="flex space-x-2">
                            <button class="inline-flex items-center text-sm text-gray-500 hover:text-indigo-600">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </button>
                            
                            <button class="inline-flex items-center text-sm text-gray-500 hover:text-red-600">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Empty State (shown when no friends) -->
        @if(count($freinds) === 0)
        <div class="text-center py-12">
            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
            </svg>
            <h3 class="mt-2 text-lg font-medium text-gray-900">No friends yet</h3>
            <p class="mt-1 text-sm text-gray-500">Get started by adding some friends to your network.</p>
            <div class="mt-6">
                <button class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700">
                    Find Friends
                </button>
            </div>
        </div>
        @endif
    </div>
    <script>
        const sessiont = document.getElementById('sessiont');
        if(sessiont){
            setTimeout(()=>{
                sessiont.style.display = 'none';
            },4000);
        }
    </script>
</x-FreindsLayout>