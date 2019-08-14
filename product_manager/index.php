<?php include '../view/header.php';?>
<!DOCTYPE HTML>
<html>
  <link rel="stylesheet" type="text/css"
      href="/project_starts/tech_support/main.css">
  <main>
      <h3>Product List</h3>
<?php require_once('../model/database.php');

try {
    $db = new PDO($dsn, $username, $password);
    $query = 'SELECT productCode, name, version, releaseDate
              FROM products';
    $statement = $db->prepare($query);
    //$statement->bindValue(':product_id', $product_id);
    $statement->execute();
    $products = $statement->fetchAll();
    $statement->closeCursor();?>
    <table>
      <th>Code</th>
      <th>Name</th>
      <th>Version</th>
      <th>Release Date</th>
      <th></th>
    <?php foreach($products as $product){?>
    <tr>
        <td><?php echo $product['productCode']; ?></td>
        <td><?php echo $product['name']; ?></td>
        <td><?php echo $product['version']; ?></td>
        <td><?php echo $product['releaseDate']; ?></td>
        <td><form action="delete_product.php" method="post">
          <input type="hidden" name="code"
              value="<?php echo $product['productCode']; ?>">
              <input type="submit" value="Delete">
            </form></td>
    </tr>
  <?php } ?>
</table>
<div><a href="add_product_form.php">Add Product</a></div>
<?php
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    include('../errors/database_error.php');
    exit();
} ?>

  </main>
</html>


<?php include '../view/footer.php'; ?>
