<?php

session_start();

$name = '';
$location = '';
$age='';
$phone='';

$id = 0;
$update = false;

// connect to database
$mysqli = new mysqli('localhost', 'root', '', 'data') or die(mysqli_error($mysqli));

// test database?????

// if($mysqli){
//     echo "connected!";
// }


// press save button

if (isset($_POST['save'])) {
    // echo "press";
    $name = $_POST['name'];
    $age = $_POST['age'];
    $phone = $_POST['phone'];
    $location = $_POST['location'];

    $mysqli->query("INSERT INTO crud (name, age,phone, location) VALUES ('$name','$age','$phone', '$location') ")
        or die($mysqli->error);

    $_SESSION['message'] = "Record has been saved";
    $_SESSION['msg-type'] = "success";
    //this code is equal to above code to insert data to db

    //  mysqli_query( $mysqli, "INSERT INTO crud (name, location) VALUES ('$name', '$location')") or die($mysqli->error);;

    //  change page you want to go

    header('Location: index.php');
}

// press delete button
if (isset($_GET['delete'])) {

    $id = $_GET['delete'];
    // echo $id;

    $mysqli->query("DELETE FROM crud WHERE id=$id ") or die($mysqli->error);

    $_SESSION['message'] = "Record has been deleted";
    $_SESSION['msg-type'] = "danger";
    
    header("Location: index.php");
}

//press edit button

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $update = true;

    $result = $mysqli->query("SELECT * FROM crud WHERE id=$id ") or die($mysqli->error);

    // if(count($result)===1){
    if (mysqli_num_rows($result) > 0) {
        $row = $result->fetch_assoc();
        
        $name = $row['name'];
        $age = $row['age'];
        // echo $age;
        $phone = $row['phone'];
        //  echo $phone;
        $location = $row['location'];
    }
}

//press update button
if (isset($_POST['update'])) {
    // echo $id;
    $id = $_POST['id'];
    // echo $id;
    $name = $_POST['name'];
    $age = $_POST['age'];
    $phone = $_POST['phone'];
    $location = $_POST['location'];

    $mysqli->query("UPDATE crud SET  name = '$name' , age= '$age' , phone = '$phone',  location = '$location' WHERE id=$id ")
        or die($mysqli->error);
    $_SESSION['message'] = "Record has been updated";
    $_SESSION['msg-type'] = "warning";
    header('Location: index.php');
}
