<?php
//Get the product data
$product_code = filter_input(INPUT_POST, 'code', FILTER_DEFAULT);
$product_name = filter_input(INPUT_POST, 'name');
$product_version = filter_input(INPUT_POST, 'version');
$product_release_date = filter_input(INPUT_POST, 'release_date');

//Validate inputs
if($product_code == null || $product_code == false ||
   $product_name == null || $product_version == null ||
   $product_release_date == null || $product_release_date == false){
     $error = "Invalid product data. Check all fields and try again.";
     include('../errors/error.php');
 }else{
  require_once('../model/database.php');
 //add the product to the database
  $query = 'INSERT INTO products
              (productCode, name, version, releaseDate)
            VALUES
              (:code, :name, :version, :release_date)';
  $statement = $db->prepare($query);
  $statement->bindValue(':code', $product_code);
  $statement->bindValue(':name', $product_name);
  $statement->bindValue(':version', $product_version);
  $statement->bindValue(':release_date', $product_release_date);
  $statement->execute();
  $statement->closeCursor();

  //Display the Product List page
  include('index.php');
}
?>
