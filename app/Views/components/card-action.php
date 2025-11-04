<a href="<?= esc($link)?>" class="flex items-center gap-4 rounded-lg border border-[#E5E7EB] bg-white p-6 shadow-sm font-inter">
  <div class="flex h-12 w-12 items-center justify-center rounded-lg <?= $bg_icon ?>">
      <?= $icon ?? '
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M3 21h18M9 8h6m-7 4h8m-9 4h10M4 3h16a1 1 0 011 1v16a1 1 0 01-1 1H4a1 1 0 01-1-1V4a1 1 0 011-1z" />
          </svg>'
      ?>
  </div>
  <div class="flex flex-col gap-0.5">
      <p class="font-semibold text-[#1F2937]"><?= esc($title) ?></p>
      <h3 class="text-sm text-[#4B5563]"><?= esc($desc) ?></h3>
  </div>
    
</a>
