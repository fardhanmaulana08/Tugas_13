<?php
/**
 * Setup Database Script
 * Membuat database baru dan tabel products
 */

try {
    // Koneksi ke MySQL tanpa database tertentu
    $pdo = new PDO('mysql:host=localhost:3308', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Buat database baru
    $pdo->exec("CREATE DATABASE IF NOT EXISTS tugas13_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");

    echo "Database 'tugas13_db' berhasil dibuat atau sudah ada.\n";

    // Pilih database
    $pdo->exec("USE tugas13_db");

    // Buat tabel products
    $sql = "
        CREATE TABLE IF NOT EXISTS products (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            description TEXT,
            price DECIMAL(10,2) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci
    ";

    $pdo->exec($sql);

    echo "Tabel 'products' berhasil dibuat atau sudah ada.\n";
    echo "Setup database selesai!\n";

} catch(PDOException $e) {
    die("Error: " . $e->getMessage());
}
