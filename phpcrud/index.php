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
<title>new registration</title>
</head>
<body>
<div class="contain">
<h3>NEW REGISTRATION</h3>
<form method="post">
  <!-- username -->
  <div class="form-group">
    <label for="name">User Name</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Username">
  </div>

  <!-- email and password -->
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="email">Email</label>
      <input type="email" class="form-control" id="email" name="email" placeholder="Email">
    </div>
    <div class="form-group col-md-6">
      <label for="password">Password</label>
      <input type="password" class="form-control" name="password" id="pwd" placeholder="Password">
    </div>
  </div>

  <!-- phone number -->
  <div class="form-group">
    <label for="phone">Phone Number</label>
    <input type="text" class="form-control" name="phone" id="phone" placeholder="phone number">
  </div>

  <!-- Gender -->
  <div class="form-group">
    <label class="gender">Gender</label>
    
        <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" id="female" value="female" >
                <label class="form-check-label" for="female">
                 Female
                </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" id="male" value="male">
                <label class="form-check-label" for="male">
                Male
                </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" id="others" value="others">
            <label class="form-check-label" for="others">
            Others
            </label>
        </div>
    </div>    

<!-- address -->
  <div class="form-group">
    <label for="inputAddress">Address</label>
    <div class="form-cotrol">
      <textarea cols="40" name="address"></textarea>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="city">City</label>
      <input type="text" class="form-control" name="city" id="city">
    </div>
    <div class="form-group col-md-4">
      <label for="state">State</label>
      <select id="state" name="state" class="form-control">
        <option>Haryana</option>
        <option>Punjab</option>
        <option>Rajasthan</option>
        <option>Bihar</option>
      </select>
    </div>
    <div class="form-group col-md-2">
      <label for="zip">Zip</label>
      <input type="text" class="form-control" name="zip" id="zip">
    </div>
  </div>
<!-- button -->
  <div class=" form-row">
    <div class = "form-group col-md-6">
      <button type="submit" name="submit" class="btn btn-success btn-block">Sign in</button>
    </div>  
    <div class = "form-group col-md-6">
      <a href="display.php" name="show" id = "show" class="btn btn-primary btn-block">Show data</a>
    </div>
  </div>
</form>
</div>
<?php
include 'connection.php';
if(isset($_POST['submit'])){
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$phone = $_POST['phone'];
$gender = $_POST['gender'];
$address= $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip'];

// insert data into database
$insertdata =   "insert into crudtable1(name,email,password,phone,gender,address,city,state,zip)values('$name','$email','$password','$phone','$gender','$address','$city','$state','$zip')";

if (mysqli_query($con, $insertdata)) {?>
  <script> alert("New record created successfully");</script>
<?php } else { ?>
  <script> alert( "Error: " . $insertdata . "<br>" . mysqli_error($con));</script>
<?php }}
?>
<!-- <script>
$(document).ready(function(){
  $("#show").on("click",function(){
    window.open("display.php","_self");
  });
});
</script> -->
</body>
</html>