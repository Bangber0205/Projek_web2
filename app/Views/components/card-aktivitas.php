<div class="bg-[#F9FAFB] w-full flex justify-between items-center p-2 rounded-lg">
  <div class="flex gap-4 items-center">
    <div class="w-10 h-10 rounded-full flex justify-center items-center <?= esc($bg_icon) ?>">
      <?= $icon ?>
    </div>

    <div class="">
      <h1 class="font-medium text-[#1f2937]"><?= esc($title) ?></h1>
      <p class="text-[#4B5563] text-sm"><?= esc($time) ?></p>
    </div>
  </div>
</div>