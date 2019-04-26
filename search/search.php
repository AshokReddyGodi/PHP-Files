<?php
error_reporting(0);
$conn = mysqli_connect("localhost","root","ashok@12345","registration");
if(count($_POST)>0) {
$id=$_POST[id];
$result = mysqli_query($conn,"SELECT * FROM users where id='$id' ");
}
?>
<!DOCTYPE html>
<html>
<head>
<title> Retrive data</title>
<style>
table, th, td {
    border: 1px solid black;
}
</style>
</head>
<body>
<table>
<tr>
<td>Username</td>
<td>Email</td>

</tr>
<?php
$i=0;
while($row = mysqli_fetch_array($result)) {
?>
<tr>
<td><?php echo $row["username"]; ?></td>
<td><?php echo $row["email"]; ?></td>
</tr>
<?php
$i++;
}
?>
</table>
</body>
</html>