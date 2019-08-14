<?php
require('../model/database.php');
$query = 'SELECT *
          FROM products
          ORDER BY productCode';
$statement = $db->prepare($query);
$statement->execute();
$products = $statement->fetchAll();
$statement->closeCursor();
?>
<?php include '../view/header.php';?>
<!DOCTYPE html>
<html>
  <body>
      <main>
        <h1>Add Product</h1>
        <form action="add_product.php" method="post"
          id="add_product_form">

          <label>Code:</label>
          <input type="text" name="code"><br>

          <label>Name:</label>
          <input type="text" name="name"><br>

          <label>Version:</label>
          <input type="text" name="version"><br>

          <label>Release Date:</label>
          <input type="text" name="release_date">&nbsp;Use 'yyyy-mm-dd' format<br>

          <label>&nbsp;</label>
          <input type="submit" value="Add Product"><br>
        </form>
        <p><a href="index.php">View Product List</a></p>
      </main>
  </body>
</html>

<?php include '../view/footer.php'; ?>
