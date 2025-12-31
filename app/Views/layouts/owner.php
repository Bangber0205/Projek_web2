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
<body class="bg-[#F9FAFB] font-inter overflow-hidden h-screen m-0 p-0">
    <style>
        html, body {
            margin: 0 !important;
            padding: 0 !important;
        }
        * {
            box-sizing: border-box;
        }
    </style>

    <!-- Navbar (Fixed at top) -->
    <?= view('layouts/navbar') ?>

    <div class="flex h-[calc(100vh-75px)] mt-[75px]">
        <!-- Sidebar (Fixed height with scroll) -->
        <?= view('layouts/sidebar-owner') ?>

        <!-- Konten utama (Independent scroll) -->
        <main class="flex-1 overflow-y-auto p-6">
            <?= $this->renderSection('content') ?>
        </main>
    </div>

</body>
</html>
