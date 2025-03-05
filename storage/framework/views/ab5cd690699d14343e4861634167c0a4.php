<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>Chat Application</title>
    <style>
        .chat-box {
            border: 1px solid #ccc;
            padding: 10px;
            height: 300px;
            overflow-y: auto;
        }
        .chat-input {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <h1>Chat Application</h1>

    <!-- Display Messages -->
    <div class="chat-box" id="chat-box">
        <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div>
                <strong><?php echo e($message->user); ?>:</strong> <?php echo e($message->message); ?>

            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <!-- Send Message Form -->
    <div class="chat-input">
        <form id="chat-form">
            <input type="hidden" name="user" id="user" value="Guest">
            <input type="text" name="message" id="message" placeholder="Type a message..." required>
            <button type="submit">Send</button>
        </form>
    </div>

    <!-- Include Pusher JS and Laravel Echo -->
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script src="/js/app.js"></script>

    <script>
        // Get CSRF token from meta tag
        let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        // Initialize Pusher
        const pusher = new Pusher('<?php echo e(env('VITE_PUSHER_APP_KEY')); ?>', {
            cluster: '<?php echo e(env('VITE_PUSHER_APP_CLUSTER')); ?>',
            forceTLS: true,
        });

        // Subscribe to the channel
        const channel = pusher.subscribe('chat');
        channel.bind('MessageSent', function (data) {
            const chatBox = document.getElementById('chat-box');
            const newMessage = document.createElement('div');
            newMessage.textContent = `${data.user}: ${data.message}`;
            chatBox.appendChild(newMessage);
            chatBox.scrollTop = chatBox.scrollHeight; // Scroll to bottom
        });

        // Handle form submission
        document.getElementById('chat-form').addEventListener('submit', function (e) {
            e.preventDefault();

            const user = document.getElementById('user').value;
            const message = document.getElementById('message').value;

            if (!message.trim()) return;

            fetch('/chat/send', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                },
                body: JSON.stringify({
                    user: user,
                    message: message,
                }),
            })
            .then(response => response.json())
            .then(data => {
                console.log(data);
                document.getElementById('message').value = ''; // Clear input
            })
            .catch(error => console.error('Error:', error));
        });
    </script>
</body>
</html><?php /**PATH C:\laragon\www\Plateforme_Vibe\resources\views/chat.blade.php ENDPATH**/ ?>