# Janji

Saya Marco Henrik Abineno dengan NIM 2301093 berjanji mengerjakan TP7 DPBO dengan keberkahan-Nya, maka saya tidak akan melakukan kecurangan sesuai yang telah di spesifikasikan, Aamiin

# **Desain**

![image](https://github.com/user-attachments/assets/76e128cb-e022-4bb6-a5dc-5d6694e4c78a)

  
Sistem ini merupakan aplikasi manajemen penjualan album musik berbasis PHP dan OOP. Sistem ini mempermudah pengelolaan data album, artis, dan riwayat penjualan.


## **Struktur Kelas**

### `Album.php`
- **Untuk:** Mengelola data album musik.
- **Properti:** `title`, `artist_id`, `price`.
- **Fungsi:**
  - `getAllAlbums($search)` – Menampilkan semua album, dengan dukungan pencarian.
  - `addAlbum($title, $artist_id, $price)` – Menambahkan album baru.
  - `editAlbum($id, $title, $artist_id, $price)` – Mengedit album.
  - `deleteAlbum($id)` – Menghapus album.

### `Artist.php`
- **Untuk:** Mengelola data artis/pencipta album.
- **Properti:** `name`.
- **Fungsi:**
  - `getAllArtists($search)` – Menampilkan semua artis, dengan dukungan pencarian.
  - `addArtist($name)` – Menambahkan artis baru.
  - `editArtist($id, $name)` – Mengubah data artis.
  - `deleteArtist($id)` – Menghapus data artis.

### `Sale.php`
- **Untuk:** Mengelola transaksi penjualan album.
- **Properti:** `album_id`, `quantity`, `sale_date`.
- **Fungsi:**
  - `getAllSales()` – Menampilkan semua transaksi penjualan.
  - `addSale($album_id, $quantity)` – Menambahkan data penjualan.
  - `editSale($id, $album_id, $quantity)` – Mengubah data penjualan.
  - `deleteSale($id)` – Menghapus transaksi penjualan.

### `Tambahan : Config\db.php`
- **Untuk:** koneksi database menggunakan PDO.

## **Struktur Database**

### Tabel `albums`
| Kolom         | Tipe       | Keterangan      |
|---------------|------------|-----------------|
| id            | INT (PK)   | ID Album        |
| title         | VARCHAR    | Judul Album     |
| artist_id     | INT (FK)   | Relasi ke artis |
| price         | DECIMAL    | Harga album     |

### Tabel `artists`
| Kolom | Tipe       | Keterangan  |
|-------|------------|-------------|
| id    | INT (PK)   | ID Artis    |
| name  | VARCHAR    | Nama artis  |

### Tabel `sales`
| Kolom      | Tipe       | Keterangan           |
|------------|------------|----------------------|
| id         | INT (PK)   | ID Penjualan         |
| album_id   | INT (FK)   | Relasi ke album      |
| quantity   | INT        | Jumlah terjual       |
| sale_date  | DATETIME   | Tanggal penjualan    |

# **Alur Program**

### Inisialisasi
- Program dimulai dari `index.php`.
- Koneksi database diinisialisasi melalui Config\ `db.php`.

### Navigasi dan Routing
- URL menggunakan `?page=` untuk menentukan halaman yang dimuat (`albums`, `artists`, `sales`).
- Parameter tambahan seperti `add`, `edit`, `delete` digunakan untuk aksi CRUD.

### Operasi CRUD

#### Tambah
- Menggunakan form HTML `POST`.
- Data dikirim ke metode `addAlbum()`, `addArtist()`, atau `addSale()`.

#### Lihat
- Data ditampilkan dalam tabel HTML dari hasil `getAll*()`.

#### Edit
- Form terisi otomatis dengan data lama.
- Data dikirim ke metode `edit*()` saat disubmit.

#### Hapus
- Konfirmasi penghapusan dilakukan via URL (GET).
- Menggunakan metode `delete*()`.

### Fungsi Pencarian
- Class Album dan Artist memiliki form pencarian (`search`).
- Parameter dikirim melalui URL dan digunakan di query SQL (LIKE).
- Diterapkan di metode `getAllAlbums()` dan `getAllArtists()`.
- 

# **Dokumentasi**
