<?php
session_start();

$host = 'udewqztaiamosvawtzdv.supabase.co';
$db = 'postgres';
$user = 'postgres';
$password = '(*)Amnnp2980'; // Substitua pela sua chave de serviço

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
        header("Location: ..//index.php");
    } else {
        echo "Erro no registro!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar - TaskMaster</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <h2>Registrar</h2>
    <form method="post">
        <input type="text" name="username" placeholder="Usuário" required>
        <input type="password" name="password" placeholder="Senha" required>
        <button type="submit">Registrar</button>
    </form>
    <p>Já tem uma conta? <a href="login.php">Faça login aqui</a></p>
</body>
</html>
