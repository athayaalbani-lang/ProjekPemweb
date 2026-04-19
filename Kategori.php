<?php
// Data Pengguna (Simulasi data dari database)
$user = [
    'nama' => 'Budi',
    'makanan_diselamatkan' => 12.4,
    'level' => 'Pahlawan Pangan',
    'progress' => 75
];

// Data Produk (Membuat katalog menjadi dinamis)
$products = [
    [
        'id' => 1,
        'nama' => 'Paket Burger Spesial',
        'toko' => 'Burger King, Jakarta Selatan',
        'harga_diskon' => 25000,
        'harga_asli' => 65000,
        'tag' => 'Sisa 2 Porsi',
        'icon' => 'restaurant',
        'gambar' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuDlc5tA1YhY4AOIeyUj61QhzBSfVt4NETw53Nf8dS7BAIKRV3m8o7obNkWULJ5LDaBFOF670U9yu1TmQFQXX8S4huf8CaR1NfFnbGy3lf81ZWCi9SHLAbcE-Obm-cljXTt6QCQg0lT1e-QSrBX2S3XUZA26R7lWRnSkQ6WKeX3mRIWZK-1jJoeT6TUXSIjOW6MuhOHdjno6H_Agh_gxTTMZKjDqOepcXDhOmfJl_PAW6IvUQRGZd3aZaaLawLbnkzwKFu53VrVFoHqx'
    ],
    [
        'id' => 2,
        'nama' => 'Assorted Pastry Box',
        'toko' => 'BreadTalk, Grand Indonesia',
        'harga_diskon' => 35000,
        'harga_asli' => 90000,
        'tag' => 'Waktu Terbatas',
        'icon' => 'storefront',
        'gambar' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuALnJTrOKpvQO6pVLnVleRbV0KfCjVWjOlxhUYqmY-fujl4KcKkoKorGKiNbQgXpiWK2_-_md2x2130_yGYPLMsbW0iMy5RvR0xfFoGftRNb6vq_DvghuZAfgbmBhokU8VpPhDmEWhNsxZLrzYm2NLRB8TIznR1Y5g_1fTRCjsHp4Qu-ZxJPMbRBr1-2L2-SSGn1S3oOOIWwplLCLZaQDej2PcEH1XAwzrt5cBC-RnGchZp8Il2oXJtQYpFQYgMrMzfkJuZ60JWCiBH'
    ],
    [
        'id' => 3,
        'nama' => 'Green Power Salad Bowl',
        'toko' => 'SaladStop!, Senayan City',
        'harga_diskon' => 45000,
        'harga_asli' => 110000,
        'tag' => 'Sangat Segar',
        'icon' => 'restaurant',
        'gambar' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuBkoVAnEKgjddkhIwWqA7RFlsj_FAmicau4924Pk55cNYxo2Jkes2VqaVGnUvF_AVGy_oDETsCWLEd8CSmQIEL3DndprOwGYTNCRAwf6Xw-PN7vX0E8RpZGTry_Msf0_MSu3aNZcV_pbDnRta9cj9678NERjodx3FJmhkcOc9YzhTSkTUu6y6Lk9i-ZpYLtxNJ4jiXKYjdGZo7Uh6c-WUKnlTRFmhbB1seXqlPFmPFGHVmaO0DE4ELinZLNS6E5e28Xho4560GnhvlV'
    ],
    [
        'id' => 4,
        'nama' => 'Paket Nasi Campur Bali',
        'toko' => 'Bebek Bengil, Kemang',
        'harga_diskon' => 40000,
        'harga_asli' => 85000,
        'tag' => 'Baru Masuk',
        'icon' => 'restaurant',
        'gambar' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCXAo71ESdjtO9sjMo_KkfkeIquQhFX3CoW0uZRQnN0KNfQK5KPtzSMhtt-HZFAlazEV9b9rxA6xPAuuZLV9YJYVSf4GQ44Bl_2W18aVG3vH7Wss7RNQRUAjD8TMjO8ElyII9Ph73pccdvG9snXugzDRNGbdIF81zyuUWiNa8EE3TpHcvRy63QtDCAUbhVTDWjBaUfG-I6uu59dTxvXxj2-nZz3Urkr9GH5Y2MuDlw1oCzSOnWRw8Fnw7a2DQ-_CILVuXAevof5Q1AK'
    ]
];

