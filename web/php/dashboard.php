<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../html/login.html");
    exit();
}

$host = 'udewqztaiamosvawtzdv.supabase.co';
$db = 'postgres';
$user = 'postgres';
$password = 'YOUR_SUPABASE_PASSWORD'; // Substitua pela sua senha segura

try {
    $conn = new PDO("pgsql:host=$host;dbname=$db", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel - TaskMaster</title>
    <link rel="stylesheet" href="../css/styles.css">
    <script src="../js/db.js"></script>
</head>
<body>
    <h2>Bem-vindo, <?php echo $_SESSION['username']; ?>!</h2>
    <h3>Suas Tarefas:</h3>
    <ul id="task-list">
        <?php
        $result = $conn->query("SELECT * FROM tasks WHERE username='" . $_SESSION['username'] . "'");
        while ($task = $result->fetch(PDO::FETCH_ASSOC)) {
            echo '<li>' . $task['title'] . ' - ' . $task['status'] . '</li>';
        }
        ?>
    </ul>
    <a href="logout.php">Logout</a>
    <script>
        // Exemplo de código JS adicional, caso precise carregar mais dados
        async function fetchTasks() {
            const { data: tasks, error } = await supabase
                .from('tasks')
                .select('*')
                .eq('username', '<?php echo $_SESSION['username']; ?>')

            if (error) {
                console.error('Erro ao carregar tarefas:', error)
            } else {
                const taskList = document.getElementById('task-list');
                taskList.innerHTML = '';
                tasks.forEach(task => {
                    const taskItem = document.createElement('li');
                    taskItem.textContent = `${task.title} - ${task.status}`;
                    taskList.appendChild(taskItem);
                });
            }
        }

        fetchTasks();
    </script>
</body>
</html>
