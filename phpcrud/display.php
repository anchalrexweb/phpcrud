<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<style>
body {

background:url(background.jpeg) no-repeat  ;
background-position: center;
background-size:cover;
background-attachment: fixed;
height: 100vh;
}

h1{
  text-align:center;
}
</style>
<title>FORMS</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Data <span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" method="post">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" name="searchinput"  aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" id="searchbtn" name ="search" type="submit">Search</button>
    </form>
  </div>
</nav>
<?php
include 'connection.php';
//fetch data from database
$sql = "select * FROM crudtable1";
$result= mysqli_query($con,$sql);
?>
<div class="container">
  <table class='table table-hover table-bordered' id="myTable">
    <thead class='thead-dark'>
      <th>ID</th>
      <th>NAME</th>
      <th>EMAIL</th>
      <th>PHONE</th>
      <th>GENDER</th>
      <th>ADDRESS</th>
      <th>DELETE</th>
      <th>EDIT</th>
    </thead>
    <tbody>
    <?php 
    if(mysqli_num_rows($result)){
      $number=1;
      
    while(($row = mysqli_fetch_assoc($result))){
      ?>
    <tr>
      <td><?php echo $number; ?></td>
      <td><?php echo $row['name']; ?></td>
      <td><?php echo $row['email']; ?></td>
      <td><?php echo $row['phone']; ?></td>
      <td><?php echo $row['gender']; ?></td>
      <td><?php echo $row['address'].", ".$row['city'].", ".$row['state'].", ".$row['zip']; ?></td>
      <td><a href="delete.php?idth=<?php echo $row['id']; ?>" name="delete" type="button" class="btn btn-danger">DELETE</a></td>
      <td><a href="update.php?idth=<?php echo $row['id']; ?>" type="button" class="btn btn-primary">EDIT</a></td>
    </tr>
    <?php 
    $number++;
  }}?>
    </tbody>
  </table>
  <!-- <button id="back" class="btn btn-success">Back</button> -->
</div>

<?php 
if(isset($_POST['search'])){?>
  
<script>$("#myTable").hide();</script>
<?php
$searchinput = $_POST['searchinput'];
  //echo $searchinput;
  // echo $value['name'];
  $search = "select * FROM crudtable1 where name  LIKE '$searchinput%'";
  $search_query = mysqli_query($con,$search);
//  while($value = mysqli_fetch_assoc($search_query)){?>
  <div class="container">
  <table class='table table-hover table-bordered'>
    <thead class='thead-dark'>
      <th>NAME</th>
      <th>EMAIL</th>
      <th>PHONE</th>
      <th>GENDER</th>
      <th>ADDRESS</th>
      </thead>
    <tbody>
    <?php
      if(mysqli_num_rows($search_query)){
        $num=1;
    while(($row1 = mysqli_fetch_assoc($search_query))){
      ?>
<tr>
      
      <td><?php echo $row1['name']; ?></td>
      <td><?php echo $row1['email']; ?></td>
      <td><?php echo $row1['phone']; ?></td>
      <td><?php echo $row1['gender']; ?></td>
      <td><?php echo $row1['address'].", ".$row1['city'].", ".$row1['state'].", ".$row1['zip']; ?></td>
</tr>
<?php $num++;
}} ?>
</tbody>
</table>
<?php

}
?>

</body>
</html>