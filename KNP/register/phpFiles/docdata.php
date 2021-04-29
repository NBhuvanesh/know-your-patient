<?php
include 'config.php';



$webdomain = 'https://knowyourpatient.herokuapp.com/';







$name = $_REQUEST['name'];
$imr = $_REQUEST['imr'];
//$gender = $_POST['gender'];
$state = $_REQUEST['state'];
$district = $_REQUEST['district'];
$email = $_REQUEST['email'];
$password = $_REQUEST['password'];

$emailsql = "SELECT email FROM DoctorDetails WHERE email='$email'";
$eresult = mysqli_query($conn, $emailsql);
$a = mysqli_num_rows($eresult);

$sql1 = "SELECT imr FROM DoctorDetails WHERE imr='$imr'";
$result = mysqli_query($conn, $sql1);
if ($a > 0) {
  echo "This Email is already Taken";
}
elseif (mysqli_num_rows($result) > 0) {
  echo "IMR number already Exist";
}


else{
  $hash = md5( rand(0,1000) ); 
  $active = 'F';
$sql = "INSERT INTO DoctorDetails (name, imr, district, state, email,password,hash,activate)
VALUES ('$name', '$imr', '$district', '$state', '$email','$password','$hash','$active')";

if ($conn->query($sql) === TRUE) {
  echo '1>'.$webdomain.'verify.php?email='.$email.'&hash='.$hash;
} else {
 // echo "Error: " . $sql . "<br>" . $conn->error;
}

}


$conn->close();
?>


