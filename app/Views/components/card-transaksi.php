<div class="w-full py-3">
    <div class="flex justify-between items-start">
        
        <div class="flex flex-col px-5">
            <h1 class="font-medium text-[#1f2937]"><?= esc($title) ?></h1>
            <p class="text-[#4B5563] text-sm"><?= esc($subtitle) ?></p>
        </div>

        <p class="text-[#1f2937] font-medium text-sm whitespace-nowrap">
            <?= esc($price) ?>
        </p>
    </div>

    <hr class="border-gray-200 mt-3">
</div>
