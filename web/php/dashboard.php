<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.html");
    exit();
}

$user = 'postgres.udewqztaiamosvawtzdv';
$password = 'Amnnp2980'; // Substitua por sua senha segura
$host = 'aws-0-sa-east-1.pooler.supabase.com';
$port = '6543';
$dbname = 'postgres';

$conn = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password);

$result = $conn->query("SELECT * FROM tasks WHERE username='" . $_SESSION['username'] . "'");

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel - TaskMaster</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <h2>Bem-vindo, <?php echo $_SESSION['username']; ?>!</h2>
    <h3>Suas Tarefas:</h3>
    <ul>
        <?php while ($task = $result->fetch(PDO::FETCH_ASSOC)): ?>
        <li><?php echo $task['title']; ?> - <?php echo $task['status']; ?></li>
        <?php endwhile; ?>
    </ul>
    <a href="logout.php">Logout</a>
</body>
</html>
