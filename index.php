<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>PHP CRUD</title>
</head>

<body>
    <?php require_once('process.php') ?>

    <?php
    if (isset($_SESSION['message'])) {
    ?>
        <div class="alert alert-<?= $_SESSION['msg-type'] ?> ">
            <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);
            ?>
        </div>

    <?php
    }
    ?>

    <div class="container">
        <?php
        $con = new mysqli('localhost', 'root', '', 'data') or die(mysqli_error($con));

        $result = mysqli_query($con, "SELECT * FROM crud") or die($con->error);

        // print_r($result);
        // print_r($result->fetch_assoc());
        // print_r($result->fetch_assoc());
        ?>

        <form class="row justify-content-center" action="">
            <table class="table">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>name</th>
                        <th>age</th>
                        <th>phone</th>
                        <th>location</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>

                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                ?>

                    <tr>
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['name'] ?></td>
                        <td><?php echo $row['age'] ?></td>
                        <td><?php echo $row['phone'] ?></td>
                        <td><?php echo $row['location'] ?> </td>
                        <td>
                            <a href="index.php?edit=<?php echo $row['id']; ?> " class="btn btn-info">Edit</a>

                            <a href="process.php?delete=<?php echo $row['id']; ?> " class="btn btn-danger">Delete</a>
                        </td>
                    </tr>

                <?php } ?>
            </table>
        </form>


        <div class="row justify-content-center">
            <form action="process.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $id ?>">

                <div class="form-group">
                    <label> Name </label>
                    <input type="text" name="name" class="form-control" value="<?php echo $name ?>" placeholder="Enter your name">
                </div>

                <div class="form-group">
                    <label for="">Age</label>
                    <input type="text" name="age" class="form-control" value="<?php echo $age ?>" placeholder="Enter your age">
                </div>

                <div class="form-group">
                    <label for="">Phone</label>
                    <input type="text" name="phone" class="form-control" value="<?php echo $phone ?>" placeholder="Enter your phone">
                </div>

                <div class="form-group">
                    <label for="">Location</label>
                    <input type="text" name="location" class="form-control" value="<?php echo $location ?>" placeholder="Enter your location">
                </div>

                <div class="form-group">
                    <?php
                    if ($update === true) {
                    ?>
                        <button class="btn btn-info" type="submit" name="update">Update</button>

                    <?php
                    } else {
                    ?>
                        <button class="btn btn-primary" type="submit" name="save">Save</button>
                    <?php } ?>
                </div>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>