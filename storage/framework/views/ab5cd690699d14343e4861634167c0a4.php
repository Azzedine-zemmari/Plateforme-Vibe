<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <!-- Use Vite to load CSS -->
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/app.css'); ?>
</head>
<body>
    <div id="app">
        <!-- Render your Vue component -->
        <chat-component></chat-component>
    </div>

    <!-- Use Vite to load JS -->
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/app.js'); ?>
</body>
</html>
<?php /**PATH C:\laragon\www\Plateforme_Vibe\resources\views/chat.blade.php ENDPATH**/ ?>