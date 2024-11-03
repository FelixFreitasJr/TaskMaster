<?php
session_start();

$user = 'postgres.udewqztaiamosvawtzdv';
$password = 'Amnnp2980'; // Substitua por sua senha segura
$host = 'aws-0-sa-east-1.pooler.supabase.com';
$port = '6543';
$dbname = 'postgres';

$conn = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    if ($stmt->execute()) {
        $_SESSION['username'] = $username;
        header("Location: dashboard.html");
    } else {
        echo "Erro no registro!";
    }
}
?>
