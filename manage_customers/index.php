<?php include '../view/header.php';
?>

<html>
  <main>
      <h3>Customer Search</h3>
      <form action="customer_search.php" method="post"
      id="customer_search">

        <label>Last Name: </label>

        <input type="text" name="lname">

        <input type="submit" value="Search">

      </form>
      <h3>Results</h3>

<?php require_once('../model/database.php');
$lname = isset($_POST['lname']) ? $_POST['lname'] : '';
try{
   $db = new PDO($dsn, $username, $password);
   if(!isset($lname) || trim($lname) == ''){
     $query = 'SELECT customerID, firstName, lastName, city, email
             FROM customers';
   }else{
     $query = 'SELECT customerID, firstName, lastName, city, email
              FROM customers
              WHERE lastName = :lname';
   }
   $statement = $db->prepare($query);
   $statement->bindValue(':lname', $lname);
   $statement->execute();
   $customers = $statement->fetchAll();
   $statement->closeCursor();?>
   <table>
     <th>Name</th>
     <th>Email Address</th>
     <th>City</th>
     <th></th>
     <?php foreach($customers as $customer){?>
     <tr>
         <td><?php echo $customer['firstName']; ?>&nbsp;<?php echo $customer['lastName'];?></td>
         <td><?php echo $customer['email']; ?></td>
         <td><?php echo $customer['city']; ?></td>
         <td><form action="select_customer.php" method="post">
           <input type="hidden" name="customer_id"
               value="<?php echo $customer['customerID']; ?>">
               <input type="submit" value="Select">
             </form></td>
     </tr>
<?php } ?>
  </table>
<?php
}catch (PDOException $e) {
    $error_message = $e->getMessage();
    include('../errors/database_error.php');
    exit();
}


  ?>
  </main>
</html>
<?php include '../view/footer.php'; ?>
