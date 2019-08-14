<?php include '../view/header.php';
/* JAYCIE RABY | ALEX RENO | CIS 435 | PROJECT 3 | SUNDAY, NOVEMBER 25TH */ ?>

<?php
require_once('../model/database.php');

$prod_list = filter_input(INPUT_POST, 'prod_list');
$customerID = filter_input(INPUT_POST, 'custID');
$registrationDate = (new \DateTime())->format('Y-m-d H:i:s');

try {
  $db = new PDO($dsn, $username, $password);
  $query = "SELECT productCode from products where name ='$prod_list'";
  $statement = $db->prepare($query);
  $statement->execute();
  $registered_items = $statement->fetchAll();
  $statement->closeCursor();

  foreach ($registered_items as $reg_items){
    $productCode = $reg_items['productCode'];
  }

  // Validate inputs
  if ($customerID == null || $productCode == null || $registrationDate == null ) {
      $error = "Product registration unsuccessful. Go back and try again.";?>
      <form action="customer_login.php" method="post">
      <input type="submit" value="Go Back"></form>

  <?php } else {
    // Add the product to the database
    $query_2 = 'INSERT INTO registrations
                 (customerID,productCode,registrationDate)
              VALUES
                 (:customerID,:productCode,:registrationDate)';
    $statement_2 = $db->prepare($query_2);
    $statement_2->bindValue(':customerID', $customerID);
    $statement_2->bindValue(':productCode', $productCode);
    $statement_2->bindValue(':registrationDate', $registrationDate);
    $statement_2->execute();
    $statement_2->closeCursor();
    if($query_2){
      echo "Product (" . "" . $productCode . ") was registered successfully.";
    }
    else{
      $error = "Product registration unsuccessful. Go back and try again.";?>
      <form action="customer_login.php" method="post">
      <input type="submit" value="Go Back"></form>
    <?php }
  }
}  catch (PDOException $e) {
    $error_message = $e->getMessage();
    include('../errors/database_error.php');
    exit();
} ?>

<?php include '../view/footer.php'; ?>
