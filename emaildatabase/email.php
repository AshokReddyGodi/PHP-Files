<?php

extract($_POST);
include("database.php");

$query="insert into signup(name,email,phone,msg) values('$name','$email','$phone','$msg')";
$rs=mysqli_query($conn,$query)or die("Could Not Perform the Query");


if(isset($_POST['submit'])) {
	$name=$_POST['name'];
		$email=$_POST['email'];
			$phone=$_POST['phone'];
				$msg=$_POST['msg'];
				$to='ashok@easylinkindia.com';
				$subject='Form Submission';
				$message="name: ".$name."\n". "phone: ".$phone."\n". "wrote the following:" ."\n\n".$msg ."\n"."email :".$email;
				$header="From: ".$email;
				if(mail($to, $subject, $message, $header)) {
					echo "<h1>Successfully Registered and have sent email, thank you"." " .$name.",  we will contact you shortly </h1>";
                              }
                              else{
                              	echo "something went wrong";
}
}
?>