// Fungsi Helper untuk format mata uang
function formatRupiah($angka) {
    return "Rp " . number_format($angka, 0, ',', '.');
}
?>

<!DOCTYPE html>
<html class="light" lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>FoodSave Indonesia - Kategori</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script id="tailwind-config">
      tailwind.config = {
        darkMode: "class",
        theme: {
          extend: {
            "colors": {
                    "on-primary-container": "#cbffc2",
                    "tertiary": "#734e00",
                    "tertiary-container": "#926500",
                    "on-tertiary-container": "#ffefda",
                    "on-primary-fixed": "#002204",
                    "on-secondary-container": "#5e2c00",
                    "on-secondary-fixed-variant": "#723600",
                    "inverse-primary": "#88d982",
                    "error": "#ba1a1a",
                    "on-tertiary": "#ffffff",
                    "on-background": "#1a1c1a",
                    "secondary-fixed": "#ffdcc6",
                    "error-container": "#ffdad6",
                    "surface-container-low": "#f3f4f1",
                    "surface-variant": "#e2e3e0",
                    "surface-container-high": "#e8e8e5",
                    "on-primary-fixed-variant": "#005312",
                    "surface-bright": "#f9f9f6",
                    "surface-container-highest": "#e2e3e0",
                    "surface-tint": "#1b6d24",
                    "primary-fixed": "#a3f69c",
                    "surface": "#f9f9f6",
                    "primary-container": "#2e7d32",
                    "primary-fixed-dim": "#88d982",
                    "outline-variant": "#bfcaba",
                    "on-secondary-fixed": "#311300",
                    "tertiary-fixed": "#ffdeac",
                    "on-tertiary-fixed-variant": "#604100",
                    "secondary": "#964900",
                    "on-tertiary-fixed": "#281900",
                    "background": "#f9f9f6",
                    "surface-dim": "#dadad7",
                    "surface-container": "#eeeeeb",
                    "inverse-surface": "#2f312f",
                    "on-primary": "#ffffff",
                    "surface-container-lowest": "#ffffff",
                    "primary": "#0d631b",
                    "on-surface": "#1a1c1a",
                    "secondary-container": "#fc820c",
                    "on-secondary": "#ffffff",
                    "secondary-fixed-dim": "#ffb786",
                    "inverse-on-surface": "#f1f1ee",
                    "outline": "#707a6c",
                    "on-error-container": "#93000a",
                    "tertiary-fixed-dim": "#ffba38",
                    "on-error": "#ffffff",
                    "on-surface-variant": "#40493d"
            },
            "borderRadius": {
                    "DEFAULT": "1rem",
                    "lg": "2rem",
                    "xl": "3rem",
                    "full": "9999px"
            },
            "fontFamily": {
                    "headline": ["Plus Jakarta Sans"],
                    "body": ["Manrope"],
                    "label": ["Manrope"]
            }
          },
        },
      }
    </script>
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
            display: inline-block;
            line-height: 1;
            text-transform: none;
            letter-spacing: normal;
            word-wrap: normal;
            white-space: nowrap;
            direction: ltr;
        }
        .asymmetric-leaf {
            border-top-left-radius: 3rem;
            border-bottom-right-radius: 1rem;
            border-top-right-radius: 1rem;
            border-bottom-left-radius: 1rem;
        }
        body { min-height: max(884px, 100dvh); }
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</head>
<body class="bg-surface font-body text-on-surface antialiased">

