<?php
session_start();

$host = 'udewqztaiamosvawtzdv.supabase.co';
$db = 'postgres';
$user = 'postgres';
$password = '(*)Amnnp2980'; // Substitua pela sua senha segura

try {
    $conn = new PDO("pgsql:host=$host;dbname=$db", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    if ($stmt->execute()) {
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
    } else {
        echo "Erro no registro!";
    }
}
?>
