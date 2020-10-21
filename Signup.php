<?php
session_start();

$ID = filter_input(INPUT_POST, 'ID');
$Fullname = filter_input(INPUT_POST, 'Fullname');
$Password = filter_input(INPUT_POST, 'Password');
$Username = filter_input(INPUT_POST, 'Username');
$Email = filter_input(INPUT_POST, 'Email');
$Role = filter_input(INPUT_POST, 'Role');
if (!empty($Username)){
if (!empty($Password)){
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "mysql";
// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
if (mysqli_connect_error()){
die('Connect Error ('. mysqli_connect_errno() .') '
. mysqli_connect_error());
}
else{
$sql = "INSERT INTO portalspasial (ID, Fullname, Username, Email, Password, Role)
values ('$ID','$Fullname','$Username','$Email','$Password','$Role')";

if ($conn->query($sql)){
header('Location: Menu_fix.html');
}
else{
echo "Error: ". $sql ."
". $conn->error;
}
$conn->close();
}
}
else{
echo "Password should not be empty";
die();
}
}
else{
echo "Username should not be empty";
die();
}
?>

