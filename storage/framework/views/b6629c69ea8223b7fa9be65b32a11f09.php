<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans">

    <!-- Main Container -->
    <div class="min-h-screen flex flex-col items-center justify-center py-12 sm:px-6 lg:px-8">

        <!-- Header Section -->
        <div class="w-full max-w-4xl bg-gradient-to-r from-blue-400 to-purple-500 rounded-t-lg shadow-md overflow-hidden mb-6">
            <div class="flex items-center justify-between px-6 py-4">
                <h1 class="text-2xl font-bold text-white">Profile</h1>
                <a href="<?php echo e(url('/users')); ?>" class="inline-flex items-center px-4 py-2 bg-white text-gray-700 rounded-md hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Back to Home
                </a>
            </div>
        </div>

        <!-- Profile Content -->
        <div class="w-full max-w-4xl bg-white rounded-b-lg shadow-md p-6 space-y-6">

            <!-- Profile Image -->
            <div class="flex items-center justify-center relative -mt-6 mb-6">
                <div class="relative w-32 h-32 bg-gray-200 rounded-full border-4 border-white overflow-hidden">
                    <?php if(empty($user->image)): ?>
                        <svg class="h-16 w-16 text-gray-400 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    <?php else: ?>
                        <img class="w-full h-full object-cover" src="<?php echo e(asset('/storage/' . $user->image)); ?>" alt="<?php echo e($user->name); ?>'s Avatar">
                    <?php endif; ?>
                </div>
            </div>

            <!-- Profile Info -->
            <div class="space-y-4">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900"><?php echo e($user->name); ?></h1>
                    <p class="text-sm text-gray-500">Joined: <?php echo e($user->created_at->format('F Y')); ?></p>
                </div>

                <!-- Buttons -->
                <?php if($AuthenticatedId == $user->id): ?>
                <div class="flex space-x-2">
                    <a href="<?php echo e(url('/EditProfile/' . $user->id)); ?>" class="px-4 py-2 bg-black text-white text-sm rounded-md">
                        Edit Profile
                    </a>
                    <a href="mailto:?subject=Check out my profile&body=Check out my profile: <?php echo e(route('USERPROFILE', ['userId' => $user->id])); ?>" target="_blank" class="p-1 border border-gray-300 rounded-full">
                        <svg class="h-5 w-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
                        </svg>
                    </a>
                </div>
                <?php endif; ?>

                <!-- About Section -->
                <div class="space-y-2">
                    <h2 class="text-lg font-medium text-gray-900">About</h2>
                    <p class="text-gray-600 text-sm">
                        <?php echo e($user->bio ?? 'No bio available.'); ?>

                    </p>
                </div>

                <!-- Contact Info -->
                <div class="space-y-2">
                    <div class="flex items-center text-sm text-gray-500">
                        <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <?php echo e($user->email); ?>

                    </div>
                    <div class="flex items-center text-sm text-gray-500">
                        <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                        </svg>
                        www.<?php echo e($user->pseudo ?? 'example.com'); ?>

                    </div>
                </div>
            </div>

            <!-- Posts Section -->
            <div class="space-y-4">
                <h2 class="text-lg font-medium text-gray-900">Posts (<?php echo e($posts->count()); ?>)</h2>
                <?php if($posts->isEmpty()): ?>
                    <p class="text-gray-500">No posts yet.</p>
                <?php else: ?>
                    <ul class="space-y-2">
                        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="flex justify-between items-center bg-gray-50 p-3 rounded-md">
                                <span class="font-semibold"><?php echo e($post->content); ?></span>
                                <span class="text-sm text-gray-500">Likes: <?php echo e($post->likes_count); ?>, Comments: <?php echo e($post->comments_count); ?></span>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                <?php endif; ?>
            </div>

            <!-- Likes Section -->
            <div class="space-y-4">
                <h2 class="text-lg font-medium text-gray-900">Likes (<?php echo e($likes->count()); ?>)</h2>
                <?php if($likes->isEmpty()): ?>
                    <p class="text-gray-500">No likes yet.</p>
                <?php else: ?>
                    <ul class="space-y-2">
                        <?php $__currentLoopData = $likes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $like): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="bg-gray-50 p-3 rounded-md">
                                Liked post: "<?php echo e($like->post->content ?? 'Post not available'); ?>"
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                <?php endif; ?>
            </div>

            <!-- Comments Section -->
            <div class="space-y-4">
                <h2 class="text-lg font-medium text-gray-900">Comments (<?php echo e($comments->count()); ?>)</h2>
                <?php if($comments->isEmpty()): ?>
                    <p class="text-gray-500">No comments yet.</p>
                <?php else: ?>
                    <ul class="space-y-2">
                        <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="bg-gray-50 p-3 rounded-md">
                                <?php echo e($comment->content); ?>

                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html><?php /**PATH C:\xampp\htdocs\Plateforme-Vibe-main\resources\views/users/UserProfile.blade.php ENDPATH**/ ?>