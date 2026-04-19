<?php
// Logika Data (Biasanya data ini diambil dari Database atau Session)
$site_title = "Keranjang Belanja - FoodSave Indonesia";
$pickup_location = "Warung Makan Bahari, Jl. Sudirman No. 42";
$pickup_time = "18:00 - 20:00";

// Data Produk di Keranjang
$cart_items = [
    [
        "id" => 1,
        "nama" => "Paket Nasi Campur Hemat",
        "harga" => 15000,
        "qty" => 1,
        "info" => "Tersisa 2 jam sebelum kedaluwarsa",
        "image" => "https://ui-avatars.com/api/?name=Nasi+Campur&background=F59E0B&color=fff", // Placeholder image
        "type" => "warning"
    ],
    [
        "id" => 2,
        "nama" => "Ayam Goreng Kalasan",
        "harga" => 22500,
        "qty" => 2,
        "info" => "Penyelamatan 1.2kg CO2",
        "image" => "https://ui-avatars.com/api/?name=Ayam+Goreng&background=10B981&color=fff", // Placeholder image
        "type" => "eco"
    ]
];

// Perhitungan Ringkasan
$subtotal = 0;
foreach ($cart_items as $item) {
    $subtotal += ($item['harga'] * $item['qty']);
}

$diskon_rate = 0.30; // 30%
$diskon_nominal = $subtotal * $diskon_rate;
$biaya_layanan = 2000;
$total_bayar = $subtotal - $diskon_nominal + $biaya_layanan;

// Fungsi format rupiah
function formatRupiah($angka) {
    return "Rp " . number_format($angka, 0, ',', '.');
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $site_title; ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans text-gray-800 py-8 px-4">

    <div class="max-w-2xl mx-auto bg-white shadow-lg rounded-xl overflow-hidden">
        
        <div class="bg-emerald-600 px-6 py-4">
            <h1 class="text-2xl font-bold text-white">🛒 Keranjang Belanja</h1>
        </div>

        <div class="px-6 py-4 border-b border-gray-100 bg-emerald-50">
            <h2 class="font-semibold text-emerald-800 mb-2">Informasi Pengambilan (Pick-up)</h2>
            <div class="flex items-center text-sm text-gray-700 mb-1">
                <span class="mr-2">📍</span> <?= $pickup_location; ?>
            </div>
            <div class="flex items-center text-sm text-gray-700">
                <span class="mr-2">⏰</span> <?= $pickup_time; ?>
            </div>
        </div>

        <div class="px-6 py-4">
            <h2 class="font-semibold text-lg mb-4 text-gray-800">Daftar Pesanan</h2>
            <div class="space-y-4">
                <?php foreach ($cart_items as $item): ?>
                <div class="flex items-center p-3 border border-gray-200 rounded-lg hover:shadow-sm transition-shadow">
                    <img src="<?= $item['image']; ?>" alt="<?= $item['nama']; ?>" class="w-16 h-16 object-cover rounded-md border border-gray-100">
                    
                    <div class="ml-4 flex-1">
                        <h3 class="font-bold text-gray-800"><?= $item['nama']; ?></h3>
                        <p class="text-sm text-gray-500">
                            <?= $item['qty']; ?> x <?= formatRupiah($item['harga']); ?>
                        </p>
                        
                        <?php if ($item['type'] === 'warning'): ?>
                            <p class="text-xs font-medium text-amber-600 mt-1 flex items-center">
                                ⚠️ <span class="ml-1"><?= $item['info']; ?></span>
                            </p>
                        <?php elseif ($item['type'] === 'eco'): ?>
                            <p class="text-xs font-medium text-emerald-600 mt-1 flex items-center">
                                🌱 <span class="ml-1"><?= $item['info']; ?></span>
                            </p>
                        <?php endif; ?>
                    </div>
                    
                    <div class="font-bold text-gray-800">
                        <?= formatRupiah($item['harga'] * $item['qty']); ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="px-6 py-5 bg-gray-50 border-t border-gray-200">
            <h2 class="font-semibold text-lg mb-4 text-gray-800">Ringkasan Pembayaran</h2>
            
            <div class="space-y-2 text-sm">
                <div class="flex justify-between text-gray-600">
                    <span>Subtotal</span>
                    <span><?= formatRupiah($subtotal); ?></span>
                </div>
                <div class="flex justify-between text-emerald-600 font-medium">
                    <span>Diskon Penyelamatan (<?= $diskon_rate * 100; ?>%)</span>
                    <span>- <?= formatRupiah($diskon_nominal); ?></span>
                </div>
                <div class="flex justify-between text-gray-600">
                    <span>Biaya Layanan</span>
                    <span><?= formatRupiah($biaya_layanan); ?></span>
                </div>
            </div>

            <div class="flex justify-between items-center mt-4 pt-4 border-t border-gray-200">
                <span class="font-bold text-lg text-gray-800">Total Bayar</span>
                <span class="font-bold text-2xl text-emerald-600"><?= formatRupiah($total_bayar); ?></span>
            </div>
        </div>

        <div class="px-6 py-4 bg-white">
            <button class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-3 px-4 rounded-lg transition-colors shadow-md">
                Lanjut Pembayaran
            </button>
        </div>

    </div>

</body>
</html>