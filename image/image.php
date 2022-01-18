
<?php

$image = " ";
$editor = false;
$msg = "";

$con = mysqli_connect("localhost", "root", "", "datatable");

// if(!$con){
//     echo 'error';
// }else{
//     echo 'connect';
// }

if (isset($_POST['submit'])) {
    // echo "ok";

    $imageName = $_FILES['image']['name'];
    $tmpName = $_FILES['image']['tmp_name'];
    $folder = "Image/" . $imageName;

    $sql = "INSERT INTO image (image) VALUES ('$imageName')";

    mysqli_query($con, $sql);


    if (move_uploaded_file($tmpName, $folder)) {
        $msg = "Image uploaded";
    } else {
        $msg = "image not";
    }

    header("Location: upload.php");
}


if (isset($_GET['delete'])) {

    $id = $_GET['delete'];
    echo $id;
    $result = mysqli_query($con, "DELETE FROM image WHERE id=$id ")
        or die(mysqli_error($con));
    header("Location: upload.php");
}

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $editor = true;
    //  echo $id;

    $result = mysqli_query($con, "SELECT * FROM image WHERE id=$id ")
        or die(mysqli_error($con));

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $image = $row['image'];
    }
}

if (isset($_POST['update'])) {
    $id = $_POST['updateId'];
    // echo $id;

    // $imageName = $_FILES['image']['name'];
    // $tmpName = $_FILES['image']['tmp_name'];
    // $folder = "Image/" . $imageName;

    $imageName = $_FILES['image']['name'];
    $tmpName = $_FILES['image']['tmp_name'];
    $folder = "Image/" . $imageName;
    // $image = $_POST['image'];

    $sql=mysqli_query($con, "UPDATE image SET image='$imageName' WHERE id=$id ")
     or die(mysqli_error($con));

     if (move_uploaded_file($tmpName, $folder)) {
        $msg = "Image uploaded";
    } else {
        $msg = "image not";
    }

    header("Location: upload.php");

}
