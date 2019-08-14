<?php include '../view/header.php';
/* JAYCIE RABY | ALEX RENO | CIS 435 | PROJECT 3 | SUNDAY, NOVEMBER 25TH */?>

<?php
$user_email = $_POST["email"];
$dsn = 'mysql:host=localhost;dbname=tech_support';
$username = 'ts_user';
$password = 'pa55word';

require_once('../model/database.php');

try {
    $db = new PDO($dsn, $username, $password);
    $query = "SELECT firstName, lastName, email, customerID from customers where email ='$user_email'";
    $statement = $db->prepare($query);
    $statement->execute();
    $customer_info = $statement->fetchAll();
    $count = $statement->rowCount();
    $statement->closeCursor();
    foreach ($customer_info as $cust_info) {
      $customerID = $cust_info['customerID'];
    }

    $query_2 = "SELECT productCode from registrations where customerID ='$customerID'";
    $statement_2 = $db->prepare($query_2);
    $statement_2->execute();
    $products = $statement_2->fetchAll();
    $statement_2->closeCursor();

    if($count == 0){
      echo "Customer Login Failed, Please go back and try again.";
      ?>
      <form action="index.php" method="post">
      <input type="submit" value="Go Back"></form>
      <?php
    }
    else{
      ?>
      <main>
        <h2>Create Incident</h2>
        <?php foreach ($customer_info as $cust_info) {
          echo "Customer: " . " " . $cust_info['firstName'] . " " . $cust_info['lastName'];
        } ?>
          <br>
          <form action="create_incident.php" method="post">
            <label>Product List:  </label>
            <select name="prod_list">
              <?php foreach ($products as $product) {
                  $productCode = $product['productCode'];
                  $query_3 = "SELECT name from products where productCode='$productCode'";
                  $statement_3 = $db->prepare($query_3);
                  $statement_3->execute();
                  $product_name = $statement_3->fetchAll();
                  $statement_3->closeCursor();
                  foreach ($product_name as $prod_name) {
                    echo '<option value="' . $prod_name['name'] . '">' . $prod_name['name'] . '</option>';
                  }
              } ?>
            </select>
            <br>
            <label>Title</label>
            <input type="text" name ="title">
            <br>
            <label>Description</label>
            <input type="text" name ="description">
            <input type ="hidden" name = "custID" value="<?php echo $cust_info['customerID']?>"><br>
            <input type="submit" value="Create Incident">
          </form>
      </main>
    <?php }

}  catch (PDOException $e) {
    $error_message = $e->getMessage();
    include('../errors/database_error.php');
    exit();
} ?>

 <?php include '../view/footer.php'; ?>
