<?php include '../view/header.php';
/*  JAYCIE RABY | ALEX RENO | CIS 435 | PROJECT 3 | SUNDAY, NOVEMBER 25TH

Manage Technicians
  Description:
    Create an application that lets an admin user view and delete existing technicians.
    In addition, this application lets the user add a new technician.

1. Technician List Page
  Operation:
    When the user clicks the Delete button for a technician, the technician is deleted from the database.
    When the user clicks the Add Technician link, the Add Technician page is displayed.

2. Add Technician Page
  Operation:
    When the user enters the data for a new technician into the text boxes and clicks the Add Technician button,
    the technician is added to the database.

  Specifications:
    Validate the data the user enters on the Add Technician page to be sure that the user enters data in every text box.
    If this data isn’t provided, display an Error page that indicates that a required field was not entered.
*/
$dsn = 'mysql:host=localhost;dbname=tech_support';
$username = 'ts_user';
$password = 'pa55word';

try {
    $db = new PDO($dsn, $username, $password);
    // get the data from the request
    $query = 'SELECT techID, firstName, lastName, email, phone, password
              FROM technicians';
    $statement = $db->prepare($query);
    $statement->execute();
    $technicians = $statement->fetchAll();
    $statement->closeCursor();
    ?>
    <main>
    <h2>Technician List</h2>
    <table>
    <?php foreach ($technicians as $technician) { ?>
      <tr>
          <td><?php echo $technician['firstName']; ?></td>
          <td><?php echo $technician['lastName']; ?></td>
          <td><?php echo $technician['email']; ?></td>
          <td><?php echo $technician['phone']; ?></td>
          <td><?php echo $technician['password']; ?></td>
          <td><form action="delete_technician.php" method="post">
            <input type="hidden" name="tech_id" value="<?php echo $technician['techID']; ?>">
            <input type="submit" value="Delete">
          </form></td>
      </tr>
   <?php } ?>
   </table>
   <form action="add_technician_form.php" method="post" id="add_technician_form"><input type="submit" value="Add Technician"></h2>
 </main>
<?php }  catch (PDOException $e) {
    $error_message = $e->getMessage();
    include('../errors/database_error.php');
    exit();
} ?>

<?php include '../view/footer.php'; ?>
