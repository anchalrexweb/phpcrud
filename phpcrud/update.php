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
.contain{
  
  position: relative;
  width : 30%;
  margin: 2% auto 0;
}
h1{
  text-align:center;
}
</style>
<title>FORMS</title>
</head>
<body>
<div class="contain">
<h1>Form</h1>

<form method="post">
    <?php
        include 'connection.php';
        $id = isset($_GET['idth'])? $_GET['idth']:'';
        $sql ="select  * from crudtable1 where id = $id";
        $query = mysqli_query($con,$sql);
        $row = mysqli_fetch_assoc($query);
    ?>
  <!-- username -->
  <div class="form-group">
    <label for="name">User Name</label>
    <input type="text" class="form-control" id="name" name="name" value = "<?php  echo $row['name']; ?>">
  </div>

  <!-- email and password -->
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="email">Email</label>
      <input type="email" class="form-control" id="email" name="email" value = "<?php  echo $row['email']; ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="password">Password</label>
      <input type="password" class="form-control" name="password" id="pwd" value = "<?php  echo $row['password']; ?>">
    </div>
  </div>

  <!-- phone number -->
  <div class="form-group">
    <label for="phone">Phone Number</label>
    <input type="text" class="form-control" name="phone" id="phone" value = "<?php  echo $row['phone']; ?>">
  </div>

  <!-- Gender -->
  <div class="form-group">
    <label class="gender">Gender</label>
    
        <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" value="female" <?php if($row['gender']=="female"){ echo "checked";}?>>
                <label class="form-check-label" for="female">
                 Female
                </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" value="male" <?php if($row['gender']=="male"){ echo "checked";}?> >
                <label class="form-check-label" for="male">
                Male
                </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" value="others" <?php if($row['gender']=="other"){ echo "checked";}?> >
            <label class="form-check-label" for="others">
            Others
            </label>
        </div>
    </div>    

<!-- address -->
  <div class="form-group">
    <label for="inputAddress">Address</label>
    <div class="form-cotrol">
      <textarea cols="40" name="address" ><?php echo $row['address'] ?></textarea>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="city">City</label>
      <input type="text" class="form-control" name="city" id="city" value = "<?php  echo $row['city']; ?>">
    </div>
    <div class="form-group col-md-4">
      <label for="state">State</label>
      <select id="state" name="state" class="form-control" >
        <option>Haryana</option>
        <option>Punjab</option>
        <option>Rajasthan</option>
        <option>Bihar</option>
      </select>
    </div>
    <div class="form-group col-md-2">
      <label for="zip">Zip</label>
      <input type="text" class="form-control" name="zip" id="zip" value = "<?php  echo $row['zip']; ?>">
    </div>
  </div>
<!-- button -->
  <div class=" form-row">
    <div class = "form-group col-md-12">
      <button type="submit" name="update" id="update" class="btn btn-success btn-block">UPDATE</button>
    </div>
  </div>
</form>
</div>

<?php
if(isset($_POST['update'])){
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$phone = $_POST['phone'];
$gender = $_POST['gender'];
$address= $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip'];

// update data into database
$updatedata = "UPDATE crudtable1 SET name = '$name', email='$email',password='$password',phone='$phone',gender='$gender',address='$address',city='$city',state='$state',zip='$zip' WHERE id=$id";

if (mysqli_query($con, $updatedata)) {?>
  <script> alert("data updated successfully");</script>
  
<?php
header('location:display.php');
} else { ?>
  <script> alert( "Error: " . $updatedata . "<br>" . mysqli_error($con));</script>
<?php }} ?>

</body>
</html>