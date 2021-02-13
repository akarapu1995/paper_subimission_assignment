<!DOCTYPE html>

<html>

<head>
 
   <meta charset="utf-8">
   
 <title>Dashboard - Authors</title>
   
<style>
body {
	background-color: lightblue;	
}

input {
	width: 50%;
	height: 5%;
	border: 1px;
	border-radius: 05px;
	padding: 8px 15px 8px 15px;
	margin: 10px 0px 15px 0px;
	box-shadow: 1px 1px 2px 1px grey;
	font-weight: bold;
}
</style>

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
</head>

<body>
 

<div class="topnav">

    <a href="logout.php" style="float:right">Logout</a>
  </div>
</div>
 

  <form class="form" action="" method="post" enctype="multipart/form-data">

	<div>
	<lable>Enter the title of your paper:</lable>
	<input type="text" name="paper_title" placeholder="Title of the paper" required />
</div>
<br>
<div>
	<lable>Enter the abstract of your paper:</lable>
	<input type="text"  name="paper_abstract" placeholder="Abstract of paper" required />
</div>
<br>
<div>	
	<lable>Enter the contact mail id:</lable>
        <input type="text" name="contact_mailid" placeholder="Contact Mail id" required>
</div>
<br>
<div>
	<lable>upload your paper:</lable>
	<input type="file" name="fileToUpload" id="fileToUpload"/>
</div>
<br>
<div>
	<input type="submit" value="upload" name="submit"/>
</div>	
</form>


      
</body>

</html>




<?php

	include("auth_session.php");
	require('db.php');
	
	if (isset($_REQUEST['submit'])){
		$title = stripslashes($_REQUEST['paper_title']);
		$title = mysqli_real_escape_string($con, $title);
		$abstract = stripslashes($_REQUEST['paper_abstract']);
		$abstract = mysqli_real_escape_string($con, $abstract);
		$contact_mailid    = stripslashes($_REQUEST['contact_mailid']);
		$contact_mailid    = mysqli_real_escape_string($con, $contact_mailid);
       

		$target_dir = "uploads/";
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		$uploadOk = 1;
		$FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check file size
		if ($_FILES["fileToUpload"]["size"] > 500000) {
  			//echo "Sorry, uploaded file is too large.";
  			$uploadOk = 0;
			}

// Allow certain file formats
		if($FileType != "docx" && $FileType != "doc" && $FileType != "pdf" && $FileType != "txt" ) {
  			//echo "Sorry, only DOC, DOCX, PDF files are allowed.";
  			$uploadOk = 0;
			}

// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
 			// echo "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
		} else {
  			if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
 				//echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
				$final_filepath = __dir__."/".$target_file;
			
				$upload_query = "INSERT into papers (Title,Abstract,File_Path,Contact_Mail_Id)
                     			VALUES ('$title','$abstract' ,'$final_filepath','$contact_mailid')";

			

        			$result_qry= mysqli_query($con, $upload_query);

					if ($result_qry){
				
						$final_result='<div class="alert alert-success">Thank You! I will be in touch</div>';
					}else {
    						$final_result='<div class="alert alert-danger">Sorry there was an error sending your message. Please try again later</div>';
  						}

  			} else {
    				$final_result='<div class="alert alert-danger">Sorry there was an error sending your message. Please try 			again later</div>';
  				}
	}
}
?>