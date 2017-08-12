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
<header><h1>To DO Manager</h1></header>
<main>
    <h1>Task List</h1>
    <table>
        <tr>
            <th>Task Name</th>
            <th>&nbsp;</th>
        </tr>
        
        <!-- add code for the rest of the table here -->
    
    </table>

    <h2>Add TO Do</h2>
    
    <!-- add code for the form here -->
    
    <br>
    <p><a href="index.php">List Tasks</a></p>

    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> My TO DO List</p>
    </footer>
</body>
</html>