<header class="fixed top-0 w-full z-50 bg-[#f9f9f6]/80 backdrop-blur-xl flex justify-between items-center px-6 py-4">
    <div class="flex items-center gap-3">
        <div class="w-10 h-10 rounded-full overflow-hidden bg-stone-200">
            <img alt="User profile" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCNhG3Pje29vdjX328SGVmXOlzys_pIrJY0C3OVoVSCo_ndc65TBEoVYTobYUkE6SU_b7M5h3y7cRZ0epZKLRFN268Udjrt4LEM1fRSN_I9oIN2zHrGLD5VvWxa-xq_iM3_rbwQXMbB_9AXL8d_0XN9o_M1yvwUK0tcbtlRkLALSBg-zl97o4Lv3CTX-rQ-2kYG51WV8xHvrJ4NK56K2Z-aO2qGlY2O_dpdjNksADatjiH7ULcs7sTRQSHCXT7iv8mSg-zai2lbi1hb"/>
        </div>
        <span class="text-green-900 font-extrabold tracking-tighter font-headline text-lg">FoodSave Indonesia</span>
    </div>
    <div class="flex items-center gap-4">
        <button class="p-2 rounded-full hover:bg-stone-200/50 transition-colors active:scale-95">
            <span class="material-symbols-outlined text-green-800">shopping_cart</span>
        </button>
    </div>
</header>

<main class="pt-24 pb-32 px-6 max-w-5xl mx-auto">
    <section class="mb-10 relative overflow-hidden bg-primary-container rounded-xl p-8 text-on-primary-container">
        <div class="relative z-10">
            <h1 class="font-headline font-extrabold text-3xl tracking-tight mb-2">Selamat Datang, <?php echo $user['nama']; ?>!</h1>
            <p class="font-body text-sm opacity-90 max-w-[240px] mb-6">Kamu telah menyelamatkan <?php echo $user['makanan_diselamatkan']; ?>kg makanan bulan ini.</p>
            <div class="bg-black/10 rounded-full h-2 w-full mb-2">
                <div class="bg-primary-fixed h-full rounded-full" style="width: <?php echo $user['progress']; ?>%"></div>
            </div>
            <div class="flex justify-between text-[11px] font-bold uppercase tracking-wider">
                <span>Level: <?php echo $user['level']; ?></span>
                <span><?php echo $user['progress']; ?>% to Next Badge</span>
            </div>
        </div>
        <div class="absolute -right-10 -bottom-10 w-48 h-48 opacity-20">
            <span class="material-symbols-outlined text-[180px]">eco</span>
        </div>
    </section>

    <div class="flex gap-3 overflow-x-auto pb-6 -mx-6 px-6 no-scrollbar">
        <?php 
        $categories = ['Semua', 'Restoran', 'Toko Roti', 'Buah & Sayur', 'Minuman'];
        foreach ($categories as $index => $cat): 
            $class = ($index === 0) ? 'bg-primary text-on-primary' : 'bg-surface-container-low text-on-surface-variant hover:bg-stone-200';
        ?>
            <button class="<?php echo $class; ?> px-6 py-2.5 rounded-full font-label font-bold text-sm whitespace-nowrap transition-colors">
                <?php echo $cat; ?>
            </button>
        <?php endforeach; ?>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <?php foreach ($products as $item): ?>
        <div class="bg-surface-container-lowest asymmetric-leaf overflow-hidden group">
            <div class="h-56 relative overflow-hidden">
                <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" src="<?php echo $item['gambar']; ?>" alt="<?php echo $item['nama']; ?>"/>
                <div class="absolute top-4 left-4">
                    <span class="bg-tertiary-container text-on-tertiary-container px-3 py-1 rounded-full text-[10px] font-extrabold uppercase tracking-widest">
                        <?php echo $item['tag']; ?>
                    </span>
                </div>
            </div>
            <div class="p-6">
                <div class="flex justify-between items-start mb-1">
                    <h3 class="font-headline font-bold text-lg leading-tight text-on-surface"><?php echo $item['nama']; ?></h3>
                    <span class="material-symbols-outlined text-green-700 text-lg">favorite</span>
                </div>
                <p class="text-sm text-on-surface-variant mb-4 font-medium flex items-center gap-1">
                    <span class="material-symbols-outlined text-[16px]"><?php echo $item['icon']; ?></span>
                    <?php echo $item['toko']; ?>
                </p>
                <div class="flex items-center gap-3 mb-6">
                    <span class="text-primary font-extrabold text-xl font-headline"><?php echo formatRupiah($item['harga_diskon']); ?></span>
                    <span class="text-on-surface-variant line-through text-sm opacity-60"><?php echo formatRupiah($item['harga_asli']); ?></span>
                </div>
                <button class="w-full bg-gradient-to-r from-primary to-primary-container text-on-primary py-4 rounded-DEFAULT font-headline font-bold flex items-center justify-center gap-2 active:scale-95 transition-transform">
                    <span class="material-symbols-outlined">add_shopping_cart</span>
                    Tambah ke Keranjang
                </button>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <section class="mt-16 grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="bg-secondary-fixed p-8 rounded-xl flex flex-col justify-center">
            <h2 class="font-headline font-extrabold text-2xl text-on-secondary-fixed mb-4">Misi Kita Bersama</h2>
            <p class="text-on-secondary-fixed-variant font-medium leading-relaxed mb-6">Setiap keranjang yang kamu beli mengurangi emisi karbon dan membantu lingkungan kita tetap hijau.</p>
            <div class="flex items-center gap-4">
                <div class="flex -space-x-3">
                    <div class="w-8 h-8 rounded-full border-2 border-secondary-fixed bg-stone-300"></div>
                    <div class="w-8 h-8 rounded-full border-2 border-secondary-fixed bg-stone-400"></div>
                    <div class="w-8 h-8 rounded-full border-2 border-secondary-fixed bg-stone-500"></div>
                </div>
                <span class="text-xs font-bold uppercase tracking-tight text-on-secondary-fixed">2,400+ Orang Bergabung</span>
            </div>
        </div>
        <div class="relative rounded-xl overflow-hidden min-h-[200px]">
            <img class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBllCY82wOAq05XH4Y5RGUCg6nRzErMcq2mmEMzIU44ZNHgDoFurZtP5LI3fCkoAEJaDzCtG5L-SzmEH2mj7Md9JMB19vSepQrp0V2PkaYUeAvRwJvycOGzCOKlrFWYp5YHosAawre5hVOF28h_dtK4RP6IO6QaUXfZ43YhMDA2O7J0v0bLhxOLDE1iarxytOchzJz_3f4ZPrqqo3_AnSpfSd3c0WTrIs5elvVmgwxjD-Vf17Tohk7y8jsbwYsMC-CbrwzZ2yKCg1yr" alt="Fresh vegetables"/>
            <div class="absolute inset-0 bg-gradient-to-t from-primary/60 to-transparent flex items-end p-8">
                <span class="text-on-primary font-headline font-bold text-lg">Segar Dari Pasar Lokal</span>
            </div>
        </div>
    </section>
