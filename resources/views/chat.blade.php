<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat App</title>
    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body>
    <div id="chat">
        <ul id="messages"></ul>
    </div>
    <input type="text" id="message" placeholder="Your message">
    <button onclick="sendMessage()">Send</button>

    <script>
          // Initialize Laravel Echo
          window.Echo.channel('chat-channel')
            .listen('.chat-event', (data) => {
                const messages = document.getElementById('messages');
                const li = document.createElement('li');
                li.textContent = `${data.username}: ${data.message}`;
                messages.appendChild(li);
            });

        // Function to send a message
        function sendMessage() {
            const message = document.getElementById('message').value;

            fetch('/send-message', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ message })
            }).then(response => response.json())
              .then(data => console.log(data));
        }

        // Load previous messages
        fetch('/chat')
            .then(response => response.json())
            .then(messages => {
                const messagesList = document.getElementById('messages');
                messages.forEach(msg => {
                    const li = document.createElement('li');
                    li.textContent = `User ${msg.user_Id}: ${msg.message}`;
                    messagesList.appendChild(li);
                });
            });
    </script>
</body>
</html>