<?php

namespace App\Controllers\SuperAdmin;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\BranchModel;
use App\Models\CategoryModel;
use App\Models\NotificationModel;

class Dashboard extends BaseController
{
    protected $notificationModel;

    public function __construct()
    {
        $this->notificationModel = new NotificationModel();
    }
    public function index()
    {
        $db = \Config\Database::connect();
        $totalUsers = $db->table('users')->where('deleted_at IS NULL')->countAllResults();
        $totalBranches = $db->table('branches')->countAllResults();

        $categoryModel = new CategoryModel();
        $categories = $categoryModel->getCategoriesWithItemCount();
        $totalProducts = 0;
        foreach ($categories as $category) {
            $totalProducts += $category['item_count'];
        }

        // Fetch branches from database
        $branchModel = new BranchModel();
        $branches = $branchModel->findAll();

        // Generate reports like in KeuanganCabangController
        $reports = [];
        if (!empty($branches)) {
            foreach ($branches as $branch) {
                // Generate 3 entries for different dates but with zero values since no transactions exist
                for ($i = 0; $i < 3; $i++) {
                    $date = date('Y-m-d', strtotime("-$i days"));
                    $reports[] = [
                        'cabang' => $branch['name'],
                        'tanggal' => $date,
                        'total_penjualan' => 'Rp 0', // Since no sales data exists, set to 0
                        'total_modal' => 'Rp 0', // Since no sales data exists, modal is also 0
                        'total_keuntungan' => 'Rp 0', // Since no sales data exists, profit is also 0
                        'jumlah_transaksi' => 0, // Since no sales data exists, transactions are also 0
                    ];
                }
            }
        }

        // Initialize branch performance array
        $branchPerformance = [];

        // If there are branches, generate performance data; otherwise, leave empty
        if (!empty($branches)) {
            foreach ($branches as $branch) {
                $status = $branch['status'] ?? 'aktif';
                $color = $status === 'aktif' ? '#22C55E' : '#EF4444';

                // Calculate total penjualan for the branch from reports
                $branchReports = array_filter($reports, function($report) use ($branch) {
                    return $report['cabang'] === $branch['name'];
                });
                $total_penjualan = 0;
                foreach ($branchReports as $report) {
                    $total_penjualan += (int)str_replace(['Rp ', '.'], '', $report['total_penjualan']);
                }
                $value = $total_penjualan > 0 ? 'Rp ' . number_format($total_penjualan, 0, ',', '.') : 'Rp 0';
                $percentage = '0%'; // No growth data available
                $color_percentage = 'text-gray-500';

                $branchPerformance[] = [
                    'status' => $status,
                    'color' => $color,
                    'title' => $branch['name'],
                    'value' => $value,
                    'percentase' => $percentage,
                    'color_percentase' => $color_percentage,
                ];
            }
        }
        // Fetch recent notifications for activity log
        $recentNotifications = $this->notificationModel->getNotifications(null, 10);
        $recentActivities = [];

        foreach ($recentNotifications as $notification) {
            $bg_icon = '';
            $icon = '';

            switch ($notification['type']) {
                case 'success':
                    $bg_icon = 'bg-[#DCFCE7]';
                    $icon = '✅';
                    break;
                case 'warning':
                    $bg_icon = 'bg-[#FEF9C3]';
                    $icon = '⚠️';
                    break;
                case 'error':
                    $bg_icon = 'bg-[#FEE2E2]';
                    $icon = '❌';
                    break;
                case 'info':
                default:
                    $bg_icon = 'bg-[#DBEAFE]';
                    $icon = 'ℹ️';
                    break;
            }

            $recentActivities[] = [
                'bg_icon' => $bg_icon,
                'icon' => $icon,
                'title' => $notification['title'] . ': ' . $notification['message'],
                'time' => $this->formatTimeAgo($notification['created_at']),
            ];
        }

        return view('superAdmin/dashboard', [
            'title_page' => 'Dashboard',
            'totalUsers' => $totalUsers,
            'totalBranches' => $totalBranches,
            'totalProducts' => $totalProducts,
            'branchPerformance' => $branchPerformance,
            'recentActivities' => $recentActivities,
        ]);
    }

    private function formatTimeAgo($dateString)
    {
        $date = new \DateTime($dateString);
        $now = new \DateTime();
        $interval = $now->diff($date);

        if ($interval->y > 0) {
            return $interval->y . ' tahun yang lalu';
        } elseif ($interval->m > 0) {
            return $interval->m . ' bulan yang lalu';
        } elseif ($interval->d > 0) {
            return $interval->d . ' hari yang lalu';
        } elseif ($interval->h > 0) {
            return $interval->h . ' jam yang lalu';
        } elseif ($interval->i > 0) {
            return $interval->i . ' menit yang lalu';
        } else {
            return 'Baru saja';
        }
    }
}
