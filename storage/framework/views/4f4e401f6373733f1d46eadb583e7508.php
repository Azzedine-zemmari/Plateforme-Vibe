<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connect with <?php echo e($profileUser->name); ?></title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gradient-to-br from-blue-50 to-blue-100 min-h-screen flex items-center justify-center p-4">
    <div class="bg-white w-full max-w-md rounded-2xl shadow-2xl p-8 space-y-6">
        <div class="text-center">
            <h1 class="text-2xl font-bold text-gray-800 mb-2">
                Scan to Connect with <?php echo e($profileUser->name); ?>

            </h1>
            <p class="text-gray-600 mb-6">
                Add this contact by scanning the QR code below
            </p>
        </div>

        <div class="flex justify-center">
            <div class="bg-blue-50 p-4 rounded-xl shadow-md">
                <?php echo $qrCode; ?>

            </div>
        </div>

        <div class="bg-gray-100 rounded-xl p-4">
            <p class="text-sm text-gray-700 text-center mb-2">
                Or share this invitation link:
            </p>
            <div class="flex items-center space-x-2">
                <input 
                    type="text" 
                    value="<?php echo e($invitationLink); ?>" 
                    readonly 
                    class="flex-1 px-3 py-2 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                />
                <button 
                    onclick="copyLink()"
                    class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors"
                >
                    Copy
                </button>
            </div>
        </div>

        
    </div>

    <script>
        function copyLink() {
            const linkInput = document.querySelector('input');
            linkInput.select();
            document.execCommand('copy');
            
            const button = event.target;
            button.textContent = 'Copied!';
            button.classList.remove('bg-blue-600');
            button.classList.add('bg-green-600');
            
            setTimeout(() => {
                button.textContent = 'Copy';
                button.classList.remove('bg-green-600');
                button.classList.add('bg-blue-600');
            }, 2000);
        }
    </script>
</body>
</html><?php /**PATH C:\Nouveau dossier\htdocs\Plateforme-Vibe\resources\views/qr-code.blade.php ENDPATH**/ ?>