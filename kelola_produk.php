<?php
/**
 * ============================================================
 * HALAMAN KELOLA PRODUK - FoodSave Indonesia
 * ============================================================
 * Halaman ini mengintegrasikan operasi CRUD (Create & Read)
 * dengan antarmuka pengguna. Data disimpan dalam file JSON.
 * ============================================================
 */

// 1) Include file fungsi CRUD
require_once __DIR__ . '/crud_functions.php';

// 2) Proses FORM jika ada POST request (CREATE / DELETE)
$flash_message = '';
$flash_type = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // --- Operasi CREATE ---
    if (isset($_POST['action']) && $_POST['action'] === 'create') {
        $newProduct = createProduct([
            'nama'       => trim($_POST['nama'] ?? ''),
            'kategori'   => trim($_POST['kategori'] ?? 'Lainnya'),
            'harga'      => $_POST['harga'] ?? 0,
            'harga_asli' => $_POST['harga_asli'] ?? 0,
            'stok'       => $_POST['stok'] ?? 0,
            'deskripsi'  => trim($_POST['deskripsi'] ?? ''),
            'co2_saved'  => $_POST['co2_saved'] ?? '0',
        ]);
        $flash_message = "Produk \"{$newProduct['nama']}\" berhasil ditambahkan dengan ID #{$newProduct['id']}!";
        $flash_type = 'success';

        // Redirect untuk mencegah duplicate submit (POST-Redirect-GET pattern)
        // Pada demo ini kita skip redirect agar flash message tampil
    }

    // --- Operasi DELETE ---
    if (isset($_POST['action']) && $_POST['action'] === 'delete') {
        $deleteId = (int) ($_POST['delete_id'] ?? 0);
        if (deleteProduct($deleteId)) {
            $flash_message = "Produk dengan ID #{$deleteId} berhasil dihapus!";
            $flash_type = 'success';
        } else {
            $flash_message = "Produk tidak ditemukan.";
            $flash_type = 'error';
        }
    }
}

// 3) READ - Ambil semua produk untuk ditampilkan
$products = getAllProducts();

// 4) Hitung statistik ringkasan
$total_products = count($products);
$total_stok = array_sum(array_column($products, 'stok'));
$total_co2 = array_sum(array_map(function ($p) {
    return (float) $p['co2_saved'];
}, $products));

