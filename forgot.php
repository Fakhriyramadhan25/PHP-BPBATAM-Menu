<?php
session_start();


// Change this to your connection info.
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'mysql';


// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {

	// If there is an error with the connection, stop the script and display the error.
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());}

    // Now we check if the data from the login form was submitted, isset() will check if the data exists.
//    if ( !isset($_POST['Username']) {
//	// Could not get the data that should have been sent.
//	exit('Please fill the fields!');}

// Prepare our SQL, preparing the SQL statement will prevent SQL injection.
if ($stmt = $con->prepare('SELECT ID FROM portalspasial WHERE Email = ?')) {

	// Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
    $Email = $_POST['Email'];
	$stmt->bind_param('s', $_POST['Email']);
	$stmt->execute();
	// Store the result so we can check if the account exists in the database.
	$stmt->store_result();

if ($stmt->num_rows > 0) {
	$stmt->bind_result($ID);
	$stmt->fetch();
    $con->query("INSERT INTO lahan (Cekforgot, Email) values (TRUE,'$Email')");
    header('Location: Menu_fix.html');
}

    else {
//	 Incorrect username




    $msg="try again";
    echo "<script type='text/javascript'>alert('$msg');</script>";
    echo "coba lagi";
    header('Location: Forgot_Password.html',TRUE);

}

	$stmt->close();
}
?>
