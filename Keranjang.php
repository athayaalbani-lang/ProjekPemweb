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
        "image" => "https://lh3.googleusercontent.com/aida-public/AB6AXuBlU34DjqcILtQn52QbdA-GQwc6J7awCyw7RQEx8MGaEZRn-WL8zaAfPQxq2PwTiWg4wjk5GRmkryyrVJ37DfrqgVqKpB276Rvg8BMGVAV-2Cff19b0kV_Y8tfo4e6HWRz_pih5gNjR05ly6RG2VAyiJhHjM3jPVWCD1dNPxmgzu00er6-gmBbd2ocDTTDMaQ2rPi3P4MctwSGuPua7TSpOjOlFfyJZYi7z6kXuQrQkJ-PwdRXrE7wxeJU4aH1MKITMeYmAijqC29Ar",
        "type" => "warning"
    ],
    [
        "id" => 2,
        "nama" => "Ayam Goreng Kalasan",
        "harga" => 22500,
        "qty" => 2,
        "info" => "Penyelamatan 1.2kg CO2",
        "image" => "https://lh3.googleusercontent.com/aida-public/AB6AXuBBdMXvxdh3NfuuJMcUYbM19zUexBNQM6gcr2r27SBMn3RRGty2H3HrAsEWAvwo_jw6Ou6O1U9eNaeANAiW-L07Hglng-6gX1g2JECG6qNDV5KosPLl_YvVAc8CqqRLpdn5X9XL89ATgmbVXNa3-EvjNLdgg46angaTcHa4JgDg-19ybKAZNpGt-yisMTClnvmV_JfvRqchxT0sMmIbWhg_KyXyWI4739NqAfOFyyIxGfiTlo4o952IHeXhVMLeYNaZPxNNqOQ0gdL4",
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