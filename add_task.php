<?php
// Get the product data
$task_id = filter_input(INPUT_POST, 'task_id', FILTER_VALIDATE_INT);
$name = filter_input(INPUT_POST, 'name');

// Validate inputs
if ($task_id == null || $task_id == false ||
     $name == null ) {
    $error = "Invalid product data. Check all fields and try again.";
    include('error.php');
} else {
    require_once('database.php');

    // Add the product to the database  
    $query = 'INSERT INTO task
                 (taskID, taskName)
              VALUES
                 (:task_id, :name)';
    $statement = $db->prepare($query);
    $statement->bindValue(':task_id', $task_id);
    $statement->bindValue(':name', $name);
    $statement->execute();
    $statement->closeCursor();

    // Display the Product List page
    include('index.php');
}
?>
