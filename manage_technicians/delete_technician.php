<?php
require_once('../model/database.php');
$tech_id = filter_input(INPUT_POST, 'tech_id', FILTER_DEFAULT);
// Delete the product from the database
if ($tech_id != false) {
    $query = 'DELETE FROM technicians
              WHERE techID = :tech_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':tech_id', $tech_id);
    $success = $statement->execute();
    $statement->closeCursor();
}
include('index.php');
?>
