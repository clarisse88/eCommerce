<?php
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$Phone = $_POST['Phone'];
$email = $_POST['email'];
$address = $_POST['address'];
$city = $_POST['city'];
$postalCode = $_POST['postalCode'];

$password = $_POST['password'];


// Database connection
$conn = new mysqli('localhost','root','','demodb');
if($conn->connect_error){
    //echo "$conn->connect_error";
    die("Connection Failed : ". $conn->connect_error);
}
else
{
    echo "connection is sound";
    //(cusID, firstName, lastName, phone, email,city,postalCode,address, password)
    $stmt = $conn->prepare("Insert into customer(CusID, firstName, lastName, phone, email,city,postalCode,address, password) values(?,?,?,?,?,?,?,?,?)");
    $numb="123";
    echo $firstName, $lastName, $Phone, $email,$address,$city,$postalCode, $password;
    $stmt->bind_param("issssssss",$nub, $firstName, $lastName, $Phone, $email,$address,$city,$postalCode, $password);
    $stmt->execute();
    //echo $execval;
    echo "Registration successfully...";
    $stmt->close();
    $conn->close();
}
?>