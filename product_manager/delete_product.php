<?php
require_once('../model/database.php');

$product_code = filter_input(INPUT_POST, 'code',
                           FILTER_DEFAULT);

// Delete the product from the database
if ($product_code != false) {
    $query = 'DELETE FROM products
              WHERE productCode = :code';
    $statement = $db->prepare($query);
    $statement->bindValue(':code', $product_code);
    $success = $statement->execute();
    $statement->closeCursor();
}

// Display the Product List page
include('index.php');
?>
