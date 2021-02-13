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
 <h1 class="text-white text-center">  Update Operation </h1>
 </div><br>

<form class="form" method="post" name="update" >
 <label> Authors Feedback: </label>
 <input type="text" name="authors_feedback" class="form-control"> <br>

 <label> Committees Feedback: </label>
 <input type="text" name="committess_feedback" class="form-control"> <br>

 <label> Ratings: </label>
 <input type="text" name="ratings" class="form-control"> <br>

 <button class="btn btn-success" type="submit" name="done"> Submit </button><br>
 </form>
 </div>
</div>
</body>
</html>


<?php

include("auth_session.php");
require('db.php');

 if(isset($_POST['done'])){

 $Review_Id = $_GET['review_id'];
 $Paper_Id = $_GET['paper_id'];


$authors_feedback = stripslashes($_REQUEST['authors_feedback']);
$authors_feedback = mysqli_real_escape_string($con, $authors_feedback);

$committes_feedback = stripslashes($_REQUEST['committess_feedback']);
$committes_feedback = mysqli_real_escape_string($con, $committes_feedback);

$ratings    = stripslashes($_REQUEST['ratings']);
$ratings   = mysqli_real_escape_string($con, $ratings);


echo $authors_feedback;
echo $committes_feedback;
echo $ratings;

 $q = " update reviews set Ratings='$ratings' , Committee_Feedbacks='$committes_feedback', Author_Feedbacks='$authors_feedback' where Review_Id=
'" . $_GET["review_id"] . "'  ";

 $query = mysqli_query($con,$q);
 

 header('location:reviewers_dashboard.php');
 }

?>




