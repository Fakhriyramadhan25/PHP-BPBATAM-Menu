	<?php
	//mengatasi error notice dan warning
	//error ini biasa muncul jika dijalankan di localhost, jika online tidak ada masalah

    session_start();
    // If the user is not logged in redirect to the login page...
    if (!isset($_SESSION['loggedin'])) {
        header('Location: Log_in.html');
        exit;
    }


	error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

    // Parameter Database
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'root';
    $DATABASE_PASS = '';
    $DATABASE_NAME = 'mysql';


    //koneksi ke database
    $conn = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
    if ( mysqli_connect_errno() ) {

	// If there is an error with the connection, stop the script and display the error.
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());}


	//proses jika tombol submit di klik
	if(isset($_POST['submit'])){
		//membuat variabel untuk menyimpan data inputan yang di isikan di form
		$username_baru			= $_POST['username_baru'];
        $fullname_baru          = $_POST['fullname_baru'];
        $email_baru             = $_POST['email_baru'];
        $id_baru                = $_SESSION['ID'];

		//cek dahulu ke database dengan query SELECT



        $update 		= $conn->query("UPDATE portalspasial SET Username='$username_baru', Email='$email_baru', Fullname='$fullname_baru' WHERE ID='$id_baru'");
        if($update){
            //kondisi jika proses query UPDATE berhasil
            header('Location: Profile.php');
        }else{
//            kondisi jika proses query gagal
            $msg="User Gagal berubah";
            echo '<script type="text/javascript">
            alert("$msg");
            </script>';
        }
        }else{
            //kondisi jika password baru yang dimasukkan kurang dari 5 karakter
            echo 'Data Gagal';
        }



	?>
