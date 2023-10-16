<?php
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

//database connection


$conn = new mysqli('localhost','root','test');
if($conn->connect_error){

    die('connection failed:'.$conn->connect_error);


}else{
    $stmt = $conn->prepare("insert into users(username,email,password)values(?,?,?)");
    $stmt->bind_param("varchar,varchar,varchar" , $username,$email,$password);
    $stmt->execute();
    echo "signup success";
    $stmt->close();
    $conn->close();
}