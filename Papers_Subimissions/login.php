<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="style.css"/>
   
</head>
<body>
<?php
    require('db.php');
    session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['email'])) {
        $email = stripslashes($_REQUEST['email']);   
        $email = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);

	$type_1 = stripslashes($_REQUEST['type']);
        $type_1 = mysqli_real_escape_string($con, $type_1);
	
	//$author = stripslashes($_REQUEST['author']);
      //  $author = mysqli_real_escape_string($con, $author);

	//$reviewer = stripslashes($_REQUEST['reviewer']);
       // $reviewer = mysqli_real_escape_string($con, $reviewer);

	//$admin = stripslashes($_REQUEST['admin']);
       // $admin = mysqli_real_escape_string($con, $admin);

        // Check user is exist in the database
        $query    = "SELECT * FROM `users` WHERE mail_id='$email'
                     AND password='" . md5($password) . "'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['email'] = $email;
// Redirect to authors dashboard page

	    if ($type_1 == 'author') {
		
            header("Location: authors_dashboard.php");
// Redirect to reviewers dashboard page
		} elseif ($type_1 == 'reviewer') {
		
            header("Location: reviewers_dashboard.php");
// Redirect to admins dashboard page
	} else {
		
		header("Location: admins_main_dashboard.php");
	}

	
        } else {
            echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }
    } else {
?>
    <form class="form" method="post" name="login">
        <h1 class="login-title">Login</h1>
        <input type="text" class="login-input" name="email" placeholder="Mail Id" autofocus="true"/>
        <input type="password" class="login-input" name="password" placeholder="Password"/>

	
  <input type="radio" name="type"
	<?php if (isset($type) && $type=="author") echo "checked";?>
	value="author">Author
	<input type="radio" name="type"
	<?php if (isset($type) && $type=="reviewer") echo "checked";?>
	value="reviewer">Reviewer
	<input type="radio" name="type"
	<?php if (isset($type) && $type=="admin") echo "checked";?>
	value="admin">Admin
	<br>

        <input type="submit" value="Login" name="submit" class="login-button"/>
        <p class="link"><a href="registration.php">New Registration</a></p>
  </form>
<?php
    }
?>
</body>
</html>