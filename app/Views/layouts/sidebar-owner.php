<?php $uri = ltrim(service('uri')->getPath(), '/');?>

<div x-data class="w-76 h-full bg-white px-5 pt-8 space-y-6 font-inter overflow-y-auto">

  <!-- Dashboard -->
  <div class="">
    <a href="<?= base_url('owner/dashboard') ?>" class="flex items-center gap-4 py-2 font-medium
      <?= ($uri === 'owner/dashboard') 
                ? 'text-sidebar-active' 
                : 'hover:bg-[#f6f6f6] text-black' ?>">
      <div class="w-6 h-6 flex justify-center items-center">
        <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M9.5625 8.4375V0.583594C9.5625 0.267188 9.80859 0 10.125 0C14.4738 0 18 3.52617 18 7.875C18 8.19141 17.7328 8.4375 17.4164 8.4375H9.5625ZM0 9.5625C0 5.29805 3.16758 1.76836 7.27734 1.20586C7.60078 1.16016 7.875 1.42031 7.875 1.74727V10.125L13.377 15.627C13.6125 15.8625 13.5949 16.2492 13.3242 16.4391C11.9461 17.4234 10.2586 18 8.4375 18C3.7793 18 0 14.2242 0 9.5625ZM18.5063 10.125C18.8332 10.125 19.0898 10.3992 19.0477 10.7227C18.777 12.6879 17.8312 14.4352 16.4496 15.7254C16.2387 15.9223 15.9082 15.9082 15.7043 15.7008L10.125 10.125H18.5063Z" fill="<?= ($uri === 'owner/dashboard') ? '#3B82F6' : '#374151' ?>"/>
        </svg>
      </div>
      <span>Dashboard</span>
    </a>
  </div>

  <div class="flex flex-col py-6 px-6 rounded-lg border-2 w-full border-[#0000002a] font-semibold">
    <h1 class="text-[20px]">Cabang A - Jakarta</h1>
    <p class="text-text-third text-sm">Jl. Pegangsaan Timur No. 56</p>
  </div> 

  <div class="py-6 px-6 rounded-lg border-2 w-full border-[#0000002a] font-semibold">
    <div class="flex flex-col gap-4">
      <h1 class="text-lg">Detail Operator</h1>
      <div class="flex items-center gap-4 text-sm">
        <img src="<?= base_url('images/DeliveryTime.svg') ?>" alt="Time" class="w-8 h-8 rounded-full">
        <p>13.57</p>
      </div>
      <div class="flex items-center gap-4 text-sm">
        <img src="<?= base_url('images/Calendar.svg') ?>" alt="Calendar" class="w-8 h-8 rounded-full">
        <p>2025 - 12 - 11</p>
      </div>
      <div class="flex items-center gap-4 text-sm">
        <img src="<?= base_url('images/MaleUser.svg') ?>" alt="User" class="w-8 h-8 rounded-full">
        <p>Rudi (Owner)</p>
      </div>
      <div class="flex items-center gap-4 text-sm">
        <img src="<?= base_url('images/Phone.svg') ?>" alt="Phone" class="w-8 h-8 rounded-full">
        <p>+1 234 567</p>
      </div>
    </div>
  </div>



  <!-- Kelola Cabang -->
  <div x-data="{ open: false }" class="">
    <button @click="open = !open" class="flex justify-between w-full py-2 items-center mb-1">
      <div class="flex items-center gap-4">
        <div class="w-6 h-6 flex justify-center items-center">
          <svg width="14" height="18" viewBox="0 0 14 18" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M1.6875 0C0.755859 0 0 0.755859 0 1.6875V16.3125C0 17.2441 0.755859 18 1.6875 18H5.0625V15.1875C5.0625 14.2559 5.81836 13.5 6.75 13.5C7.68164 13.5 8.4375 14.2559 8.4375 15.1875V18H11.8125C12.7441 18 13.5 17.2441 13.5 16.3125V1.6875C13.5 0.755859 12.7441 0 11.8125 0H1.6875ZM2.25 8.4375C2.25 8.12813 2.50312 7.875 2.8125 7.875H3.9375C4.24687 7.875 4.5 8.12813 4.5 8.4375V9.5625C4.5 9.87187 4.24687 10.125 3.9375 10.125H2.8125C2.50312 10.125 2.25 9.87187 2.25 9.5625V8.4375ZM6.1875 7.875H7.3125C7.62187 7.875 7.875 8.12813 7.875 8.4375V9.5625C7.875 9.87187 7.62187 10.125 7.3125 10.125H6.1875C5.87813 10.125 5.625 9.87187 5.625 9.5625V8.4375C5.625 8.12813 5.87813 7.875 6.1875 7.875ZM9 8.4375C9 8.12813 9.25313 7.875 9.5625 7.875H10.6875C10.9969 7.875 11.25 8.12813 11.25 8.4375V9.5625C11.25 9.87187 10.9969 10.125 10.6875 10.125H9.5625C9.25313 10.125 9 9.87187 9 9.5625V8.4375ZM2.8125 3.375H3.9375C4.24687 3.375 4.5 3.62812 4.5 3.9375V5.0625C4.5 5.37187 4.24687 5.625 3.9375 5.625H2.8125C2.50312 5.625 2.25 5.37187 2.25 5.0625V3.9375C2.25 3.62812 2.50312 3.375 2.8125 3.375ZM5.625 3.9375C5.625 3.62812 5.87813 3.375 6.1875 3.375H7.3125C7.62187 3.375 7.875 3.62812 7.875 3.9375V5.0625C7.875 5.37187 7.62187 5.625 7.3125 5.625H6.1875C5.87813 5.625 5.625 5.37187 5.625 5.0625V3.9375ZM9.5625 3.375H10.6875C10.9969 3.375 11.25 3.62812 11.25 3.9375V5.0625C11.25 5.37187 10.9969 5.625 10.6875 5.625H9.5625C9.25313 5.625 9 5.37187 9 5.0625V3.9375C9 3.62812 9.25313 3.375 9.5625 3.375Z" fill="#374151"/>
          </svg>
        </div>
        <span class="text-black font-medium">Penjualan</span>
      </div>

      <svg class="w-4 h-4 transition-transform duration-300" :class="open ? 'rotate-180' : ''" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
      </svg>
    </button>

    <!-- Smooth animation -->
    <div x-show="open" x-collapse class="flex flex-col text-sm space-y-1 overflow-hidden">
      <a href="<?= base_url('owner/input-penjualan') ?>" class="flex items-center gap-3 py-2 font-medium text-sm <?= ($uri === 'owner/input-penjualan' ? 'text-sidebar-active' : 'hover:bg-[#f6f6f6] text-text-third')?>">
        <div class="w-6 h-6 flex justify-center items-center">
          <svg width="6" height="6" viewBox="0 0 6 6" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="3" cy="3" r="3" fill="#7E7E7E"/>
          </svg>
        </div>
        <span>Input Penjualan Harian</span>
      </a>
    </div>
  </div>

  <!-- Laporan Global -->
  <div x-data="{ open: false }" class="">
    <button @click="open = !open" class="flex justify-between w-full py-2 items-center mb-1">
      <div class="flex items-center gap-4">
        <div class="w-6 h-6 flex justify-center items-center">
          <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M1.125 0C1.74727 0 2.25 0.502734 2.25 1.125V12.9375C2.25 13.2469 2.50312 13.5 2.8125 13.5H16.875C17.4973 13.5 18 14.0027 18 14.625C18 15.2473 17.4973 15.75 16.875 15.75H2.8125C1.25859 15.75 0 14.4914 0 12.9375V1.125C0 0.502734 0.502734 0 1.125 0ZM4.5 3.375C4.5 2.75273 5.00273 2.25 5.625 2.25H12.375C12.9973 2.25 13.5 2.75273 13.5 3.375C13.5 3.99727 12.9973 4.5 12.375 4.5H5.625C5.00273 4.5 4.5 3.99727 4.5 3.375ZM5.625 5.625H10.125C10.7473 5.625 11.25 6.12773 11.25 6.75C11.25 7.37227 10.7473 7.875 10.125 7.875H5.625C5.00273 7.875 4.5 7.37227 4.5 6.75C4.5 6.12773 5.00273 5.625 5.625 5.625ZM5.625 9H14.625C15.2473 9 15.75 9.50273 15.75 10.125C15.75 10.7473 15.2473 11.25 14.625 11.25H5.625C5.00273 11.25 4.5 10.7473 4.5 10.125C4.5 9.50273 5.00273 9 5.625 9Z" fill="#374151"/>
          </svg>


        </div>
        <span class="text-black font-medium">Transaksi</span>
      </div>

      <svg class="w-4 h-4 transition-transform duration-300" :class="open ? 'rotate-180' : ''" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
      </svg>
    </button>

    <!-- Smooth animation -->
    <div x-show="open" x-collapse class="flex flex-col text-sm space-y-1 overflow-hidden">
      <a href="<?= base_url('owner/riwayat-transaksi') ?>" class="flex items-center gap-3 py-2 font-medium text-sm <?= ($uri === 'owner/riwayat-transaksi' ? 'text-sidebar-active' : 'hover:bg-[#f6f6f6] text-text-third')?>">
        <div class="w-6 h-6 flex justify-center items-center">
          <svg width="6" height="6" viewBox="0 0 6 6" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="3" cy="3" r="3" fill="#7E7E7E"/>
          </svg>
        </div>
        <span>Riwayat Transaksi</span>
      </a>
    </div>
  </div>

  <!-- Kategori Barang -->
  <div x-data="{ open: false }" class="">
    <button @click="open = !open" class="flex justify-between w-full py-2 items-center mb-1">
      <div class="flex items-center gap-4">
        <div class="w-6 h-6 flex justify-center items-center">
          <svg width="18" height="15" viewBox="0 0 18 15" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0.75 6.4375V1.2375C0.75 1.10821 0.800571 0.984209 0.890589 0.892785C0.980606 0.801361 1.1027 0.75 1.23 0.75H6.1724C6.28681 0.749991 6.39745 0.791484 6.4844 0.867L9.0156 3.0705C9.10255 3.14602 9.21319 3.18751 9.3276 3.1875H16.27C16.333 3.1875 16.3955 3.20011 16.4537 3.22461C16.5119 3.24911 16.5648 3.28502 16.6094 3.33029C16.654 3.37555 16.6893 3.4293 16.7135 3.48844C16.7376 3.54759 16.75 3.61098 16.75 3.675V6.4375M0.75 6.4375V13.2625C0.75 13.3918 0.800571 13.5158 0.890589 13.6072C0.980606 13.6986 1.1027 13.75 1.23 13.75H16.27C16.3973 13.75 16.5194 13.6986 16.6094 13.6072C16.6994 13.5158 16.75 13.3918 16.75 13.2625V6.4375M0.75 6.4375H16.75" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>



        </div>
        <span class="text-black font-medium">Barang</span>
      </div>

      <svg class="w-4 h-4 transition-transform duration-300" :class="open ? 'rotate-180' : ''" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
      </svg>
    </button>

    <!-- Smooth animation -->
    <div x-show="open" x-collapse class="flex flex-col text-sm space-y-1 overflow-hidden">
      <a href="<?= base_url('owner/stok-barang') ?>" class="flex items-center gap-3 py-2 font-medium text-sm <?= ($uri === 'owner/stok-barang' ? 'text-sidebar-active' : 'hover:bg-[#f6f6f6] text-text-third')?>">
        <div class="w-6 h-6 flex justify-center items-center">
          <svg width="6" height="6" viewBox="0 0 6 6" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="3" cy="3" r="3" fill="#7E7E7E"/>
          </svg>
        </div>
        <span>Stok Kategori</span>
      </a>
    </div>
  </div>


</div>
