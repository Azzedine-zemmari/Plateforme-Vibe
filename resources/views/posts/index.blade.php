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
        <!-- Post 1 -->
        <div class="bg-white rounded-lg shadow-md mb-4 overflow-hidden">
            <!-- Post Header -->
            <div class="flex items-center p-4 border-b">
                <img src="{{asset('storage/'. $post->image)}}" alt="Profile" class="rounded-full h-10 w-10">
                <div class="ml-3">
                    <p class="font-semibold">{{$post->name}}</p>
                </div>
            </div>
            
            <!-- Post Content -->
            <div class="p-4">
                <p class="text-gray-800">{{$post->content}}</p>
                @if($post->IMAGE)
                <img src="{{asset('storage/')}}" alt="Post image" class="w-full h-64 object-cover mt-3 rounded">
                @endif
            </div>
            
            <!-- Like and Comment Counts -->
            <div class="px-4 py-2 text-sm text-gray-500 border-t border-b">
                <span>{{$post->likes_count}} likes</span>
                <span class="mx-2">•</span>
                <span>8 comments</span>
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
                <!-- Existing Comment -->
                <div class="flex mb-4">
                    <img src="https://via.placeholder.com/30" alt="Profile" class="rounded-full h-8 w-8">
                    <div class="ml-2 bg-gray-100 rounded-lg p-2 flex-1">
                        <p class="font-semibold text-sm">Jane Smith</p>
                        <p class="text-sm">This looks amazing! Can't wait to see more.</p>
                    </div>
                </div>
                
                <!-- Comment Input -->
                <div class="flex items-center">
                    <img src="https://via.placeholder.com/30" alt="Your profile" class="rounded-full h-8 w-8">
                    <div class="ml-2 flex-1 relative">
                        <textarea 
                            class="w-full border rounded-full py-2 px-4 pr-10 focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm resize-none" 
                            placeholder="Write a comment..."
                            rows="1"
                        ></textarea>
                        <button class="absolute right-3 top-2 text-blue-500 hover:text-blue-700">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <script>
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