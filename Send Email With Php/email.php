<?php
if(isset($_POST['submit'])) {
	$name=$_POST['name'];
		$email=$_POST['email'];
			$phone=$_POST['phone'];
				$msg=$_POST['msg'];

				$to='ashokgodi1996@gmail.com';
				$subject='Form Submission';
				$message="name: ".$name."\n". "phone: ".$phone."\n". "wrote the following:" ."\n\n".$msg ."\n"."email :".$email;
				$header="From: ".$email;

				if(mail($to, $subject, $message, $header)) {
					echo "<h1>sent successfully! thank you"." " .$name.", we will contact you shortly </h1>";
                              }
                              else{
                              	echo "something went wrong";
}
}

?>