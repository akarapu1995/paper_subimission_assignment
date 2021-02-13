<?php
include("auth_session.php");
require('db.php');
?>

<!DOCTYPE html>
<html>
<head>
 <title></title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>


 <div class="col-lg-6 m-auto">
 
 
 
 <br><br><div class="card">
 
 <div class="card-header bg-dark">
 <h1 class="text-white text-center">  Assign Reviewers </h1>
 </div><br>

<form class="form" method="post" name="update" >

<?php


$result = mysqli_query($con, "SELECT DISTINCT Reviewers_Mail_Id FROM reviewers");
?>
<h4>Reviewer 1: </h4>
<select name="reviewer1">
<?php
$i=0;
while($row = mysqli_fetch_array($result)) {
?>
<option value="<?=$row["Reviewers_Mail_Id"];?>"><?=$row["Reviewers_Mail_Id"];?></option>
<?php
$i++;
}
?>
</select>
<br><br>

<?php


$result = mysqli_query($con, "SELECT DISTINCT Reviewers_Mail_Id FROM reviewers");
?>
<h4>Reviewer 2:</h4> 
<select name="reviewer2">
<?php
$i=0;
while($row = mysqli_fetch_array($result)) {
?>
<option value="<?=$row["Reviewers_Mail_Id"];?>"><?=$row["Reviewers_Mail_Id"];?></option>
<?php
$i++;
}
?>
</select>


<br><br>
<?php


$result = mysqli_query($con, "SELECT DISTINCT Reviewers_Mail_Id FROM reviewers");
?>
<h4>Reviewer 3:</h4> 
<select name="reviewer3">
<?php
$i=0;
while($row = mysqli_fetch_array($result)) {
?>
<option value="<?=$row["Reviewers_Mail_Id"];?>"><?=$row["Reviewers_Mail_Id"];?></option>
<?php
$i++;
}
?>
</select>
<br>
<br>


<button class="btn btn-success" type="submit" name="done"> Submit </button><br>
  </form>
</div>
</div>

</body>
</html>


<?php

 if(isset($_POST['done'])){

 $Paper_Id = $_GET['paper_id'];
 $reviewer1= $_POST['reviewer1'];
 $reviewer2= $_POST['reviewer2'];
 $reviewer3= $_POST['reviewer3'];



 $q = "INSERT into `reviews` (Paper_id,Mail_Id)
                     VALUES ('$Paper_Id', '$reviewer1'),                     
		     ('$Paper_Id', '$reviewer2'),
                      ('$Paper_Id', '$reviewer3')";


 $query = mysqli_query($con,$q);
 

 header('location:admins_dashboard.php');
 }

?>




