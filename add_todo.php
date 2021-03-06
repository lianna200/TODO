<?php
// Get the category data
$name = filter_input(INPUT_POST, 'name');

// Validate inputs
if ($name == null) {
    $error = "Invalid category data. Check all fields and try again.";
        include('error.php');
	} else {
	    require_once('database.php');
// Add the product to the database  
$query = 'INSERT INTO todo (todoName)
		   VALUES (:todo_name)';
	 $statement = $db->prepare($query);
         $statement->bindValue(':todo_name',
	 $name);$statement->execute();
	$statement->closeCursor();
// Display the CategoryList page	
include('todo_list.php');
}
?>
