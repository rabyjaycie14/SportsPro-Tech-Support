<?php include '../view/header.php';
/* JAYCIE RABY | ALEX RENO | CIS 435 | PROJECT 3 | SUNDAY, NOVEMBER 25TH

Register products
  Description:
    Create an application that lets a customer register a product.

1. Customer Login Page
  Operation:
    To log in, the customer can enter his or her email address and click on the Login button.

2. Register Product Page
  Operation:
    To register a product, the customer can select the product and click on the Register Product button.

  Specifications:
    The Product drop-down list should include all products.

3. Register Product Successful Page
  Operation:
    After the customer clicks on the Register Product button, the application displays a message that indicates
    that the product was registered successfully. This message should include the product’s code.
*/
?>
<?php $dsn = 'mysql:host=localhost;dbname=tech_support';
$username = 'ts_user';
$password = 'pa55word';

require_once('../model/database.php');

try {
    $db = new PDO($dsn, $username, $password);
    // get the data from the request
    $query = 'SELECT email
              FROM customers';
    $statement = $db->prepare($query);
    $statement->execute();
    $customers = $statement->fetchAll();
    $statement->closeCursor();
    ?>
    <main>
      <h2>Customer Login</h2>
      <form action="customer_login.php" method="post">
        <label>Email:</label>
        <input type="text" name="email">
      <input type="submit" value="Submit"></form>
    </main>
<?php }  catch (PDOException $e) {
    $error_message = $e->getMessage();
    include('../errors/database_error.php');
    exit();
} ?>

<?php include '../view/footer.php'; ?>
