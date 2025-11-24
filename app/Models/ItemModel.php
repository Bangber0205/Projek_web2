<?php

namespace App\Models;

use CodeIgniter\Model;

class ItemModel extends Model
{
    protected $table = 'items'; 
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama_barang', 'kode_barang', 'kategori', 'harga', 'jumlah'];

    protected $validationRules = [
        'nama_barang' => 'required|max_length[255]',
        'kode_barang' => 'required|regex_match[/^[A-Z]{2,3}-\d+$/]|max_length[10]',
        'kategori' => 'required|max_length[100]',
        'harga' => 'required|integer|greater_than_equal_to[0]',
        'jumlah' => 'required|integer|greater_than_equal_to[0]',
    ];

    protected $validationMessages = [
        'kode_barang' => [
            'regex_match' => 'Kode Barang harus terdiri dari 2-3 huruf kapital diikuti tanda "-" dan angka, contoh: SBK-1',
        ],
        'harga' => [
            'integer' => 'Harga harus berupa angka',
            'greater_than_equal_to' => 'Harga tidak boleh kurang dari 0',
        ],
        'jumlah' => [
            'integer' => 'Jumlah harus berupa angka',
            'greater_than_equal_to' => 'Jumlah tidak boleh kurang dari 0',
        ],
    ];
}
