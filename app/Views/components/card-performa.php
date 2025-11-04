<div class="bg-[#F9FAFB] w-full flex justify-between items-center p-4 rounded-lg">
  <div class="flex gap-4 items-center">
    <svg width="8" height="8" viewBox="0 0 6 6" fill="none" xmlns="http://www.w3.org/2000/svg">
      <circle cx="3" cy="3" r="3" fill="<?= ($status === 'aktif') ? esc($color) : '#EF4444' ?>"/>
    </svg>

    <div class="">
      <h1 class="font-medium text-[#1f2937]"><?= esc($title) ?></h1>
      <p class="text-[#4B5563] text-sm"><?= ($status === 'aktif') ? 'Rp ' . esc($value) . ' hari ini' : 'Tidak aktif' ?></p>
    </div>
  </div>
  <p class="text-sm font-medium <?= ($status === 'aktif') ? esc($color_percentase) : 'text-[#6B7280]' ?>"><?= ($status === 'aktif') ? esc($percentase) : 'Offline' ?></p>
</div>