<?php
// Script untuk melihat struktur database
// Simpan file ini di root folder project Anda

// Konfigurasi database
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'jadwal_laboratorium';

try {
    // Koneksi ke database
    $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "<h1>Struktur Database: $database</h1>";
    
    // Ambil daftar semua tabel
    $stmt = $pdo->query("SHOW TABLES");
    $tables = $stmt->fetchAll(PDO::FETCH_COLUMN);
    
    echo "<h2>Daftar Tabel:</h2>";
    echo "<ul>";
    foreach ($tables as $table) {
        echo "<li><strong>$table</strong></li>";
    }
    echo "</ul>";
    
    // Tampilkan struktur setiap tabel
    foreach ($tables as $table) {
        echo "<h3>Struktur Tabel: $table</h3>";
        
        // Ambil informasi struktur tabel
        $stmt = $pdo->query("DESCRIBE `$table`");
        $columns = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        echo "<table border='1' style='border-collapse: collapse; width: 100%; margin-bottom: 20px;'>";
        echo "<tr style='background-color: #f0f0f0;'>";
        echo "<th>Field</th>";
        echo "<th>Type</th>";
        echo "<th>Null</th>";
        echo "<th>Key</th>";
        echo "<th>Default</th>";
        echo "<th>Extra</th>";
        echo "</tr>";
        
        foreach ($columns as $column) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($column['Field']) . "</td>";
            echo "<td>" . htmlspecialchars($column['Type']) . "</td>";
            echo "<td>" . htmlspecialchars($column['Null']) . "</td>";
            echo "<td>" . htmlspecialchars($column['Key']) . "</td>";
            echo "<td>" . htmlspecialchars($column['Default'] ?? 'NULL') . "</td>";
            echo "<td>" . htmlspecialchars($column['Extra']) . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        
        // Tampilkan CREATE TABLE statement
        echo "<h4>CREATE TABLE Statement:</h4>";
        $stmt = $pdo->query("SHOW CREATE TABLE `$table`");
        $createTable = $stmt->fetch(PDO::FETCH_ASSOC);
        echo "<pre style='background-color: #f5f5f5; padding: 10px; border-radius: 5px;'>";
        echo htmlspecialchars($createTable['Create Table']);
        echo "</pre>";
        echo "<hr>";
    }
    
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?> 