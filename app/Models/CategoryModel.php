<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table            = 'categories';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['name', 'code', 'description', 'status', 'total_stock'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules      = [
        'name' => 'required|min_length[2]|max_length[100]',
        'code' => 'required|min_length[2]|max_length[20]|is_unique[categories.code,id,{id}]',
        'description' => 'permit_empty|max_length[500]',
        'status' => 'required|in_list[aktif,nonaktif]',
    ];
    protected $validationMessages   = [
        'name' => [
            'required' => 'Nama kategori wajib diisi',
            'min_length' => 'Nama kategori minimal 2 karakter',
            'max_length' => 'Nama kategori maksimal 100 karakter',
        ],
        'code' => [
            'required' => 'Kode kategori wajib diisi',
            'min_length' => 'Kode kategori minimal 2 karakter',
            'max_length' => 'Kode kategori maksimal 20 karakter',
            'is_unique' => 'Kode kategori sudah digunakan',
        ],
        'status' => [
            'required' => 'Status wajib dipilih',
            'in_list' => 'Status harus aktif atau nonaktif',
        ],
    ];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    protected $allowCallbacks = true;

    public function getCategoriesWithItemCount()
    {
        $builder = $this->db->table('categories');
        $builder->select('categories.*, COUNT(items.id) AS item_count');
        $builder->join('items', 'items.kategori = categories.code', 'left');
        $builder->groupBy('categories.id');
        return $builder->get()->getResultArray();
    }
    public function recalculateTotalStock()
    {
        $itemTotals = $this->db->table('items')
            ->select('kategori, SUM(jumlah) as total_jumlah')
            ->groupBy('kategori')
            ->get()
            ->getResultArray();

        $categories = $this->findAll();

        foreach ($categories as $category) {
            $this->update($category['id'], ['total_stock' => 0]);
        }

        foreach ($itemTotals as $itemTotal) {
            $category = $this->where('code', $itemTotal['kategori'])->first();
            if ($category) {
                $this->update($category['id'], ['total_stock' => $itemTotal['total_jumlah']]);
            }
        }
    }
}
