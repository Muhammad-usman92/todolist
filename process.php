<?php
session_start();
$con=mysqli_connect('localhost','root','','crud' );

if(mysqli_connect_error()){
    die("connection Error");

}

if(isset($_POST['save'])){
    $name=$_POST['name'];
    $location=$_POST['location'];
    

    $con->query( "INSERT INTO data(name,location) VALUES('$name','$location')") or
    die($con->error);

    $_SESSION['message']="record has been saved";
    $_SESSION['msg_type']=" Success";
    header("location:index.php");
}

if(isset($_GET['delete'])){
    $id=$_GET['delete'];

    $con->query("DELETE FROM data WHERE id=$id") or 

    die($con->error());
    $_SESSION['message']="record has been deleted";
    $_SESSION['msg_type']=" Danger";
    header("location:index.php");
}

?>