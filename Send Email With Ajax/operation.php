<?php
error_reporting(E_ALL & ~(E_STRICT|E_NOTICE));
function emailfunctiona($subject,$message,$to)
{
$snname = "WebsiteEnquiry - Disruptive Technologies"; //senders name
$snmail = "ashokgodi1996@gmail.com"; //senders e-mail adress
$headers = "From: ". $snname . " <" . $snmail . ">\r\n";
$headers.='MIME-Version: 1.0'."\r\n";
$headers.='Content-type: text/html; charset=iso-8859-1'."\r\n";
mail($to, $subject, $message, $headers);
}	
$operation=$_POST['operation'];
$name=$_POST['c_name'];
$email=$_POST['c_email'];
$mobile=$_POST['c_mobile'];
$msg=$_POST['c_message'];
$adminmsg="
	 Name: ".$name."<br>
	 Email : ".$email."<br>
	 Mobile : ".$mobile."<br>
     Query : ".$msg."<br>";
	$usermessage="Thank you for visiting Disruptive Technologies website - TNTDPC.<br>
	We appreciate your interest.<br> our team will contact you soon<br>
	Warmest Regards,<br> 
	ashok kumar reddy godi B.tech
	";
	$adminemail='ashokgodi1996@gmail.com' ;
	$useremail=$email;
	$subject='We will contact you soon.';
	switch($operation)
		{
	 case 'Sendmail':
	 emailfunctiona($subject,$usermessage,$email);
	 emailfunctiona($subjectw,$adminmsg,$adminemail);
	 break;
		
		}

?>