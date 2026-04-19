<?php
// Memulai sesi (berguna jika nanti ingin menyimpan data login)
session_start();

$error_message = "";

// Cek apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari inputan form
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    // Validasi sederhana
    if (empty($email) || empty($password)) {
        $error_message = "Harap masukkan alamat email dan kata sandi Anda.";
    } else {
        // DI SINI TEMPAT UNTUK LOGIKA DATABASE ANDA NANTINYA
        // Contoh sederhana:
        // if ($email == "user@gmail.com" && $password == "123456") { ... }
        
        $error_message = "Sistem database belum dihubungkan. Data ditangkap: " . htmlspecialchars($email);
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>FoodSave Indonesia - Masuk atau Daftar</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&family=Manrope:wght@400;500;600;700&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
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
        }
        .leaf-mask {
            border-radius: 3rem 1rem 3rem 1rem;
        }
        .tonal-transition {
            background: linear-gradient(180deg, rgba(249, 249, 246, 0) 0%, rgba(243, 244, 241, 1) 100%);
        }
        body {
          min-height: max(884px, 100dvh);
        }
    </style>
</head>
<body class="bg-surface text-on-surface font-body selection:bg-primary-fixed">
<main class="min-h-screen flex flex-col md:flex-row">
    <section class="relative w-full md:w-1/2 lg:w-3/5 bg-primary-container overflow-hidden p-8 md:p-16 flex flex-col justify-between min-h-[353px] md:min-h-screen">
        <div class="absolute inset-0 z-0">
            <img class="w-full h-full object-cover opacity-40 mix-blend-overlay" data-alt="Stunning close-up of vibrant fresh organic vegetables at a local Indonesian market with warm morning sunlight filtering through" src="https://lh3.googleusercontent.com/aida-public/AB6AXuC50cQPzTXNyk7fOiTww3nDuGdONQk3bHryV6HqJgn2-cWZfVDx4RQz-GpxdJPASe5VhQO9_avmdZKwc_6eJqtOiJdOSF00onP8K_hq9ucRMZG7WPGy-1dZ12_h-bkUr-7vha-ekBVNpoFO-vN9s7Q6cRqYz0wnE_EKqD5SeQ9n5XjqQ2ZFkmxNmc1NfJfmXego42O0miDPQYEsAN5566IJgwyXykKPLlbMw9CMUuUrakcCT0HEa_fB6SZwq___yeQ4W_uIUsPHtC_a"/>
            <div class="absolute inset-0 bg-gradient-to-tr from-primary/80 to-primary-container/40"></div>
        </div>
        <div class="relative z-10">
            <div class="flex items-center gap-3 mb-12">
                <div class="w-12 h-12 bg-surface-container-lowest leaf-mask flex items-center justify-center">
                    <span class="material-symbols-outlined text-primary text-3xl" data-icon="eco">eco</span>
                </div>
                <span class="font-headline font-extrabold text-2xl text-on-primary tracking-tighter">FoodSave Indonesia</span>
            </div>
            <h1 class="font-headline font-extrabold text-4xl md:text-6xl text-on-primary leading-tight max-w-xl">
                Nikmati Makanan Lezat, <span class="text-primary-fixed">Selamatkan Bumi.</span>
            </h1>
            <p class="mt-6 text-on-primary-container text-lg md:text-xl font-medium max-w-md leading-relaxed">
                Bergabunglah dengan ribuan orang yang menyelamatkan makanan surplus berkualitas dari restoran favorit di Indonesia.
            </p>
        </div>
        <div class="relative z-10 mt-auto pt-12 hidden md:block">
            <div class="bg-surface-container-lowest/10 backdrop-blur-md rounded-xl p-6 border border-white/10 max-w-sm">
                <div class="flex -space-x-3 mb-4">
                    <img class="w-10 h-10 rounded-full border-2 border-primary" data-alt="Portrait of a smiling young Indonesian woman using a smartphone in a casual setting" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBVimovC-DFrRaIXH-4fxEej6KrHwc12ltOldrM5_ph-odTDePQc6M4IKiEkUrwHZdCcnZqzJX1s3u0OOABLJXbMWtiKY76lHPWLxLY_Q88iInGOmwCSkrGby1T2-WOOUuZPzxaba1VO0zW4Lx9EQYqkIln6SVPsKOlVm0HsdhrBmPuSPP_8RplL-Of9FQM6m7-Ck7Qt2f80gcZV47Wh2lyY-qoTWoqyp3mdpePzRyciyY3qcLeoGT9qHRwX-02_4FbBTK3iht0faex"/>
                    <img class="w-10 h-10 rounded-full border-2 border-primary" data-alt="Close up portrait of a young man smiling at the camera outdoors" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDlZdCCskmj3qVQalRwuH6Nu3-NGW-PsCRn-OHYohb7OOsSoTC72oV5kpa7O9PUhfiZvmEZh1GyYWNjqZOVJL4y3P-v_wvpBNUz2B6FfSNHrxwa2VfxpX9bHlEuZQyb0VODp9cb-AH0ioq7khUSz2tpJhrcQYjMdkZRf2k3JsruJZIa3YVX8CZFUP9WGKV5bE1yWjVSv8L5wGV4q2cKfjFxEkSdlmGXR29jDZ3MOBxp8Omh5Njs3oatqRexMY9ZS4vDOTy9FenWdttm"/>
                    <img class="w-10 h-10 rounded-full border-2 border-primary" data-alt="Close up face of a woman with soft lighting and natural expression" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCps3WzxL-acvcljyAFF90L5tdnYHcbx6QCLbc7dB9GsM7T-9z728zwQIQwMAcxWy3v1z0fQHGeUd1lJRPK-gj7jtF-q5l23dTK0k7KiuypbHpcwRNPHchqJXDgcV9M2SWm_VD0D5GVezeKutjM7jLab7hdnar0_DuTSzMQP3JlvY4PHX5K6_Q4TCd9Mc6EoTRapHP5Zm8tOOAtDNdzDwZmuTMgEcddzzTv8U6PJY4xG_b10ANlOZYAJSHpBSjJgXjdvkXyzBsjW58k"/>
                    <div class="w-10 h-10 rounded-full border-2 border-primary bg-secondary-container flex items-center justify-center text-on-secondary text-xs font-bold">+2k</div>
                </div>
                <p class="text-on-primary font-semibold italic">"Aplikasi ini membantu saya menghemat uang sekaligus mengurangi sampah makanan di Jakarta!"</p>
            </div>
        </div>
    </section>

    <section class="w-full md:w-1/2 lg:w-2/5 bg-surface p-8 md:p-12 lg:p-20 flex flex-col justify-center">
        <div class="max-w-md mx-auto w-full">
            <div class="flex gap-8 mb-12 border-b border-outline-variant/15 pb-2">
                <button class="font-headline font-bold text-xl text-primary relative after:absolute after:-bottom-[10px] after:left-0 after:w-full after:h-1 after:bg-primary after:rounded-full">Masuk</button>
                <button class="font-headline font-bold text-xl text-on-surface-variant hover:text-on-surface transition-colors">Daftar</button>
            </div>
            
            <div class="space-y-8">
                <div>
                    <h2 class="text-2xl font-headline font-bold text-on-surface mb-2">Selamat Datang Kembali</h2>
                    <p class="text-on-surface-variant">Silakan masukkan detail akun Anda untuk melanjutkan penghematan.</p>
                </div>

                <?php if(!empty($error_message)): ?>
                <div class="bg-error-container text-on-error-container p-4 rounded-DEFAULT flex items-center gap-3">
                    <span class="material-symbols-outlined" data-icon="error">error</span>
                    <p class="text-sm font-medium"><?php echo $error_message; ?></p>
                </div>
                <?php endif; ?>

                <form class="space-y-6" action="" method="POST">
                    <div class="space-y-2">
                        <label class="block text-sm font-label font-bold text-on-surface tracking-wide uppercase" for="email">Alamat Email</label>
                        <div class="relative">
                            <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-on-surface-variant text-xl" data-icon="mail">mail</span>
                            <input id="email" name="email" class="w-full pl-12 pr-4 py-4 bg-surface-container-lowest border-none ring-1 ring-outline-variant/30 focus:ring-2 focus:ring-primary rounded-DEFAULT text-on-surface placeholder:text-outline transition-all" placeholder="nama@email.com" type="email" required/>
                        </div>
                    </div>
                    
                    <div class="space-y-2">
                        <div class="flex justify-between">
                            <label class="block text-sm font-label font-bold text-on-surface tracking-wide uppercase" for="password">Kata Sandi</label>
                            <a class="text-sm font-semibold text-primary hover:text-primary-container" href="#">Lupa Sandi?</a>
                        </div>
                        <div class="relative">
                            <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-on-surface-variant text-xl" data-icon="lock">lock</span>
                            <input id="password" name="password" class="w-full pl-12 pr-12 py-4 bg-surface-container-lowest border-none ring-1 ring-outline-variant/30 focus:ring-2 focus:ring-primary rounded-DEFAULT text-on-surface placeholder:text-outline transition-all" placeholder="••••••••" type="password" required/>
                            <button class="absolute right-4 top-1/2 -translate-y-1/2 text-on-surface-variant" type="button">
                                <span class="material-symbols-outlined" data-icon="visibility">visibility</span>
                            </button>
                        </div>
                    </div>
                    
                    <div class="flex items-center gap-3">
                        <input name="remember" class="w-5 h-5 rounded border-outline-variant text-primary focus:ring-primary" id="remember" type="checkbox"/>
                        <label class="text-sm text-on-surface-variant font-medium" for="remember">Ingat saya untuk 30 hari</label>
                    </div>
                    
                    <button type="submit" class="w-full py-4 bg-gradient-to-r from-primary to-primary-container text-on-primary font-headline font-bold text-lg rounded-DEFAULT hover:scale-[1.02] active:scale-95 transition-all flex items-center justify-center gap-2">
                        <span>Masuk</span>
                        <span class="material-symbols-outlined" data-icon="arrow_forward">arrow_forward</span>
                    </button>
                </form>

                <div class="relative py-4">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-outline-variant/20"></div>
                    </div>
                    <div class="relative flex justify-center text-sm uppercase">
                        <span class="bg-surface px-4 text-outline font-bold tracking-widest">Atau masuk dengan</span>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <button class="flex items-center justify-center gap-3 py-3 px-4 bg-surface-container-lowest ring-1 ring-outline-variant/30 rounded-DEFAULT hover:bg-surface-container-low transition-colors">
                        <img alt="Google" class="w-5 h-5" src="https://lh3.googleusercontent.com/aida-public/AB6AXuD5VmqQKdOWuY8eBQgtpSq0h4Ij1qANgRpYUN8idCyvrO0jmjMhZymDngigqwTEzSvAHE04y4WJCbPtt6tCMctlh0UYicIfFGS54Vy1Cqh2Q871WeEvwbCSnc0qiaf-cE1wsB9MrLnQGthaSzFfC7HFrN9YAEuOwRhH3jYovhSdTaHX_NYpu2nnTPikss0ZJRjUzXlPfY8sEg5G7rgQnOzoD3ju_59bPFmXVBBgRt1ErZjPhvyP4yCkMI1Aly20Ze9aHGzATPUqPTVC"/>
                        <span class="text-sm font-bold text-on-surface">Google</span>
                    </button>
                    <button class="flex items-center justify-center gap-3 py-3 px-4 bg-surface-container-lowest ring-1 ring-outline-variant/30 rounded-DEFAULT hover:bg-surface-container-low transition-colors">
                        <img alt="Facebook" class="w-5 h-5" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBlJIFhF7gCnrYje59J3cFxK40ypqMl_1tRXGtzbbmdOAetj6kiaCATIZz3kra8eqL2SFGBJgys57KQMQVEu3dztu-41gieCW-Is_pHgHVrm-lSX5-8DAA38l_ktOGzm44miTIwrsi7zEOrtPKhpV8ceCTePWiaKJkV1koZsJJKt6UtT90S2LIXDzcfkrNeR4F3S-ufZIx2F_UnB8bv7pb4PNGmpU7hvNoDpEp_IXDeJEcNlxwK6lXiY5uaW8T7cvPNiUxr6iwhF0We"/>
                        <span class="text-sm font-bold text-on-surface">Facebook</span>
                    </button>
                </div>

                <p class="text-center text-on-surface-variant text-sm md:hidden">
                    Belum punya akun? <a class="text-primary font-bold" href="#">Daftar sekarang</a>
                </p>
            </div>
        </div>
        
        <div class="fixed bottom-0 right-0 w-32 h-32 opacity-10 pointer-events-none translate-x-12 translate-y-12">
            <span class="material-symbols-outlined text-[120px] text-primary" data-icon="eco" style="font-variation-settings: 'FILL' 1;">eco</span>
        </div>
    </section>
</main>

<div class="hidden fixed inset-0 z-[100] items-center justify-center p-6 bg-on-surface/20 backdrop-blur-xl">
    <div class="bg-surface-container-lowest rounded-xl p-8 max-w-sm w-full text-center shadow-xl">
        <div class="w-20 h-20 bg-primary-fixed mx-auto rounded-full flex items-center justify-center mb-6">
            <span class="material-symbols-outlined text-primary text-4xl" data-icon="check_circle" style="font-variation-settings: 'FILL' 1;">check_circle</span>
        </div>
        <h3 class="font-headline font-bold text-2xl text-on-surface mb-2">Akun Berhasil Dibuat!</h3>
        <p class="text-on-surface-variant mb-8">Silakan cek email Anda untuk verifikasi dan mulai jelajahi FoodSave.</p>
        <button class="w-full py-4 bg-secondary-container text-on-secondary font-bold rounded-DEFAULT">Lanjut ke Beranda</button>
    </div>
</div>
</body>
</html>