<?php
require_once('../model/database.php');
$query = 'SELECT *
          FROM technicians
          ORDER BY techID';
$statement = $db->prepare($query);
$statement->execute();
$categories = $statement->fetchAll();
$statement->closeCursor();
?>

<?php include '../view/header.php'; ?>

<!DOCTYPE html>
<html>
  <head>
  <title>Add Technician</title>
      <link rel="stylesheet" type="text/css" href="../main.css">
  </head>

  <header><h1>Technician Manager</h1></header>
  <main>
    <h1>Add Technician</h1>
    <form action="add_technician.php" method="post" id="add_technician">
    <label>First Name: </label>
    <input type="text" name="first_name"><br>

    <label>Last Name:</label>
    <input type="text" name="last_name"><br>

    <label>Email: </label>
    <input type="text" name="email"><br>

    <label>Phone: </label>
    <input type="text" name="phone"><br>

    <label>Password: </label>
    <input type="text" name="password"><br>

    <label>&nbsp;</label>
    <input type="submit" value="Add Technician"><br>
    </form>
    <br>
    <a href="http://localhost/project_starts/tech_support/manage_technicians/">View Technician List</a>
  </main>
</html>

<?php include '../view/footer.php'; ?>
