// import './bootstrap';

// import Alpine from 'alpinejs';

// window.Alpine = Alpine;

// Alpine.start();
// resources/js/app.js

import Echo from 'laravel-echo';
import Pusher from 'pusher-js';

window.Pusher = Pusher;
window.Echo = new Echo({
    broadcaster: 'pusher',
    key: env('PUSHER_APP_KEY'),  // Use your key
    wsHost: window.location.hostname,
    wsPort: 6001,  // Port where your Reverb WebSocket server is running
    forceTLS: false,
    disableStats: true,
});

// Listen for friend request event
Echo.channel('friend-request.' + userId)  // Where userId is the authenticated user's ID
    .listen('FriendRequestSent', (event) => {
        console.log(event.message);
        alert('New friend request from user ' + event.user_id);
    });