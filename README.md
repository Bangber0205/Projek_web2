# WarungKita - Sistem Manajemen Warung Multi-Cabang

![CodeIgniter](https://img.shields.io/badge/CodeIgniter-4.6.3-orange)
![PHP](https://img.shields.io/badge/PHP-8.1+-blue)
![MySQL](https://img.shields.io/badge/MySQL-5.7+-green)

Sistem manajemen warung berbasis web yang dirancang untuk mengelola multiple cabang dengan role-based authentication (SuperAdmin & Owner).

## 📋 Daftar Isi

- [Fitur Utama](#-fitur-utama)
- [Teknologi](#-teknologi)
- [Persyaratan Sistem](#-persyaratan-sistem)
- [Instalasi](#-instalasi)
- [Konfigurasi Database](#-konfigurasi-database)
- [Menjalankan Aplikasi](#-menjalankan-aplikasi)
- [Login Credentials](#-login-credentials)
- [Dokumentasi Fitur](#-dokumentasi-fitur)
- [Troubleshooting](#-troubleshooting)

---

## 🚀 Fitur Utama

### Role-Based Access Control
- **SuperAdmin**: Akses penuh ke seluruh sistem
- **Owner**: Akses terbatas untuk manajemen cabang masing-masing

### Manajemen Multi-Cabang
- Kelola multiple cabang warung
- Track performa per cabang
- Laporan keuangan terpusat

### Sistem Penjualan
- Input penjualan harian
- Riwayat transaksi
- Laporan penjualan

### Manajemen Inventory
- Stok barang real-time
- Alert stok menipis
- Kategori produk

---

## 🛠 Teknologi

- **Backend**: CodeIgniter 4.6.3
- **Authentication**: Myth:Auth
- **Database**: MySQL/MariaDB
- **Frontend**: TailwindCSS, AlpineJS
- **PHP Version**: 8.1+

---

## 📦 Persyaratan Sistem

- PHP 8.1 atau lebih tinggi
- MySQL 5.7+ atau MariaDB 10.3+
- Composer
- Web Server (Apache/Nginx) atau PHP Built-in Server
- Extensions PHP yang diperlukan:
  - `intl`
  - `mbstring`
  - `json`
  - `mysqlnd`

---

## 💻 Instalasi

### 1. Clone Repository

```bash
git clone https://github.com/Bangber0205/Projek_web2.git
cd Projek_web2
```

### 2. Install Dependencies

```bash
composer install
```

### 3. Setup Environment File

Copy file `.env` example dan sesuaikan konfigurasi:

```bash
cp env .env
```

Atau di Windows:
```bash
copy env .env
```

---

## 🗄 Konfigurasi Database

### 1. Buat Database

Buat database baru di MySQL/MariaDB:

```sql
CREATE DATABASE db_warungkita;
```

### 2. Konfigurasi `.env`

Edit file `.env` dan sesuaikan dengan konfigurasi database Anda:

```env
database.default.hostname = localhost
database.default.database = db_warungkita
database.default.username = root
database.default.password = 
database.default.DBDriver = MySQLi
database.default.DBPrefix =
database.default.port = 3306
```

### 3. Jalankan Migration

Migration akan membuat semua tabel yang diperlukan:

```bash
php spark migrate
```

Tabel yang akan dibuat:
- `users` - Data pengguna
- `auth_groups` - Role/grup pengguna
- `auth_groups_users` - Relasi user dan grup
- `branches` - Data cabang
- `categories` - Kategori produk
- `items` - Data barang
- `stok_barang` - Stok inventory
- `feedbacks` - Feedback pelanggan

### 4. Jalankan Seeder

#### Opsi 1: Setup Lengkap (Recommended)

Jalankan UserSeeder yang akan otomatis membuat groups dan users:

```bash
php spark db:seed UserSeeder
```

Seeder ini akan:
- Membuat 2 groups: `superadmin` dan `owner`
- Membuat 2 users dengan credentials berikut:
  - **SuperAdmin**: `superadmin@warungkita.com` / `admin123`
  - **Owner**: `owner@warungkita.com` / `owner123`

#### Opsi 2: Setup Manual

Jika ingin setup step-by-step:

```bash
# 1. Buat groups
php spark db:seed GroupSeeder

# 2. Assign users ke groups (untuk existing users)
php spark db:seed AssignGroupSeeder
```

---

## 🎯 Menjalankan Aplikasi

### Menggunakan PHP Built-in Server

```bash
php spark serve
```

Aplikasi akan berjalan di: `http://localhost:8080`

### Menggunakan Apache/Nginx

Arahkan document root ke folder `public/`:
```
/path/to/Projek_web2/public
```

---

## 🔐 Login Credentials

Setelah menjalankan seeder, gunakan credentials berikut:

### SuperAdmin
- **Email**: `superadmin@warungkita.com`
- **Password**: `admin123`
- **Akses**: Full access ke semua fitur

### Owner
- **Email**: `owner@warungkita.com`
- **Password**: `owner123`
- **Akses**: Manajemen cabang terbatas

---

## 📚 Dokumentasi Fitur

### 🔵 Fitur SuperAdmin

#### 1. Dashboard
- Overview statistik global semua cabang
- Grafik penjualan
- Summary keuangan

#### 2. Kelola Cabang
- **Daftar Cabang**: Lihat semua cabang yang terdaftar
- **Tambah Cabang**: Registrasi cabang baru dengan informasi:
  - Nama cabang
  - Lokasi/alamat
  - Kontak (telepon & email)
  - Tanggal pembukaan
  - Status (aktif/non-aktif)
- **Edit Cabang**: Update informasi cabang
- **Hapus Cabang**: Soft delete cabang

#### 3. Kelola User
- **Daftar User**: Lihat semua pengguna sistem
- **Tambah User**: Buat akun baru untuk owner/admin
- **Edit User**: Update data pengguna
- **Hapus User**: Soft delete user
- **Assign Role**: Tentukan role user (superadmin/owner)

#### 4. Laporan Global
- **Laporan Penjualan**: 
  - Penjualan per cabang
  - Trend penjualan
  - Top selling products
- **Laporan Stok**:
  - Stok per cabang
  - Alert stok menipis
  - Riwayat pergerakan stok

#### 5. Keuangan
- **Laporan Keuangan Cabang**:
  - Revenue per cabang
  - Profit margin
  - Perbandingan performa cabang

#### 6. Kategori Barang
- **Daftar Kategori**: Manajemen kategori produk global
- **Daftar Barang**: Database produk untuk semua cabang

---

### 🟢 Fitur Owner

#### 1. Dashboard
- Statistik cabang yang dikelola
- Total penjualan hari ini
- Jumlah transaksi
- Stok menipis alert
- Grafik penjualan mingguan
- Transaksi terbaru

#### 2. Penjualan

##### Input Penjualan Harian
- Search barang berdasarkan nama
- Tambah item ke keranjang
- Set quantity per item
- Lihat total transaksi real-time
- Simpan transaksi
- Kosongkan keranjang

**Cara Penggunaan:**
1. Cari barang menggunakan search bar
2. Pilih quantity yang ingin dijual
3. Klik tombol "+" untuk tambah ke keranjang
4. Review keranjang di bagian bawah
5. Klik "Simpan Transaksi" untuk finalisasi
6. Stok akan otomatis berkurang

##### Riwayat Transaksi
- Lihat semua transaksi yang pernah dilakukan
- Filter berdasarkan tanggal
- Detail transaksi:
  - Nama barang & kode
  - Harga satuan
  - Jumlah terjual
  - Total harga
  - Tanggal transaksi
- Export laporan (fitur upcoming)

**Statistik Transaksi:**
- Total transaksi hari ini
- Jumlah transaksi
- Rata-rata nilai transaksi

#### 3. Barang

##### Stok Barang
- Lihat semua stok barang di cabang
- Informasi yang ditampilkan:
  - Kode barang
  - Nama barang
  - Kategori
  - Harga jual
  - Jumlah stok
- Edit stok barang
- Hapus barang

**Statistik Stok:**
- Total produk
- Stok menipis (alert)
- Stok habis (alert)

##### Tambah Barang
- Input barang baru ke inventory
- Field yang diperlukan:
  - Kode barang (format: ABC-1)
  - Nama barang
  - Kategori
  - Harga per item
  - Jumlah stok awal

##### Edit Barang
- Update informasi barang existing
- Adjust harga
- Update stok

---

## 🔧 Troubleshooting

### User tidak bisa login
**Pastikan**:
1. User sudah di-assign ke group (jalankan `UserSeeder`)
2. Email dan password benar
3. User status `active = 1` di database

### Stok tidak berkurang setelah transaksi
**Cek**:
1. Controller `InputPenjualanController` sudah update stok
2. Tidak ada error di console/log
3. Database connection berjalan normal

---

## 📁 Struktur Project

```
Projek_web2/
├── app/
│   ├── Config/
│   │   ├── Auth.php          # Konfigurasi Myth:Auth
│   │   ├── Routes.php        # Routing dengan role filter
│   │   └── Filters.php       # Register filters
│   ├── Controllers/
│   │   ├── AuthController.php        # Login/Register
│   │   ├── SuperAdmin/              # Controllers SuperAdmin
│   │   └── Owner/                   # Controllers Owner
│   ├── Database/
│   │   ├── Migrations/              # Database migrations
│   │   └── Seeds/
│   │       ├── GroupSeeder.php      # Seeder groups
│   │       ├── UserSeeder.php       # Seeder users
│   │       └── AssignGroupSeeder.php
│   ├── Filters/
│   │   └── RoleFilter.php           # Role-based filter
│   ├── Models/                       # Database models
│   └── Views/
│       ├── layouts/                  # Layout templates
│       ├── superAdmin/              # Views SuperAdmin
│       └── owner/                   # Views Owner
├── public/
│   └── index.php                    # Entry point
├── .env                             # Environment config
└── composer.json                    # Dependencies
```

---

## 🤝 Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

---

## 📝 License

This project is licensed under the MIT License.

---

## 👥 Authors

- **lvtsri** - [GitHub](https://github.com/lvtsri)
- **Bangber0205** - [GitHub](https://github.com/Bangber0205)
- **crashyet** - [GitHub](https://github.com/crashyet)

---

## 📞 Support

Jika ada pertanyaan atau issue, silakan buat issue di GitHub repository.

---

**Happy Coding! 🚀**
