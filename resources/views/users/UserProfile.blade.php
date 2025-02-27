<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
</head>
<body class="">
        <!-- Header Image -->
        <div class="h-32 w-full bg-gradient-to-r from-blue-400 to-purple-500">
             <!-- Added navigation section -->
        <div class="flex items-center justify-end mb-6 ">
            <a href="{{url('/users')}}" class="inline-flex items-center px-4 py-2 bg-gray-100 text-gray-700 text-sm rounded-md hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Back to Home
            </a>
        </div>
        </div>
        
        <!-- Profile Content -->
        <div class="bg-white rounded-b-lg shadow-sm p-6">
            <!-- Profile Image -->
            <div class="relative -mt-20 mb-4">
                <div class="w-32 h-32 bg-gray-200 rounded-full border-4 border-white flex items-center justify-center">
                    @if(empty($user->image))
                    <svg class="h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                        @else
                        <img class=" w-36 h-32 rounded-full object-cover" src="{{asset('/storage/'.$user->image)}}" alt="">
                    @endif
                </div>
            </div>

            <!-- Profile Info -->
            <div class="space-y-4">
                <!-- Name and Title -->
                <div>
                    <h1 class="text-xl font-semibold text-gray-900">{{$user->name}}</h1>
                    <!-- <p class="text-sm text-gray-500">Product Designer</p> -->
                </div>

                <!-- Buttons -->
                @if($AuthenticatedId == $user->id)
                <div class="flex space-x-2">
                    <button class="px-4 py-2 bg-black text-white text-sm rounded-lg">
                        <a href="{{url('/EditProfile/'.$user->id)}}">Edit Profile</a>
                    </button>
                    <a href="mailto:?subject=Check out my profile&body=Check out my profile: {{ route('USERPROFILE', ['userId' => $user->id]) }}" target="_blank" class="p-1 border border-gray-300 rounded-full">
                        <svg class="h-4 w-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
                        </svg>
                    </a>
                </div>
                @endif

                <!-- About Section -->
                <div class=" space-y-4 shodow-xl  stroke-slate-500">
                <div>
                    <h2 class="text-lg font-medium text-gray-900 mb-2">About</h2>
                    <p class="text-gray-600 text-sm">
                        Product designer passionate about creating intuitive user experiences. Currently working on design systems and accessibility improvements.
                    </p>
                </div>

                <!-- Contact Info -->
                <div class="space-y-2">
                    <div class="flex items-center text-sm text-gray-500">
                        <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        {{$user->email}}
                    </div>
                    <div class="flex items-center text-sm text-gray-500">
                        <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                        </svg>
                        www.alexchen.design
                    </div>
                    <div class="flex items-center text-sm text-gray-500">
                        <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        {{$user->created_at}}
                    </div>
                </div>
                </div>
            </div>
        </div>
</body>
</html>