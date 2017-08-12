<?php
// Get ID
$todo_id = filter_input(INPUT_POST, 'todo_id', FILTER_VALIDATE_INT);
// Validate inputs
if ($todo_id == null || $todo_id == false) {
    $error = "Invalid TO DO Id.";
        include('error.php');
	} else {
	    require_once('database.php');
	        // Add the product to the database  
		    $query = 'DELETE FROM todo 
		                  WHERE todoID = :todo_id';
				      $statement = $db->prepare($query);
			  $statement->bindValue(':todo_id',
			  $todo_id);
			$statement->execute();
		     $statement->closeCursor();
// Display the Category	  List page
include('todo_list.php');							  }
?>
