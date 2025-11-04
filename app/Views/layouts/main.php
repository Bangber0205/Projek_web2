<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= esc($title_page ?? 'WarungKita') ?></title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style type="text/tailwindcss">
      @theme {
        --font-inter: Inter, sans-serif;

        --color-text: #111827;
        --color-text-sec: #6B7280;
        --color-text-third: #7E7E7E;
        --color-sidebar-active: #3B82F6;
      }
    </style>


    <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />    <!-- font inter -->
    <script src="https://unpkg.com/@alpinejs/collapse@3.x.x/dist/cdn.min.js" defer></script>
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>      <!-- alpine js -->
</head>
<body class="bg-[#F9FAFB] font-inter">

    <!-- Sidebar -->
    <?= view('layouts/navbar') ?>

    <div class="flex-1 flex min-h-screen pt-[75px]">
        <!-- Navbar -->
        <?= view('layouts/sidebar') ?>

        <!-- Konten utama -->
        <main class="p-6 flex-1">
            <?= $this->renderSection('content') ?>
        </main>
    </div>

</body>
</html>
