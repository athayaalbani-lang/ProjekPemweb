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
    'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuDmRqzgsAqqJKnGZh9zNA24dfN7SA6b0ZVrcoTr_cYvwtvqV7B_HhArwrmzvOTRHofkZlfrRhHCOI0kYsiFbpec7DK3Kz7yFXUaJMLB_JbS1fv1st9ogfn_OE7JB1UZtRLJqQIuZoEu0qf3FUH26rnE81ewyvej79yeKaz2D38cliR2Dq77V93MDmjMbyIISxXvAuUsea4Na11xcd__mmT40NATrCUcoAHADkFY19FNLwch8HyTA0r5hNZs6-sDwz8KV1MpEsGSHGs1'
];

$items = [
    [
        'name' => 'Surprise Bag: Pastry',
        'desc' => '2-3 Items Mixed',
        'qty' => 1,
        'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCiTKBpFt6rJ6qWq4Z2qDo1qUwj_UnGYfPA0_jOshW33HBDVY9Rp7Y-YhgvPN9g3m2mYhmua61nO3co9KChj0QBPrXhhnb-DflUUr1Wo5kbETeBQYjKFXHtjIA3NWcOS2FE4aPAIt_-tMEblpzaL-72T1PtumyRf2J4fH6wrKkWVvxakFrfobKtcclWIhySZAUCbwlV8kNxpJXIDIEuojHaKS813XNkYnG1rWLK1ts7uQq2rQKdJgPmNtKClSPlS-aDO6jMyiKZdJ5i'
    ]
];
?>