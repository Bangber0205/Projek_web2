<header class="fixed top-0 w-screen h-[75px] bg-white px-14 flex items-center justify-between shadow z-20" x-data="notificationManager()">
    <div class="flex gap-3.5 items-center">
        <img src="<?= base_url('images/logo.png') ?>" alt="Logo">
        <h1 class="font-inter font-bold text-xl text-text">Warung<span class="text-[#003859]">Kita</span></h1>
    </div>

    <div class="flex items-center justify-center gap-4 relative">

      <!-- Notification Dropdown -->
      <div class="relative" @click.away="notificationsOpen = false">
        <button @click="notificationsOpen = !notificationsOpen; if (notificationsOpen) unreadCount = 0;" class="relative focus:outline-none">
          <svg width="16" height="18" viewBox="0 0 16 18" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M7.87433 0C7.25206 0 6.74933 0.502734 6.74933 1.125V1.8C4.18292 2.32031 2.24933 4.59141 2.24933 7.3125V7.97344C2.24933 9.62578 1.64112 11.2219 0.544249 12.4594L0.284093 12.7512C-0.0112198 13.0816 -0.0815323 13.5563 0.0977645 13.9605C0.277061 14.3648 0.681358 14.625 1.12433 14.625H14.6243C15.0673 14.625 15.4681 14.3648 15.6509 13.9605C15.8337 13.5563 15.7599 13.0816 15.4646 12.7512L15.2044 12.4594C14.1075 11.2219 13.4993 9.6293 13.4993 7.97344V7.3125C13.4993 4.59141 11.5657 2.32031 8.99933 1.8V1.125C8.99933 0.502734 8.49659 0 7.87433 0ZM9.4669 17.3426C9.88878 16.9207 10.1243 16.3477 10.1243 15.75H7.87433H5.62433C5.62433 16.3477 5.85987 16.9207 6.28175 17.3426C6.70362 17.7645 7.27667 18 7.87433 18C8.47198 18 9.04503 17.7645 9.4669 17.3426Z" fill="#9CA3AF"/>
          </svg>
          <span x-show="unreadCount > 0" x-text="unreadCount" class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center"></span>
        </button>

        <div
          x-show="notificationsOpen"
          x-transition:enter="transition ease-out duration-100"
          x-transition:enter-start="opacity-0 scale-95"
          x-transition:enter-end="opacity-100 scale-100"
          x-transition:leave="transition ease-in duration-75"
          x-transition:leave-start="opacity-100 scale-100"
          x-transition:leave-end="opacity-0 scale-95"
          class="absolute right-0 mt-2 w-80 bg-white rounded-md shadow-lg z-30 max-h-96 overflow-y-auto"
          style="display: none;"
        >
          <div class="py-2">
            <div class="px-4 py-2 border-b border-gray-200">
              <h3 class="text-sm font-medium text-gray-900">Notifikasi</h3>
            </div>
            <div x-show="notifications.length === 0" class="px-4 py-4 text-sm text-gray-500 text-center">
              Tidak ada notifikasi
            </div>
            <div x-show="notifications.length > 0">
              <template x-for="notification in notifications" :key="notification.id">
                <div class="px-4 py-3 border-b border-gray-100 hover:bg-gray-50 cursor-pointer"
                     :class="{ 'bg-blue-50': !notification.is_read }">
                  <div class="flex items-start">
                    <div class="flex-shrink-0">
                      <div x-show="notification.type === 'success'" class="w-2 h-2 bg-green-500 rounded-full mt-2"></div>
                      <div x-show="notification.type === 'warning'" class="w-2 h-2 bg-yellow-500 rounded-full mt-2"></div>
                      <div x-show="notification.type === 'error'" class="w-2 h-2 bg-red-500 rounded-full mt-2"></div>
                      <div x-show="notification.type === 'info'" class="w-2 h-2 bg-blue-500 rounded-full mt-2"></div>
                    </div>
                    <div class="ml-3 flex-1">
                      <p class="text-sm font-medium text-gray-900" x-text="notification.title"></p>
                      <p class="text-sm text-gray-600" x-text="notification.message"></p>
                      <p class="text-xs text-gray-400 mt-1" x-text="formatDate(notification.created_at)"></p>
                    </div>
                    <div class="flex-shrink-0 ml-2">
                      <button @click="deleteNotification(notification.id)" class="text-gray-400 hover:text-red-500 focus:outline-none">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                        </svg>
                      </button>
                    </div>
                  </div>
                </div>
              </template>
            </div>
          </div>
        </div>
      </div>

      <!-- Profile Dropdown -->
      <div class="relative" @click.away="open = false">
        <button @click="open = !open" class="flex items-center space-x-3 font-inter focus:outline-none">
          <?php
            $auth = service('authentication');
            $isLoggedIn = $auth->check();
            $user = $auth->user();
            $loginInput = session()->get('login_input');
            error_log("Is Logged In: " . ($isLoggedIn ? 'true' : 'false'));
            error_log("Authenticated User: " . json_encode($user));
            error_log("Session login_input: " . $loginInput);
          ?>
          <img
            src="https://i.pravatar.cc/150?u=<?= urlencode($loginInput ?? ($user->email ?? 'default')) ?>"
            alt="User Photo"
            class="w-8 h-8 rounded-full object-cover"
          />
          <div>
            <h1 class="text-sm font-medium text-text"><?= esc($user ? $user->username : '') ?></h1>
            <h1 class="text-xs text-text-sec"><?= esc($user ? $user->email : '') ?></h1>
          </div>
          <svg width="11" height="6" viewBox="0 0 11 6" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M4.72207 5.78145C5.01504 6.07441 5.49082 6.07441 5.78379 5.78145L10.2838 1.28145C10.5768 0.988477 10.5768 0.512695 10.2838 0.219727C9.99082 -0.0732422 9.51504 -0.0732422 9.22207 0.219727L5.25176 4.19004L1.28145 0.22207C0.988477 -0.0708987 0.512695 -0.0708987 0.219727 0.22207C-0.0732422 0.515039 -0.0732422 0.99082 0.219727 1.28379L4.71973 5.78379L4.72207 5.78145Z" fill="#9CA3AF"/>
          </svg>
        </button>

        <div
          x-show="open"
          x-transition:enter="transition ease-out duration-100"
          x-transition:enter-start="opacity-0 scale-95"
          x-transition:enter-end="opacity-100 scale-100"
          x-transition:leave="transition ease-in duration-75"
          x-transition:leave-start="opacity-100 scale-100"
          x-transition:leave-end="opacity-0 scale-95"
          class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg z-30"
          style="display: none;"
        >
          <a href="<?= base_url('logout') ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
            Logout
          </a>
        </div>
      </div>
    </div>
