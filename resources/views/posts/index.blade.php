<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Social Media Posts</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="bg-gray-100 min-h-screen p-4">
    <div class="max-w-2xl mx-auto">
        <!-- Header -->
        <div class="bg-white rounded-lg shadow-md p-4 mb-4">
            <h1 class="text-2xl font-bold text-center text-blue-600">Social Feed</h1>
        </div>

        <!-- Create Post Box -->
        <div class="bg-white rounded-lg shadow-md p-4 mb-4">
            <form action="{{route('add')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="flex">
                    <img src="{{asset('storage/'.$authenticatedUser->image)}}" alt="Your profile" class="rounded-full h-10 w-10">
                    <textarea 
                        name="content"
                        class="ml-3 w-full border rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm" 
                        placeholder="What's on your mind?"
                        rows="2"
                    ></textarea>
                </div>
                <div class="flex justify-between mt-3">
                    <!-- Image Upload Button -->
                    <div class="flex items-center">
                        <label for="image-upload" class="cursor-pointer flex items-center text-gray-600 hover:text-blue-500 transition">
                            <i class="fas fa-image text-lg mr-2"></i>
                            <span class="text-sm">Add Image</span>
                        </label>
                        <input type="file" name="post_image" id="image-upload" class="hidden" accept="image/*">
                    </div>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md text-sm font-medium transition">
                        Post
                    </button>
                </div>
            </form>
        </div>

        @foreach($posts as $post)
        <!-- Post -->
        <div class="bg-white rounded-lg shadow-md mb-4 overflow-hidden">
            <!-- Post Header -->
            <div class="flex items-center justify-between p-4 border-b">
                <div class="flex items-center">
                    <img src="{{asset('storage/'. $post->image)}}" alt="Profile" class="rounded-full h-10 w-10">
                    <div class="ml-3">
                        <p class="font-semibold">{{$post->name}}</p>
                    </div>
                </div>
                <!-- Three-dot SVG for actions -->
                <div class="relative">
                    <button class="text-gray-500 hover:text-gray-700 focus:outline-none" onclick="toggleActions('actions-{{$post->id}}')">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                        </svg>
                    </button>
                    <!-- Actions Dropdown -->
                    <div id="actions-{{$post->id}}" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg border">
                        <form action="{{route('Edit')}}" method="POST">
                            @csrf
                            <input type="hidden" name="postId" value="{{$post->id}}">
                            <button type="submit" class="w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                </svg>
                                Edit
                            </button>
                        </form>
                        <form action="{{route('delete',$post->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="w-full px-4 py-2 text-sm text-red-600 hover:bg-gray-100 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            
            <!-- Post Content -->
            <div class="p-4">
                <p class="text-gray-800">{{$post->content}}</p>
                @if($post->IMAGE)
                <img src="{{asset('storage/'.$post->IMAGE)}}" alt="Post image" class="w-full h-64 object-cover mt-3 rounded">
                @endif
            </div>
            
            <!-- Like and Comment Counts -->
            <div class="px-4 py-2 text-sm text-gray-500 border-t border-b">
                <span>{{$post->likes_count}} likes</span>
                <span class="mx-2">•</span>
                <span>{{$post->comment_like}} comments</span>
            </div>
            
            <!-- Like and Comment Buttons -->
            <div class="flex border-b">
                <div class="flex-1">
                    <form action="{{route('like')}}" method="POST" class="w-full">
                        @csrf
                        <input type="hidden" name="postId" value="{{$post->id}}">
                        <button type="submit" class="w-full py-2 flex items-center justify-center hover:bg-gray-100 transition">
                            <i class="far fa-heart mr-2"></i>
                            <span>Like</span>
                        </button>
                    </form>
                </div>
                <div class="flex-1">
                    <button class="w-full py-2 flex items-center justify-center hover:bg-gray-100 transition">
                        <i class="far fa-comment mr-2"></i>
                        <span>Comment</span>
                    </button>
                </div>
            </div>
            
            <!-- Comments Section -->
            <div class="p-4">
                <!-- Existing Comments -->
                @if(count($post->comments) > 0)
                <div class="space-y-3 mb-4">
                    @foreach($post->comments as $comment)
                    <div class="flex">
                        <img src="{{asset('storage/'.$comment->userImage)}}" alt="Profile" class="rounded-full h-8 w-8">
                        <div class="ml-2 bg-gray-100 rounded-lg p-2 flex-1">
                            <p class="font-semibold text-sm">{{$comment->user_name}}</p>
                            <p class="text-sm">{{$comment->content}}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif
                
                <!-- Comment Input -->
                <form action="{{route('comment')}}" method="POST" class="flex items-center">
                    @csrf 
                    <input type="hidden" name="postId" value="{{$post->id}}">
                    <img src="{{asset('storage/'.$authenticatedUser->image)}}" alt="Your profile" class="rounded-full h-8 w-8">
                    <div class="ml-2 flex-1 relative">
                        <textarea 
                            name="content"
                            class="w-full border rounded-full py-2 px-4 pr-10 focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm resize-none" 
                            placeholder="Write a comment..."
                            rows="1"
                        ></textarea>
                        <button type="submit" class="absolute right-3 top-2 text-blue-500 hover:text-blue-700">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        @endforeach
    </div>

    <script>
        // Toggle actions dropdown
        function toggleActions(id) {
            const actions = document.getElementById(id);
            actions.classList.toggle('hidden');
        }


        // Basic interaction for the like buttons
        document.addEventListener('DOMContentLoaded', function() {
            const likeButtons = document.querySelectorAll('button:has(.fa-heart)');
            
            likeButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const icon = this.querySelector('.fa-heart');
                    icon.classList.toggle('far');
                    icon.classList.toggle('fas');
                    icon.classList.toggle('text-red-500');
                });
            });
        });
    </script>
</body>
</html>