<?php

namespace App\Controllers\SuperAdmin;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\BranchModel;
use App\Models\CategoryModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
        $totalUsers = $db->table('users')->countAllResults();
        $totalBranches = $db->table('branches')->countAllResults();

        $categoryModel = new CategoryModel();
        $totalActiveProducts = $categoryModel->selectSum('total_stock')
            ->where('status', 'aktif')
            ->first();

        $totalActiveProductsCount = $totalActiveProducts['total_stock'] ?? 0;
        $branchPerformance = [
            [
                'status' => 'aktif',
                'color' => '#22C55E',          
                'title' => 'Cabang Jakarta Pusat',
                'value' => '4.2M',             
                'percentase' => '+15%',
                'color_percentase' => 'text-green-500',
            ],
            [
                'status' => 'aktif',
                'color' => '#EAB308',          
                'title' => 'Cabang Surabaya',
                'value' => '2.1M',
                'percentase' => '-3%',
                'color_percentase' => 'text-red-500',
            ],
            [
                'status' => 'nonaktif',
                'color' => '#EF4444',         
                'title' => 'Cabang Medan',
                'value' => '',
                'percentase' => '',
                'color_percentase' => 'text-gray-500',
            ],
        ];
        $recentActivities = [
            [
                'bg_icon' => 'bg-[#DBEAFE]', 
                'icon' => '🏢',
                'title' => 'Cabang Jakarta Selatan ditambahkan',
                'time' => '2 jam yang lalu',
            ],
            [
                'bg_icon' => 'bg-[#DCFCE7]', 
                'icon' => '👤',
                'title' => 'Manager baru ditugaskan ke Cabang Bandung',
                'time' => '4 jam yang lalu',
            ],
            [
                'bg_icon' => 'bg-[#FEF9C3]', 
                'icon' => '🏷️',
                'title' => 'Kategori "Elektronik" diperbarui',
                'time' => '6 jam yang lalu',
            ],
            [
                'bg_icon' => 'bg-[#FEE2E2]',  
                'icon' => '⚠️',
                'title' => 'Stok rendah di Cabang Surabaya',
                'time' => '1 hari yang lalu',
            ],
        ];

        return view('superAdmin/dashboard', [
            'title_page' => 'Dashboard',
            'totalUsers' => $totalUsers,
            'totalBranches' => $totalBranches,
            'totalActiveProducts' => $totalActiveProductsCount,
            'branchPerformance' => $branchPerformance,
            'recentActivities' => $recentActivities,
        ]);
    }
}
