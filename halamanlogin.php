<?php
$error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    // Contoh validasi sederhana (nanti hubungkan ke Database)
    if ($email === "admin@foodsave.id" && $password === "password123") {
        // Redirect jika sukses
        header("Location: dashboard.php");
        exit();
    } else {
        $error_message = "Email atau kata sandi salah.";
    }
}
?>