<?php
try {
    $dsn = 'mysql:host=localhost;dbname=Combat';
    $username = 'root';
    $password = '';

    $db = new PDO($dsn, $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) 
{
    die("Connection failed: " . $e->getMessage());
}
?>