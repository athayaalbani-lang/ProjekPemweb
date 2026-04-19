<?php
/**
 * ============================================================
 * CRUD HELPER - FoodSave Indonesia
 * ============================================================
 * File ini berisi fungsi-fungsi CRUD yang menggunakan JSON
 * sebagai pengganti database. Data disimpan di folder /storage.
 * ============================================================
 */

// Path ke file JSON penyimpanan data produk
define('products.json', __DIR__ . '/storage/products.json');

/**
 * READ ALL - Membaca semua data produk dari file JSON
 * @return array
 */
function getAllProducts(): array
{
    // Cek apakah file JSON ada
    if (!file_exists(products.json)) {
        // Jika belum ada, buat file kosong
        file_put_contents(products.json, json_encode([]));
        return [];
    }

    // Baca isi file JSON
    $json = file_get_contents(products.json);

    // Decode JSON menjadi array PHP
    $products = json_decode($json, true);

    // Jika decode gagal, kembalikan array kosong
    return is_array($products) ? $products : [];
}

/**
 * READ ONE - Membaca satu produk berdasarkan ID
 * @param int $id
 * @return array|null
 */
function getProductById(int $id): ?array
{
    $products = getAllProducts();

    foreach ($products as $product) {
        if ($product['id'] === $id) {
            return $product;
        }
    }

    return null; // Tidak ditemukan
}

/**
 * CREATE - Menambahkan produk baru ke file JSON
 * @param array $data Data produk baru
 * @return array Produk yang baru dibuat (dengan ID)
 */
function createProduct(array $data): array
{
    // Ambil semua produk yang ada
    $products = getAllProducts();

    // Generate ID baru (ID tertinggi + 1)
    $maxId = 0;
    foreach ($products as $product) {
        if ($product['id'] > $maxId) {
            $maxId = $product['id'];
        }
    }
    $newId = $maxId + 1;

    // Susun data produk baru dengan struktur yang konsisten
    $newProduct = [
        'id'         => $newId,
        'nama'       => $data['nama'] ?? '',
        'kategori'   => $data['kategori'] ?? 'Lainnya',
        'harga'      => (int) ($data['harga'] ?? 0),
        'harga_asli' => (int) ($data['harga_asli'] ?? 0),
        'stok'       => (int) ($data['stok'] ?? 0),
        'deskripsi'  => $data['deskripsi'] ?? '',
        'co2_saved'  => $data['co2_saved'] ?? '0',
        'created_at' => date('Y-m-d H:i:s'),
    ];

    // Tambahkan ke array produk
    $products[] = $newProduct;

    // Simpan kembali ke file JSON (dengan format yang rapi)
    saveProducts($products);

    return $newProduct;
}

/**
 * DELETE - Menghapus produk berdasarkan ID
 * @param int $id
 * @return bool True jika berhasil dihapus
 */
function deleteProduct(int $id): bool
{
    $products = getAllProducts();
    $filtered = [];
    $found = false;

    foreach ($products as $product) {
        if ($product['id'] === $id) {
            $found = true; // Tandai bahwa produk ditemukan
            continue;      // Skip produk ini (tidak masukkan ke $filtered)
        }
        $filtered[] = $product;
    }

    if ($found) {
        saveProducts($filtered);
    }

    return $found;
}

/**
 * HELPER - Menyimpan array produk ke file JSON
 * @param array $products
 */
function saveProducts(array $products): void
{
    // JSON_PRETTY_PRINT agar file mudah dibaca manusia
    // JSON_UNESCAPED_UNICODE agar karakter Indonesia tidak di-escape
    file_put_contents(
        products.json,
        json_encode($products, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)
    );
}

/**
 * HELPER - Format angka ke format Rupiah
 * @param int $angka
 * @return string
 */
function formatRupiah(int $angka): string
{
    return "Rp " . number_format($angka, 0, ',', '.');
}

/**
 * HELPER - Hitung persentase diskon
 * @param int $hargaAsli
 * @param int $hargaDiskon
 * @return int
 */
function hitungDiskon(int $hargaAsli, int $hargaDiskon): int
{
    if ($hargaAsli <= 0) return 0;
    return (int) round((($hargaAsli - $hargaDiskon) / $hargaAsli) * 100);
}
