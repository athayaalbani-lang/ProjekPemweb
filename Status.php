<?php
// Simulasi Data dari Database atau API
$order = [
    'id' => 'FS-8829103',
    'date' => 'Today, 14:20',
    'pickup_code' => 'FS-12345',
    'status_current' => 2, // 1: Menunggu, 2: Siap Diambil, 3: Selesai
    'eta' => '12 Menit',
    'total_payment' => 'Rp 35.000'
];

$merchant = [
    'name' => "L'Artisan Boulangerie",
    'location' => 'Kemang, Jakarta Selatan',
    // Menggunakan placeholder image yang valid agar gambar terlihat
    'image' => 'https://ui-avatars.com/api/?name=L+A&background=F59E0B&color=fff&size=128' 
];

$items = [
    [
        'name' => 'Surprise Bag: Pastry',
        'desc' => '2-3 Items Mixed',
        'qty' => 1,
        // Menggunakan placeholder image yang valid agar gambar terlihat
        'image' => 'https://images.unsplash.com/photo-1495147466023-ac5c588e2e94?auto=format&fit=crop&q=80&w=100&h=100'
    ]
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Pesanan - <?= $order['id'] ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen font-sans antialiased text-gray-800">

    <div class="max-w-md mx-auto bg-gray-50 min-h-screen shadow-lg pb-10">
        
        <header class="bg-white p-4 shadow-sm sticky top-0 z-10 flex items-center justify-center">
            <h1 class="text-lg font-bold text-gray-800">Status Pesanan</h1>
        </header>

        <main class="p-4 space-y-5">
            
            <section class="bg-white p-4 rounded-2xl shadow-sm border border-gray-100 flex justify-between items-center">
                <div>
                    <p class="text-xs text-gray-500 font-medium uppercase tracking-wider mb-1">Order ID</p>
                    <p class="font-bold text-gray-900"><?= $order['id'] ?></p>
                </div>
                <div class="text-right">
                    <p class="text-xs text-gray-500 font-medium uppercase tracking-wider mb-1">Waktu</p>
                    <p class="font-bold text-gray-900"><?= $order['date'] ?></p>
                </div>
            </section>

            <section class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                <h2 class="font-extrabold text-xl mb-6 text-center text-gray-800">
                    <?php
                        if ($order['status_current'] == 1) echo "Menunggu Konfirmasi";
                        elseif ($order['status_current'] == 2) echo "Pesanan Siap Diambil!";
                        else echo "Pesanan Selesai";
                    ?>
                </h2>
                
                <div class="relative flex justify-between items-center z-0">
                    <div class="absolute left-0 top-4 w-full h-1 bg-gray-200 -z-10"></div>
                    <div class="absolute left-0 top-4 h-1 bg-green-500 -z-10 transition-all duration-500" 
                         style="width: <?= ($order['status_current'] == 1) ? '0%' : (($order['status_current'] == 2) ? '50%' : '100%') ?>;">
                    </div>

                    <div class="flex flex-col items-center bg-white px-2">
                        <div class="w-9 h-9 rounded-full flex items-center justify-center font-bold text-sm <?= $order['status_current'] >= 1 ? 'bg-green-500 text-white ring-4 ring-green-100' : 'bg-gray-200 text-gray-500' ?>">1</div>
                        <span class="text-xs mt-2 <?= $order['status_current'] >= 1 ? 'text-green-600 font-bold' : 'text-gray-400 font-medium' ?>">Menunggu</span>
                    </div>
                    <div class="flex flex-col items-center bg-white px-2">
                        <div class="w-9 h-9 rounded-full flex items-center justify-center font-bold text-sm <?= $order['status_current'] >= 2 ? 'bg-green-500 text-white ring-4 ring-green-100' : 'bg-gray-200 text-gray-500' ?>">2</div>
                        <span class="text-xs mt-2 <?= $order['status_current'] >= 2 ? 'text-green-600 font-bold' : 'text-gray-400 font-medium' ?>">Siap</span>
                    </div>
                    <div class="flex flex-col items-center bg-white px-2">
                        <div class="w-9 h-9 rounded-full flex items-center justify-center font-bold text-sm <?= $order['status_current'] >= 3 ? 'bg-green-500 text-white ring-4 ring-green-100' : 'bg-gray-200 text-gray-500' ?>">3</div>
                        <span class="text-xs mt-2 <?= $order['status_current'] >= 3 ? 'text-green-600 font-bold' : 'text-gray-400 font-medium' ?>">Selesai</span>
                    </div>
                </div>
            </section>

            <section class="bg-green-50 p-6 rounded-2xl shadow-sm border-2 border-green-400 text-center relative overflow-hidden">
                <div class="absolute top-0 right-0 w-16 h-16 bg-green-100 rounded-bl-full -mr-8 -mt-8 opacity-50"></div>
                <p class="text-green-800 text-sm font-semibold mb-2">Kode Pengambilan (PIN)</p>
                <p class="text-4xl font-black text-green-700 tracking-widest">
                    <?= $order['status_current'] >= 2 ? $order['pickup_code'] : '***-***' ?>
                </p>
                <?php if($order['status_current'] < 2): ?>
                    <p class="text-xs text-green-600 mt-2">Kode akan muncul saat pesanan siap.</p>
                <?php endif; ?>
            </section>

            <section class="bg-white p-4 rounded-2xl shadow-sm border border-gray-100 flex items-center gap-4">
                <div class="w-16 h-16 bg-gray-200 rounded-xl overflow-hidden shadow-sm flex-shrink-0">
                    <img src="<?= $merchant['image'] ?>" alt="<?= $merchant['name'] ?>" class="w-full h-full object-cover">
                </div>
                <div>
                    <h3 class="font-bold text-lg text-gray-900 leading-tight"><?= $merchant['name'] ?></h3>
                    <p class="text-gray-500 text-sm mt-1 flex items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <?= $merchant['location'] ?>
                    </p>
                </div>
            </section>

            <section class="bg-white p-4 rounded-2xl shadow-sm border border-gray-100 space-y-4">
                <h3 class="font-bold text-gray-800 border-b border-gray-100 pb-3">Detail Pesanan</h3>
                
                <?php foreach($items as $item): ?>
                <div class="flex items-center gap-4">
                     <div class="w-14 h-14 bg-gray-100 rounded-xl overflow-hidden border border-gray-200">
                        <img src="<?= $item['image'] ?>" alt="<?= $item['name'] ?>" class="w-full h-full object-cover">
                     </div>
                     <div class="flex-1">
                         <h4 class="font-bold text-gray-800"><?= $item['name'] ?></h4>
                         <p class="text-sm text-gray-500 mt-0.5"><?= $item['desc'] ?></p>
                     </div>
                     <div class="bg-gray-100 text-gray-800 font-bold px-3 py-1 rounded-lg">
                        x<?= $item['qty'] ?>
                     </div>
                </div>
                <?php endforeach; ?>
            </section>

            <section class="bg-white p-5 rounded-2xl shadow-sm border border-gray-100 space-y-3">
                <div class="flex justify-between items-center">
                    <span class="text-gray-500 text-sm font-medium">Estimasi Waktu Penjemputan</span>
                    <span class="font-bold text-gray-800 bg-blue-50 text-blue-700 px-2 py-1 rounded-md text-sm"><?= $order['eta'] ?></span>
                </div>
                <div class="flex justify-between items-center border-t border-gray-100 pt-3 mt-1">
                    <span class="text-gray-500 text-sm font-medium">Total Pembayaran</span>
                    <span class="font-black text-xl text-gray-900"><?= $order['total_payment'] ?></span>
                </div>
            </section>

        </main>
    </div>

</body>
</html>