// 5) Daftar kategori untuk dropdown
$kategori_list = ['Makanan Berat', 'Roti & Kue', 'Minuman', 'Snack', 'Buah & Sayur', 'Lainnya'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Produk - FoodSave Indonesia</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap');
        body { font-family: 'Plus Jakarta Sans', sans-serif; }

        /* Animasi fade-in untuk flash message */
        @keyframes slideDown {
            from { opacity: 0; transform: translateY(-12px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        .animate-slide-down { animation: slideDown 0.4s ease-out; }

        /* Animasi untuk card produk */
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(16px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in-up { animation: fadeInUp 0.5s ease-out both; }

        /* Toggle form animation */
        .form-container {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.5s ease, opacity 0.3s ease;
            opacity: 0;
        }
        .form-container.open {
            max-height: 800px;
            opacity: 1;
        }
    </style>
</head>

<body class="bg-gray-50 min-h-screen">

    <!-- ============================================ -->
    <!-- HEADER                                       -->
    <!-- ============================================ -->
    <header class="bg-gradient-to-r from-emerald-600 to-teal-600 shadow-lg">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 py-5">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-2xl font-extrabold text-white tracking-tight">🍽️ FoodSave Indonesia</h1>
                    <p class="text-emerald-100 text-sm mt-1">Panel Kelola Produk — CRUD dengan JSON Storage</p>
                </div>
                <div class="hidden sm:flex items-center gap-2 bg-white/15 backdrop-blur rounded-lg px-3 py-2">
                    <span class="text-white text-xs font-medium">📁 storage/products.json</span>
                </div>
            </div>
        </div>
    </header>

    <main class="max-w-4xl mx-auto px-4 sm:px-6 py-6 space-y-6">

        <!-- ============================================ -->
        <!-- FLASH MESSAGE (Notifikasi setelah aksi)      -->
        <!-- ============================================ -->
        <?php if ($flash_message): ?>
        <div class="animate-slide-down rounded-xl px-5 py-4 flex items-center gap-3 shadow-sm
            <?= $flash_type === 'success' ? 'bg-emerald-50 border border-emerald-200 text-emerald-800' : 'bg-red-50 border border-red-200 text-red-800' ?>">
            <span class="text-xl"><?= $flash_type === 'success' ? '✅' : '❌' ?></span>
            <p class="font-medium text-sm"><?= htmlspecialchars($flash_message) ?></p>
        </div>
        <?php endif; ?>

        <!-- ============================================ -->
        <!-- STATISTIK RINGKASAN (READ - agregasi data)   -->
        <!-- ============================================ -->
        <section class="grid grid-cols-3 gap-3 sm:gap-4">
            <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100 text-center">
                <p class="text-2xl sm:text-3xl font-extrabold text-emerald-600"><?= $total_products ?></p>
                <p class="text-xs sm:text-sm text-gray-500 mt-1 font-medium">Total Produk</p>
            </div>
            <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100 text-center">
                <p class="text-2xl sm:text-3xl font-extrabold text-blue-600"><?= $total_stok ?></p>
                <p class="text-xs sm:text-sm text-gray-500 mt-1 font-medium">Total Stok</p>
            </div>
            <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100 text-center">
                <p class="text-2xl sm:text-3xl font-extrabold text-amber-600"><?= number_format($total_co2, 1) ?> kg</p>
                <p class="text-xs sm:text-sm text-gray-500 mt-1 font-medium">CO₂ Diselamatkan</p>
            </div>
        </section>

        <!-- ============================================ -->
        <!-- TOMBOL TAMBAH PRODUK + FORM CREATE           -->
        <!-- ============================================ -->
        <section>
            <button onclick="toggleForm()" id="btnToggle"
                class="w-full sm:w-auto bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-3 px-6 rounded-xl transition-all shadow-md hover:shadow-lg flex items-center gap-2">
                <span id="btnIcon" class="text-lg">➕</span>
                <span id="btnText">Tambah Produk Baru</span>
            </button>

            <!-- FORM CREATE (tersembunyi, toggle dengan JS) -->
            <div id="formContainer" class="form-container mt-4">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
                    <div class="bg-emerald-50 px-6 py-4 border-b border-emerald-100">
                        <h2 class="font-bold text-emerald-800 text-lg">📝 Form Tambah Produk Baru</h2>
                        <p class="text-emerald-600 text-sm mt-1">Data akan disimpan ke file <code class="bg-emerald-100 px-1.5 py-0.5 rounded text-xs font-mono">storage/products.json</code></p>
                    </div>

                    <form method="POST" action="" class="p-6 space-y-5">
                        <input type="hidden" name="action" value="create">

                        <!-- Nama Produk -->
                        <div>
                            <label for="nama" class="block text-sm font-semibold text-gray-700 mb-1.5">Nama Produk <span class="text-red-500">*</span></label>
                            <input type="text" id="nama" name="nama" required placeholder="Contoh: Paket Nasi Goreng Spesial"
                                class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition">
                        </div>

                        <!-- Kategori + Stok (2 kolom) -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label for="kategori" class="block text-sm font-semibold text-gray-700 mb-1.5">Kategori</label>
                                <select id="kategori" name="kategori"
                                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition bg-white">
                                    <?php foreach ($kategori_list as $kat): ?>
                                        <option value="<?= $kat ?>"><?= $kat ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div>
                                <label for="stok" class="block text-sm font-semibold text-gray-700 mb-1.5">Stok</label>
                                <input type="number" id="stok" name="stok" min="0" value="1" placeholder="Jumlah stok"
                                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition">
                            </div>
                        </div>

                        <!-- Harga Asli + Harga Jual (2 kolom) -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label for="harga_asli" class="block text-sm font-semibold text-gray-700 mb-1.5">Harga Asli (Rp)</label>
                                <input type="number" id="harga_asli" name="harga_asli" min="0" required placeholder="35000"
                                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition">
                            </div>
                            <div>
                                <label for="harga" class="block text-sm font-semibold text-gray-700 mb-1.5">Harga Jual / Diskon (Rp) <span class="text-red-500">*</span></label>
                                <input type="number" id="harga" name="harga" min="0" required placeholder="22500"
                                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition">
                            </div>
                        </div>

                        <!-- CO2 Saved -->
                        <div>
                            <label for="co2_saved" class="block text-sm font-semibold text-gray-700 mb-1.5">CO₂ Diselamatkan (kg)</label>
                            <input type="text" id="co2_saved" name="co2_saved" placeholder="0.5"
                                class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition">
                        </div>

                        <!-- Deskripsi -->
                        <div>
                            <label for="deskripsi" class="block text-sm font-semibold text-gray-700 mb-1.5">Deskripsi</label>
                            <textarea id="deskripsi" name="deskripsi" rows="3" placeholder="Jelaskan produk secara singkat..."
                                class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition resize-none"></textarea>
                        </div>

                        <!-- Tombol Submit -->
                        <div class="flex gap-3 pt-2">
                            <button type="submit"
                                class="bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-3 px-8 rounded-lg transition-all shadow-md hover:shadow-lg">
                                💾 Simpan Produk
                            </button>
                            <button type="button" onclick="toggleForm()"
                                class="bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold py-3 px-6 rounded-lg transition-all">
                                Batal
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </section>

        <!-- ============================================ -->
        <!-- DAFTAR PRODUK (READ - tampilkan semua data)  -->
        <!-- ============================================ -->
        <section>
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-xl font-bold text-gray-800">📦 Daftar Produk</h2>
                <span class="text-sm text-gray-500 font-medium"><?= $total_products ?> produk ditemukan</span>
            </div>

            <?php if (empty($products)): ?>
                <!-- State: Kosong -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-10 text-center">
                    <p class="text-4xl mb-3">📭</p>
                    <h3 class="font-bold text-gray-700 text-lg">Belum Ada Produk</h3>
                    <p class="text-gray-500 text-sm mt-1">Klik tombol "Tambah Produk Baru" untuk memulai.</p>
                </div>
            <?php else: ?>
                <div class="space-y-3">
                <?php foreach ($products as $index => $product): ?>
                    <div class="animate-fade-in-up bg-white rounded-xl shadow-sm border border-gray-200 hover:shadow-md transition-shadow overflow-hidden"
                         style="animation-delay: <?= $index * 0.08 ?>s">
                        <div class="p-4 sm:p-5">
                            <div class="flex items-start justify-between gap-4">
                                <!-- Info Produk -->
                                <div class="flex-1 min-w-0">
                                    <div class="flex items-center gap-2 flex-wrap">
                                        <h3 class="font-bold text-gray-900 text-base"><?= htmlspecialchars($product['nama']) ?></h3>
                                        <span class="inline-block bg-emerald-100 text-emerald-700 text-xs font-semibold px-2 py-0.5 rounded-full">
                                            <?= htmlspecialchars($product['kategori']) ?>
                                        </span>
                                    </div>

                                    <p class="text-gray-500 text-sm mt-1.5 line-clamp-2"><?= htmlspecialchars($product['deskripsi']) ?></p>

                                    <div class="flex flex-wrap items-center gap-x-4 gap-y-1 mt-3 text-sm">
                                        <!-- Harga -->
                                        <div class="flex items-center gap-1.5">
                                            <span class="font-extrabold text-emerald-600"><?= formatRupiah($product['harga']) ?></span>
                                            <?php if ($product['harga_asli'] > $product['harga']): ?>
                                                <span class="text-gray-400 line-through text-xs"><?= formatRupiah($product['harga_asli']) ?></span>
                                                <span class="bg-red-100 text-red-600 text-xs font-bold px-1.5 py-0.5 rounded">
                                                    -<?= hitungDiskon($product['harga_asli'], $product['harga']) ?>%
                                                </span>
                                            <?php endif; ?>
                                        </div>

                                        <!-- Stok -->
                                        <span class="text-gray-500">📦 Stok: <strong class="text-gray-700"><?= $product['stok'] ?></strong></span>

                                        <!-- CO2 -->
                                        <?php if ((float)$product['co2_saved'] > 0): ?>
                                        <span class="text-emerald-600">🌱 <?= $product['co2_saved'] ?> kg CO₂</span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <!-- Tombol Hapus (DELETE) -->
                                <form method="POST" action="" onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                    <input type="hidden" name="action" value="delete">
                                    <input type="hidden" name="delete_id" value="<?= $product['id'] ?>">
                                    <button type="submit" title="Hapus produk"
                                        class="text-gray-400 hover:text-red-500 hover:bg-red-50 p-2 rounded-lg transition-colors">
                                        🗑️
                                    </button>
                                </form>
                            </div>

                            <!-- Footer: ID dan Tanggal -->
                            <div class="mt-3 pt-3 border-t border-gray-100 flex items-center justify-between text-xs text-gray-400">
                                <span>ID: #<?= $product['id'] ?></span>
                                <span>Ditambahkan: <?= $product['created_at'] ?></span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </section>

        <!-- ============================================ -->
        <!-- PREVIEW DATA JSON (menunjukkan isi file)     -->
        <!-- ============================================ -->
        <section class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
            <button onclick="toggleJson()" class="w-full px-6 py-4 flex items-center justify-between hover:bg-gray-50 transition-colors">
                <h2 class="font-bold text-gray-800">🗂️ Preview: storage/products.json</h2>
                <span id="jsonToggleIcon" class="text-gray-400 transition-transform">▼</span>
            </button>
            <div id="jsonPreview" class="hidden border-t border-gray-100">
                <pre class="p-5 text-xs sm:text-sm text-gray-700 overflow-x-auto bg-gray-50 leading-relaxed"><code><?= htmlspecialchars(json_encode($products, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)) ?></code></pre>
            </div>
        </section>

    </main>

    <!-- ============================================ -->
    <!-- FOOTER                                       -->
    <!-- ============================================ -->
    <footer class="max-w-4xl mx-auto px-6 py-6 text-center text-sm text-gray-400">
        FoodSave Indonesia &copy; 2026 — CRUD Demo dengan JSON File Storage
    </footer>

    <!-- ============================================ -->
    <!-- JAVASCRIPT                                   -->
    <!-- ============================================ -->
    <script>
        // Toggle Form Tambah Produk
        function toggleForm() {
            const form = document.getElementById('formContainer');
            const btnText = document.getElementById('btnText');
            const btnIcon = document.getElementById('btnIcon');

            form.classList.toggle('open');

            if (form.classList.contains('open')) {
                btnText.textContent = 'Tutup Form';
                btnIcon.textContent = '✖️';
                // Scroll ke form
                setTimeout(() => form.scrollIntoView({ behavior: 'smooth', block: 'nearest' }), 100);
            } else {
                btnText.textContent = 'Tambah Produk Baru';
                btnIcon.textContent = '➕';
            }
        }

        // Toggle JSON Preview
        function toggleJson() {
            const preview = document.getElementById('jsonPreview');
            const icon = document.getElementById('jsonToggleIcon');
            preview.classList.toggle('hidden');
            icon.style.transform = preview.classList.contains('hidden') ? '' : 'rotate(180deg)';
        }
    </script>

</body>
</html>
