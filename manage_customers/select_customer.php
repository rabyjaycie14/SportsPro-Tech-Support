<?php include '../view/header.php';?>

<?php
require_once('../model/database.php');

$customer_id = filter_input(INPUT_POST, 'customer_id',
                            FILTER_VALIDATE_INT);
if($customer_id != false){
  $query = 'SELECT * FROM customers
            WHERE customerID = :customer_id';
  $statement = $db->prepare($query);
  $statement->bindValue(':customer_id', $customer_id);
  $success = $statement->execute();
  $customers = $statement->fetchAll();
  $statement->closeCursor();
}
?>

<html>
  <main>
    <h3>View/Update Customer</h3>
    <?php foreach($customers as $customer){?>
    <form action="update_customer.php" method="post"
      id="update_customer">

      <label>First Name:</label>
      <input type="text" name="fname"
        value="<?php echo $customer['firstName'];?>"><br>

      <label>Last Name:</label>
      <input type="text" name="lname"
        value="<?php echo $customer['lastName'];?>"><br>

      <label>Address:</label>
      <input type="text" name="address"
        value="<?php echo $customer['address'];?>"><br>

      <label>City:</label>
      <input type="text" name="city"
        value="<?php echo $customer['city'];?>"><br>

      <label>State:</label>
      <input type="text" name="state"
        value="<?php echo $customer['state'];?>"><br>

      <label>Postal Code:</label>
      <input type="text" name="postal_code"
        value="<?php echo $customer['postalCode'];?>"><br>

      <label>Country Code:</label>
      <input type="text" name="country_code"
        value="<?php echo $customer['countryCode'];?>"><br>

      <label>Phone:</label>
      <input type="text" name="phone"
        value="<?php echo $customer['phone'];?>"><br>

      <label>Email:</label>
      <input type="text" name="email"
        value="<?php echo $customer['email'];?>"><br>

      <label>Password:</label>
      <input type="text" name="password"
        value="<?php echo $customer['password'];?>"><br>

      <input type="hidden" name="customer_id"
          value="<?php echo $customer['customerID']; ?>">
      <input type="submit" value="Update"><br>
    </form>
  <?php } ?>
  <p><a href="index.php">Search Customers</a></p>
  </main>

</html>

<?php include '../view/footer.php';?>
