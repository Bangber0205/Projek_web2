<header class="fixed top-0 w-screen h-[75px] bg-white px-14 flex items-center justify-between shadow z-20" x-data="{ open: false }">
    <div class="flex gap-3.5 items-center">
        <img src="<?= base_url('images/logo.png') ?>" alt="Logo">
        <h1 class="font-inter font-bold text-xl text-text">Warung<span class="text-[#003859]">Kita</span></h1>
    </div>
    
    <div class="flex items-center justify-center gap-4 relative">

      <a href="#">
        <svg width="16" height="18" viewBox="0 0 16 18" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M7.87433 0C7.25206 0 6.74933 0.502734 6.74933 1.125V1.8C4.18292 2.32031 2.24933 4.59141 2.24933 7.3125V7.97344C2.24933 9.62578 1.64112 11.2219 0.544249 12.4594L0.284093 12.7512C-0.0112198 13.0816 -0.0815323 13.5563 0.0977645 13.9605C0.277061 14.3648 0.681358 14.625 1.12433 14.625H14.6243C15.0673 14.625 15.4681 14.3648 15.6509 13.9605C15.8337 13.5563 15.7599 13.0816 15.4646 12.7512L15.2044 12.4594C14.1075 11.2219 13.4993 9.6293 13.4993 7.97344V7.3125C13.4993 4.59141 11.5657 2.32031 8.99933 1.8V1.125C8.99933 0.502734 8.49659 0 7.87433 0ZM9.4669 17.3426C9.88878 16.9207 10.1243 16.3477 10.1243 15.75H7.87433H5.62433C5.62433 16.3477 5.85987 16.9207 6.28175 17.3426C6.70362 17.7645 7.27667 18 7.87433 18C8.47198 18 9.04503 17.7645 9.4669 17.3426Z" fill="#9CA3AF"/>
        </svg>
      </a>

      <!-- Profile Dropdown -->
      <div class="relative" @click.away="open = false">
        <button @click="open = !open" class="flex items-center space-x-3 font-inter focus:outline-none">
          <?php 
            $user = service('authentication')->user();
            $loginInput = session()->get('login_input');
            // Debug log for user info for diagnosis:
            error_log("Authenticated User: " . json_encode($user));
            error_log("Session login_input: " . $loginInput);
          ?>
          <img
            src="https://i.pravatar.cc/150?u=<?= urlencode($loginInput ?? ($user->email ?? 'default')) ?>"
            alt="User Photo"
            class="w-8 h-8 rounded-full object-cover"
          />
          <div>
            <h1 class="text-sm font-medium text-text"><?= esc($user && !empty($user->username) ? $user->username : ($loginInput ?? 'Guest')) ?></h1>
            <h1 class="text-xs text-text-sec"><?= esc($loginInput ?? ($user ? $user->email : 'guest@example.com')) ?></h1>
          </div>
          <svg width="11" height="6" viewBox="0 0 11 6" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M4.72207 5.78145C5.01504 6.07441 5.49082 6.07441 5.78379 5.78145L10.2838 1.28145C10.5768 0.988477 10.5768 0.512695 10.2838 0.219727C9.99082 -0.0732422 9.51504 -0.0732422 9.22207 0.219727L5.25176 4.19004L1.28145 0.22207C0.988477 -0.0708987 0.512695 -0.0708987 0.219727 0.22207C-0.0732422 0.515039 -0.0732422 0.99082 0.219727 1.28379L4.71973 5.78379L4.72207 5.78145Z" fill="#9CA3AF"/>
          </svg>
        </button>

        <!-- Dropdown Menu -->
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
