<?php 
include 'connection.php';
$id = isset($_GET['idth']) ? $_GET['idth'] : '';
  //echo $id1;
  $del = "DELETE FROM crudtable1 where id = $id";
  $query = mysqli_query($con,$del);
 //
 if ($con->query($del) === TRUE) { ?>
    <script> alert("Record deleted successfully");</script>
  <?php 
 header('location:display.php');
} else { ?>
    <script> alert("Error deleting record: " . $con->error);</script>
  <?php }
?>
