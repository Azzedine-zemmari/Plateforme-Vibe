<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50">
    <div class="max-w-2xl mx-auto p-6">
        <!-- Added navigation section -->
        <div class="flex items-center justify-between mb-6">
            <a href="<?php echo e(url('/users')); ?>" class="inline-flex items-center px-4 py-2 bg-gray-100 text-gray-700 text-sm rounded-md hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Back to Home
            </a>
        </div>

        <h1 class="text-xl font-semibold text-gray-900 mb-8">Edit Profile</h1>
        
        <form class="space-y-8" action="<?php echo e(url('/UpdateProfile/'.$user->id)); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <!-- Profile Image Section -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-4">Profile Image</label>
                <div class="flex justify-center">
                    <div class="relative">
                        <?php if(empty($user->image)): ?>
                        <div id="svg" class="w-32 h-32 bg-gray-200 rounded-full flex items-center justify-center">
                            <svg class="h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <?php else: ?>
                        <div id="svg" class=" flex items-center justify-center">
                           <img  class="w-32 h-32 bg-gray-200 rounded-full" src="<?php echo e(asset('/storage/'.$user->image)); ?>" alt="">
                        </div>
                        <?php endif; ?>
                        <input name="image" type="file" class="hidden" id="profile-image">
                    </div>
                </div>
            </div>

            <!-- Full Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                <input type="text" name="name" id="name" value="<?php echo e($user->name); ?> " placeholder="Enter name" 
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>

            <div>
                <label for="firstName" class="block text-sm font-medium text-gray-700 mb-1">First name</label>
                <input type="text" name="first" id="firstName" value="<?php echo e($user->prenom); ?> " placeholder="Enter first name" 
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>

            <div>
                <label for="Pseudo" class="block text-sm font-medium text-gray-700 mb-1">Pseudo</label>
                <input type="text" name="pseudo" id="Pseudo" value="<?php echo e($user->pseudo); ?> " placeholder="" 
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>

            <!-- Bio -->
            <div>
                <label for="bio" class="block text-sm font-medium text-gray-700 mb-1">Bio</label>
                <textarea id="bio" name="bio" rows="4" placeholder="Enter Bio"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"><?php echo e($user->bio); ?></textarea>
            </div>

            <!-- Save Button -->
            <div class="flex justify-end">
                <button type="submit" class="px-4 py-2 bg-black text-white text-sm rounded-md hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-black">
                    Save changes
                </button>
            </div>
        </form>
    </div>
    <script>
        const Svg = document.getElementById('svg');
        const profile_Image = document.getElementById('profile-image');
        Svg.addEventListener('click',()=>{
            profile_Image.click();
        })
    </script>
</body>
</html><?php /**PATH C:\laragon\www\Plateforme_Vibe\resources\views/users/EditProfile.blade.php ENDPATH**/ ?>