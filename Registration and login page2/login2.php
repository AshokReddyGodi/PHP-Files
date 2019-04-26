<?php
require_once 'login.php';
$link = mysqli_connect("localhost", "root", "ashok@12345","users") or die("Error " . mysqli_error($link));
if(isset($_POST['submit']) ) {	

    $error=false;

    $username = trim($_POST['username']);
    $username = strip_tags($username);
    $username = htmlspecialchars($username);
    
    $password = trim($_POST['password']);
    $password = strip_tags($password);
    $password = htmlspecialchars($password);
    
    
    if(empty($username)){
    $error = true;
    $usernameError = "Please enter your username.";
    } 
    
    if(empty($password)){
    $error = true;
    $passwordError = "Please enter your password.";
    }
    
    
    // if there's no error, continue to login
    if (!$error) {
    
    $password = hash('sha256', $password); // password hashing using SHA256
    
    
    $res=mysqli_query($link,"SELECT id,username,password FROM login WHERE username='$username'");
    
    
    $row=mysqli_fetch_array($res);
    $count = mysqli_num_rows($res); // if uname/pass correct it returns must be 1 row
    
    if( $count == 1 && $row['password']==$password ) {
    
    $_SESSION['login'] = $row['id'];
    header("Location:loginform.php");
    } else {
    $errMSG = "Incorrect Credentials, Try again...";
    }
    
    }
} ?>

<html>
<head>
<title>
Login Form
</title>
<style>
.container{
background-color:#0000cd;
color:white;
font-size:25px;
text-align:center;
margin-top:20%;
height:450px;
width:1050px;
margin-left:02%;
}

</style>


</head>
<body>

<div class="container">

<?php
if ( isset($errMSG) ) {
?>
				<div class="form-group">
            	<div class="alert alert-danger">
				<span class="fa fa-check"> </span>  <?php echo $errMSG; ?>
                </div>
            	</div>
                <?php
                }
?>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post"><br>

Username:<input type="text" name="username" placeholder="username" required><br><br>
<div class="text-danger"><?php echo $usernameError; ?></div>
Password:<input type="password" name="password" placeholder="password" required><br><br>
<div class="text-danger"><?php echo $passwordError; ?></div>
<input type="submit" name="submit"value="submit">

</form>
</div>
</body>


</html>
