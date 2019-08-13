<?php
$url='localhost';
$username='workf_easyway';
$password='easylink';
$conn=mysqli_connect($url,$username,$password,"workf_easyway");
if(!$conn){
 die('Could not Connect My Sql:' .mysql_error());
}
?>