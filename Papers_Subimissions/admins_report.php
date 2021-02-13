<!DOCTYPE html>
<html>
<head>

<style>

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #4CAF50;
  color: white;
}

.topnav-right {
  float: right;
}
</style>



 <title></title>

 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

 <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">
   <script type="text/javascript" charset="utf8" src="https://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>

</head>
<body>



<div class="topnav">
<a href="admins_main_dashboard.php" >Home</a>

    <a href="logout.php" style="float:right">Logout</a>
  </div>
</div>



<div>

</div>
 <div class="container">
 <div class="col-lg-12">
 <br><br>
 <h1 class="text-warning text-center" > List of Papers Reviewed </h1>
 <br>
 <table  id="tabledata" class=" table table-striped table-hover table-bordered">
 
 <tr class="bg-dark text-white text-center">

 <th> Review Id </th>
<th> Reviewers Mail Id </th>
 <th> Paper Id </th>
<th> Ratings(Average) </th>

 </tr >

 <?php

include("auth_session.php");
require('db.php');

 $q = "select Review_Id,Mail_Id,Paper_Id, avg(Ratings) as rat from reviews GROUP BY Paper_Id ORDER BY rat DESC" ;

 $query = mysqli_query($con,$q);

 while($res = mysqli_fetch_assoc($query)){
 ?>
 <tr class="text-center">
<td> <?php echo $res['Review_Id'];  ?> </td>
 <td> <?php echo $res['Mail_Id'];  ?> </td>
 <td> <?php echo $res['Paper_Id'];  ?> </td>
 <td> <?php echo $res['rat'];  ?> </td>


 </tr>

 <?php 
 }

mysqli_close($con);
  ?>
 
 </table>  

 </div>
 </div>

 <script type="text/javascript">
 
 $(document).ready(function(){
 $('#tabledata').DataTable();
 }) 
 
 </script>

</body>
</html>