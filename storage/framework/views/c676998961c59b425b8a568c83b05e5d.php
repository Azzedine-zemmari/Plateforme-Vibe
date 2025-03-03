<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create a Post</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 py-12 px-4">

    <!-- Main Container -->
    <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold text-center text-gray-800 mb-6">Create a Post</h2>

        <!-- Form -->
        <form action="<?php echo e(route('update')); ?>" method="POST" enctype="multipart/form-data" class="space-y-4">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="postId" value="<?php echo e($post->id); ?>">
            <!-- Content Textarea -->
            <div>
                <label for="content" class="block text-gray-700 font-medium">Content</label>
                <textarea id="content" name="content" rows="4" placeholder="Write your post content here..."
                    class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"> <?php echo e($post->content); ?></textarea>
            </div>

            <!-- Image Upload -->
            <div>
                <label for="image" class="block text-gray-700 font-medium">Upload an Image (Optional)</label>
                <input type="file" id="image" name="image" class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Post Button -->
            <div class="flex justify-center">
                <button type="submit" class="w-full py-3 mt-4 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Post
                </button>
            </div>
        </form>
    </div>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\Plateforme-Vibe-main\resources\views/posts/postForm.blade.php ENDPATH**/ ?>