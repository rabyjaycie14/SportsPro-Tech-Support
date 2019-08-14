<?php include '../view/header.php';
/* JAYCIE RABY | ALEX RENO | CIS 435 | PROJECT 3 | SUNDAY, NOVEMBER 25TH

Create Incident
  Description:
    Create an application that lets an admin user enter new incidents.
    To do that, you’ll begin by letting the user select a customer.

1. Get Customer Page
  Operation:
    To get a customer, the user can enter the customer’s email address.
    Then, the user can click on the Get Customer button to retrieve the customer’s data and display the Create Incident page.

2. Create Incident
  Operation:
    To create an incident, the user selects a product from the Product drop-down list,
    enters a title, enters a description, and clicks on the Create Incident button.
  Specifications
  The Product drop-down list should only include products that the customer has registered.

3. Create Incident Successful Page
  Specifications:
  If successful, the Create Incident page should display a message that indicates that the incident was added to the database.
*/
?>
<?php $dsn = 'mysql:host=localhost;dbname=tech_support';
$username = 'ts_user';
$password = 'pa55word';

require_once('../model/database.php');

try {
    $db = new PDO($dsn, $username, $password);
    $query = 'SELECT email
              FROM customers';
    $statement = $db->prepare($query);
    $statement->execute();
    $customers = $statement->fetchAll();
    $statement->closeCursor();
    ?>
    <main>
      <h2>Get Customer</h2>
      <p>You must enter the customer's email address to select the customer</p>
      <form action="customer_info.php" method="post">
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
