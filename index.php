<?php
require_once('database.php');

// Get ToDo ID
if (!isset($todo_id)) {
    $todo_id = filter_input(INPUT_GET, 'todo_id', 
            FILTER_VALIDATE_INT);
    if ($todo_id == NULL || $todo_id == FALSE) {
        $todo_id = 1;
    }
}
// Get name for selected TODo
$querytodo = 'SELECT * FROM todo
                  WHERE todoID = :todo_id';
$statement1 = $db->prepare($querytodo);
$statement1->bindValue(':todo_id', $todo_id);
$statement1->execute();
$todo = $statement1->fetch();
$todo_name = $todo['todoName'];
$statement1->closeCursor();

// Get all todos
$query = 'SELECT * FROM todo
                       ORDER BY todoID';
$statement = $db->prepare($query);
$statement->execute();
$categories = $statement->fetchAll();
$statement->closeCursor();




// Get products for selected category
$queryTask = 'SELECT * FROM task
                  WHERE todoID = :todo_id
                  ORDER BY taskID';
$statement3 = $db->prepare($queryTask);
$statement3->bindValue(':todo_id', $todo_id);
$statement3->execute();
$products = $statement3->fetchAll();
$statement3->closeCursor();
?>
<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>My Task List</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>

<!-- the body section -->
<body>
<header><h1>To DO List Manager</h1></header>
<main>
    <h1>Task List</h1>

    <aside>
        <!-- display a list of categories -->
        <h2>ToDos</h2>
        <nav>
        <ul>
            <?php foreach ($todos as $todo) : ?>
            <li><a href=".?todo_id=<?php echo $todo['todoID']; ?>">
                    <?php echo $todo['todoName']; ?>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>
        </nav>          
    </aside>

    <section>
        <!-- display a table of products -->
        <h2><?php echo $todo_name; ?></h2>
        <table>
            <tr>
               
                <th>Name</th>
                <th>&nbsp;</th>
            </tr>

            <?php foreach ($tasks as $task) : ?>
            <tr>
            
                <td><?php echo $task['taskName']; ?></td>
          
                <td><form action="delete_task.php" method="post">
                    <input type="hidden" name="task_id"
                           value="<?php echo $task['taskID']; ?>">
                    <input type="hidden" name="todo_id"
                           value="<?php echo $task['todoID']; ?>">
                    <input type="submit" value="Delete">
                </form></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <p><a href="add_task_form.php">Add Task</a></p>
        <p><a href="todo_list.php">List TO DOs</a></p>        
    </section>
</main>
<footer>
    <p>&copy; <?php echo date("Y"); ?> My TO Do</p>
</footer>
</body>
</html>
