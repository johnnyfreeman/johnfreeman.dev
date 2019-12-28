import ApplicationController from './application-controller';

export default class extends ApplicationController {
    static targets = [ 'online', 'offline' ];

    connect() {
        this.updateOnlineStatus = this.updateOnlineStatus.bind(this);
        window.addEventListener('online',  this.updateOnlineStatus);
        window.addEventListener('offline', this.updateOnlineStatus);

        this.updateOnlineStatus();
    }

    disconnect() {
        window.removeEventListener('online',  this.updateOnlineStatus);
        window.removeEventListener('offline', this.updateOnlineStatus);
    }

    // Private

    updateOnlineStatus(event) {
        if (navigator.onLine) {
            this.onlineTarget.classList.remove('hidden');
            this.offlineTarget.classList.add('hidden');
        } else {
            this.onlineTarget.classList.add('hidden');
            this.offlineTarget.classList.remove('hidden');
        }
    }
}
