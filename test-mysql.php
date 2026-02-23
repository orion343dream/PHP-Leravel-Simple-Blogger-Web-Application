<?php

$passwords = ['', 'password', 'secret', 'herd', 'root'];
$host = '127.0.0.1';
$port = '3306';
$user = 'root';

echo "Testing MySQL Connection Options...\n\n";

foreach ($passwords as $pw) {
    try {
        $displayPw = $pw === '' ? '(empty)' : $pw;
        echo "Testing password: {$displayPw}... ";
        
        $pdo = new PDO("mysql:host={$host};port={$port}", $user, $pw);
        
        echo "✓ SUCCESS!\n\n";
        echo "Your MySQL credentials:\n";
        echo "Host: {$host}\n";
        echo "Port: {$port}\n";
        echo "Username: {$user}\n";
        echo "Password: {$displayPw}\n\n";
        
        // Create database
        echo "Creating database 'laravel_internship'... ";
        $pdo->exec("CREATE DATABASE IF NOT EXISTS laravel_internship");
        echo "✓ Done!\n\n";
        
        echo "✅ Your .env should have:\n";
        echo "DB_CONNECTION=mysql\n";
        echo "DB_HOST={$host}\n";
        echo "DB_PORT={$port}\n";
        echo "DB_DATABASE=laravel_internship\n";
        echo "DB_USERNAME={$user}\n";
        echo "DB_PASSWORD={$pw}\n";
        
        exit(0);
        
    } catch (PDOException $e) {
        echo "✗ Failed\n";
    }
}

echo "\n❌ All password attempts failed.\n";
echo "Please check Laravel Herd dashboard for MySQL credentials.\n";
echo "Or try opening Herd and looking at the Database section.\n";
