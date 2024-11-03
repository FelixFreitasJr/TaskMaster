<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.html");
    exit();
}

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

$result = $conn->query("SELECT * FROM tasks WHERE username='" . $_SESSION['username'] . "'");

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel - TaskMaster</title>
    <link rel="stylesheet" href="../css/styles.css">
    <script type="module" src="../js/db.js"></script>
</head>
<body>
    <h2>Bem-vindo, <?php echo $_SESSION['username']; ?>!</h2>
    <h3>Suas Tarefas:</h3>
    <ul id="task-list">
        <?php while ($task = $result->fetch(PDO::FETCH_ASSOC)): ?>
        <li><?php echo $task['title']; ?> - <?php echo $task['status']; ?></li>
        <?php endwhile; ?>
    </ul>
    <a href="logout.php">Logout</a>
    <script type="module">
        import { supabase } from '../js/db.js';

        document.addEventListener('DOMContentLoaded', async () => {
            const taskList = document.getElementById('task-list');
            const { data: tasks, error } = await supabase
                .from('tasks')
                .select('*')
                .eq('username', '<?php echo $_SESSION['username']; ?>')

            if (error) {
                console.error('Erro ao carregar tarefas:', error);
            } else {
                tasks.forEach(task => {
                    const taskItem = document.createElement('li');
                    taskItem.textContent = `${task.title} - ${task.status}`;
                    taskList.appendChild(taskItem);
                });
            }
        });
    </script>
</body>
</html>
