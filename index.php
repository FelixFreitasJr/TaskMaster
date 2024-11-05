<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: web/php/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem-vindo ao TaskMaster</title>
    <link rel="stylesheet" href="css/styles-index.css">
    <script type="module" src="js/db.js"></script>
</head>
<body>
    <h2>Bem-vindo ao TaskMaster</h2>
    <p>Gerencie suas tarefas de forma simples e eficiente.</p>
    <!-- <div class="buttons">
        <a href="html/register.php"><button>Registrar</button></a>
        <a href="html/login.php"><button>Login</button></a>
    </div> -->
</body>
</html>

