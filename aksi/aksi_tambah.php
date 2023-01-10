<?php
include "../koneksi.php";
 
// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$nama = mysqli_real_escape_string($conn, $_REQUEST['nama']);
$email = mysqli_real_escape_string($conn, $_REQUEST['email']);
$komentar = mysqli_real_escape_string($conn, $_REQUEST['komentar']);
$alamat = mysqli_real_escape_string($conn, $_REQUEST['alamat']);
 
// Attempt insert query execution
$sql = "INSERT INTO buku_tamu (nama, email, komentar, alamat) VALUES ('$nama', '$email', '$komentar', '$alamat')";
if(mysqli_query($conn, $sql)){
	header("location: ../index.php#guestbook");
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
 
// Close connection
mysqli_close($conn);
?>