</header>

<script>
document.addEventListener('alpine:init', () => {
    Alpine.data('notificationManager', () => ({
        notificationsOpen: false,
        open: false,
        notifications: [],
        unreadCount: 0,

        init() {
            this.loadNotifications();
            // Poll for new notifications every 30 seconds
            setInterval(() => {
                this.loadNotifications();
            }, 30000);
        },

        async loadNotifications() {
            try {
                const response = await fetch('<?= base_url('api/notifications') ?>');
                const data = await response.json();
                this.notifications = data.notifications || [];
                this.unreadCount = data.unread_count || 0;
            } catch (error) {
                console.error('Error loading notifications:', error);
            }
        },

        async markAsRead(notificationId) {
            try {
                await fetch(`<?= base_url('api/notifications/mark-read/') ?>${notificationId}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    }
                });
                await this.loadNotifications();
            } catch (error) {
                console.error('Error marking notification as read:', error);
            }
        },

        async deleteNotification(notificationId) {
            if (confirm('Apakah Anda yakin ingin menghapus notifikasi ini?')) {
                try {
                    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                    await fetch(`<?= base_url('api/notifications/delete/') ?>${notificationId}`, {
                        method: 'DELETE',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfToken
                        }
                    });
                    await this.loadNotifications();
                } catch (error) {
                    console.error('Error deleting notification:', error);
                }
            }
        },

        formatDate(dateString) {
            const date = new Date(dateString);
            const now = new Date();
            const diff = now - date;
            const minutes = Math.floor(diff / 60000);
            const hours = Math.floor(diff / 3600000);
            const days = Math.floor(diff / 86400000);

            if (minutes < 1) return 'Baru saja';
            if (minutes < 60) return `${minutes} menit yang lalu`;
            if (hours < 24) return `${hours} jam yang lalu`;
            if (days < 7) return `${days} hari yang lalu`;

            return date.toLocaleDateString('id-ID');
        }
    }));
});
</script>
