<?php
require_once('database.php');

// Get all To Dos
$query = 'SELECT * FROM todo
                       ORDER BY todoID';
$statement = $db->prepare($query);
$statement->execute();
$categories = $statement->fetchAll();
$statement->closeCursor();
?>
<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>My TO Do</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>
<!-- the body section -->

 <body>
<header><h1>TO DO List</h1></header>
<main>
    <h1>TAsk</h1>
    <table>
        <tr>
            <th>TAsk Name</th>
            <th>&nbsp;</th>
        </tr>        
        <?php foreach ($todos as $todo) : ?>
        <tr>
            <td><?php echo $todo['todoName']; ?></td>
            <td>
                <form action="delete_todo.php" method="post">
                    <input type="hidden" name="todo_id"
                           value="<?php echo $todo['todoID']; ?>"/>
                    <input type="submit" value="Delete"/>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>    
    </table>

    <h2 class="margin_top_increase">Add ToDO</h2>
    <form action="add_todo.php" method="post"
          id="add_todo_form">

        <label>TO Do Name:</label>
        <input type="text" name="name" />
        <input id="add_todo_button" type="submit" value="Add"/>
    </form>
    
    <p><a href="index.php">List Tasks</a></p>

</main>
<footer>
    <p>&copy; <?php echo date("Y"); ?> My TO DO.</p>
</footer>
</body>
</html>
