<?php
require_once('../model/database.php');

$last_name = filter_input(INPUT_POST, 'lname',
                           FILTER_DEFAULT);

// Delete the product from the database
if ($last_name != false) {
    $query = 'SELECT customerID, firstName, lastName, city, email
              FROM customers
              WHERE lastName = :lname';
    $statement = $db->prepare($query);
    $statement->bindValue(':lname', $last_name);
    $success = $statement->execute();
    $statement->closeCursor();
}

// Display the Product List page
include('index.php');
?>
