<?php include '../view/header.php';
/* JAYCIE RABY | ALEX RENO | CIS 435 | PROJECT 3 | SUNDAY, NOVEMBER 25TH */?>

<?php
require_once('../model/database.php');?>
<form action="customer_info.php" method="post">
<?php
$prod_list = filter_input(INPUT_POST, 'prod_list');
$customerID = filter_input(INPUT_POST, 'custID');
$title = filter_input(INPUT_POST, 'title');
$description = filter_input(INPUT_POST, 'description');
$dateOpened = (new \DateTime())->format('Y-m-d H:i:s');
$dateClosed = (new \DateTime('tomorrow'))->format('Y-m-d H:i:s');

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

  $db = new PDO($dsn, $username, $password);
  $query_2 = "SELECT incidentID from incidents ORDER BY incidentID desc LIMIT 1";
  $statement_2 = $db->prepare($query_2);
  $statement_2->execute();
  $incidents = $statement_2->fetchAll();
  $statement_2->closeCursor();

  foreach ($incidents as $incident){
    $incidentID_initial = $incident['incidentID'];
  }
  $incidentID = $incidentID_initial + 1;

  $db = new PDO($dsn, $username, $password);
  $query_3 = "SELECT techID from technicians ORDER BY RAND() LIMIT 1";
  $statement_3 = $db->prepare($query_3);
  $statement_3->execute();
  $techID = $statement_3->fetchAll();
  $statement_3->closeCursor();

  foreach ($techID as $tech_id){
    $techID = $tech_id['techID'];
  }

  // Validate inputs
  if ($incidentID == null || $customerID == null || $productCode == null || $dateOpened == null
      || $dateClosed == null || $title == null || $description == null) {
      $error = "Product registration unsuccessful. Go back and try again.";?>
      <form action="customer_info.php" method="post">
      <input type="submit" value="Go Back"></form>

  <?php } else {
    // Add the product to the database
    $query_4 = 'INSERT INTO incidents
                 (incidentID, customerID, productCode, dateOpened, dateClosed, title, description)
              VALUES
                 (:incidentID, :customerID, :productCode, :dateOpened, :dateClosed, :title, :description)';
    $query_4 = $db->prepare($query_4);
    $query_4->bindValue(':incidentID', $incidentID);
    $query_4->bindValue(':customerID', $customerID);
    $query_4->bindValue(':productCode', $productCode);
    $query_4->bindValue(':dateOpened', $dateOpened);
    $query_4->bindValue(':dateClosed', $dateClosed);
    $query_4->bindValue(':title', $title);
    $query_4->bindValue(':description', $description);
    $query_4->execute();
    $query_4->closeCursor();
    if($query_4){ ?>
      <main>
        <h1>Create Incident</h1>
        <?php echo "This incident was added to our database.";?>
        </main>
    <?php }
    else{
      $error = "Incident creation unsuccessful. Go back and try again.";?>
      <input type="submit" value="Go Back"></form>
    <?php }
  }
}  catch (PDOException $e) {
    $error_message = $e->getMessage();
    include('../errors/database_error.php');
    exit();
} ?>

<?php include '../view/footer.php'; ?>
