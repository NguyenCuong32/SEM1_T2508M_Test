<?php
try {
    $pdo = new PDO('mysql:host=localhost;port=3306', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec("CREATE DATABASE IF NOT EXISTS v_store");
    echo "Database v_store created successfully.";
} catch (PDOException $e) {
    die("DB Error: " . $e->getMessage());
}