</main>

<nav class="fixed bottom-0 left-0 w-full flex justify-around items-center px-4 pb-6 pt-3 bg-[#f9f9f6]/80 backdrop-blur-xl z-50 rounded-t-[3rem] shadow-[0_-12px_32px_rgba(26,28,26,0.06)]">
    <a class="flex flex-col items-center justify-center bg-[#ffdcc6] text-orange-900 rounded-full px-5 py-2 active:scale-90 duration-200" href="#">
        <span class="material-symbols-outlined text-[24px]" style="font-variation-settings: 'FILL' 1;">home</span>
        <span class="font-semibold text-[11px] uppercase tracking-widest mt-1">Home</span>
    </a>
    <a class="flex flex-col items-center justify-center text-stone-500 px-5 py-2 hover:text-green-600 active:scale-90 transition-all" href="#">
        <span class="material-symbols-outlined text-[24px]">shopping_basket</span>
        <span class="font-semibold text-[11px] uppercase tracking-widest mt-1">Cart</span>
    </a>
    <a class="flex flex-col items-center justify-center text-stone-500 px-5 py-2 hover:text-green-600 active:scale-90 transition-all" href="#">
        <span class="material-symbols-outlined text-[24px]">mountain_steam</span>
        <span class="font-semibold text-[11px] uppercase tracking-widest mt-1">Status</span>
    </a>
    <a class="flex flex-col items-center justify-center text-stone-500 px-5 py-2 hover:text-green-600 active:scale-90 transition-all" href="#">
        <span class="material-symbols-outlined text-[24px]">history</span>
        <span class="font-semibold text-[11px] uppercase tracking-widest mt-1">History</span>
    </a>
</nav>

</body>
</html>