<?php

namespace App\Models;

use CodeIgniter\Model;

class StokBarangModel extends Model
{
    protected $table = 'stok_barang';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'kode_barang',
        'nama_barang',
        'kategori',
        'harga',
        'jumlah_stok',
        'created_at',
        'updated_at',
    ];
}
