// Exporter les fonctions pour les rendre disponibles globalement
window.showMessagePreview = showMessagePreview;
window.updateUnreadMessageCount = updateUnreadMessageCount;

function updateUnreadMessageCount() {
    const badge = document.querySelector('#unread-messages-badge');
    if (badge) {
        const currentCount = parseInt(badge.textContent || '0');
        badge.textContent = currentCount + 1;
        badge.classList.remove('hidden');
    }
}

function showMessagePreview(message) {
    const preview = document.createElement('div');
    preview.classList.add('message-preview', 'animate-slide-in', 'bg-white', 'dark:bg-gray-800', 'rounded-lg', 'shadow-lg', 'p-4', 'transform', 'transition-all');
    preview.innerHTML = `
        <div class="flex items-start space-x-3">
            <div class="flex-1">
                <p class="font-bold text-gray-900 dark:text-white">${message.from_name || 'Utilisateur'}</p>
                <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">${message.message}</p>
            </div>
            <button class="text-gray-400 hover:text-gray-500 focus:outline-none" onclick="this.parentElement.parentElement.remove()">
                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" />
                </svg>
            </button>
        </div>
    `;

    const container = document.querySelector('#message-previews');
    if (!container) {
        console.error('Container #message-previews not found');
        return;
    }

    container.prepend(preview);

    // Faire disparaître la prévisualisation après 5 secondes
    setTimeout(() => {
        preview.classList.add('animate-fade-out');
        setTimeout(() => {
            if (preview && preview.parentElement) {
                preview.remove();
            }
        }, 500);
    }, 5000);
}

const userIdMeta = document.querySelector('meta[name="user-id"]');
if (userIdMeta) {
    const userId = userIdMeta.content;

    window.Echo.channel(`user.${userId}`)
        .listen('.new.message', (e) => {
            // Créer une notification
            const notification = new Notification('Nouveau message', {
                body: 'Vous avez reçu un nouveau message',
                icon: '/path/to/icon.png'
            });

            // Jouer un son de notification
            const audio = new Audio('/path/to/notification-sound.mp3');
            audio.play();

            // Mettre à jour l'interface utilisateur
            updateUnreadMessageCount();
            showMessagePreview(e.message);
        });
}

// Demander la permission pour les notifications
if (Notification.permission !== 'granted') {
    Notification.requestPermission();
}

// S'assurer que le DOM est chargé avant d'initialiser
document.addEventListener('DOMContentLoaded', () => {
    if (!document.querySelector('#message-previews')) {
        console.error('Message previews container not found');
    }
}); 