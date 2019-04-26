<?php
require_once 'login.php';
$link = mysqli_connect("localhost", "root", "ashok@12345","users") or die("Error " . mysqli_error($link));
if( isset($_POST['submit']) ) {	
    echo '<script>alert("entered"); </script>';
    // prevent sql injections/ clear user invalid inputs
    $username = trim($_POST['username']);
    $username = strip_tags($username);
    $username = htmlspecialchars($username);

    $email = trim($_POST['email']);
    $email = strip_tags($email);
    $email = htmlspecialchars($email);

    $phonenumber = trim($_POST['phonenumber']);
    $phonenumber = strip_tags($phonenumber);
    $phonenumber = htmlspecialchars($phonenumber);

    $password = trim($_POST['password']);
    $password = strip_tags($password);
    $password = htmlspecialchars($password);

     $error=false;


    if (empty($username)){
        $error = true;
        $usernameError = "Please enter username.";
    }  
    if (empty($email)){
        $error = true;
        $emailError = "Please enter email.";
    } 

    if (empty($phonenumber)){
        $error = true;
        $phonenumberError = "Please enter phonenumber.";
    } 
    if (empty($password)){
        $error = true;
        $passwordError = "Please enter password.";
    } 

    $password = hash('sha256', $password);

    if (!$error) {
        $query = "INSERT INTO login(username,Email,phonenumber,password) VALUES('$username','$email','$phonenumber','$password')";
        $res = mysqli_query($link,$query);
        if ($res) {
            $errTyp = "success";
            $errMSG = "Successfully created a login";
            unset($email);
            unset($pass);
            unset($password);
            header("Refresh:3");
        } else {
            $errTyp = "danger";
            $errMSG = "Something went wrong, try again later...";	
            header("Refresh:3");
        }	
            
    }
    
}
?>
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
height:250px;
width:750px;
margin-left:32%;
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
E-mail:<input type="email" name="email" placeholder="email" required><br><br>
<div class="text-danger"><?php echo $emailError; ?></div>
Phone Number:<input type="text" name="phonenumber" placeholder="phonenumber" required><br><br>
<div class="text-danger"><?php echo $phonenumberError; ?></div>
Password:<input type="password" name="password" placeholder="password" required><br><br>
<div class="text-danger"><?php echo $passwordError; ?></div>
<input type="submit" name="submit"value="submit">

</form>
</div>
</body>


</html>
