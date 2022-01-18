<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>CRUDa</title>
</head>

<body>
    <?php require_once('process.php') ?>

    <?php if (isset($_SESSION['msg'])) { ?>
            <div class="alert alert-<?= $_SESSION['msg-type'] ?>">
                <?php
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
                ?>
            </div>
        <?php } ?>

    
    
    
    <div class="container">

        <?php
        $con = new mysqli('localhost', 'root', '', 'dd') or die(mysqli_error($con));

        $result = $con->query("SELECT * FROM crud ") or die($con->error);
        ?>

        <!-- for show data -->
        <form action="" class="row justify-content-center">
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Phone</th>
                        <th>Location</th>
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
                        <td><?php echo $row['location'] ?></td>
                        <td>
                            <a href="index.php?edit=<?php echo $row['id'] ?>" class="btn btn-info">Edit</a>

                            <a href="process.php?delete=<?php echo $row['id']; ?> " class="btn btn-danger">Delete</a>

                        </td>
                    </tr>

                <?php } ?>
            </table>

        </form>

        <!-- for UI design -->
        <div class="row justify-content-center">
            <form action="process.php" method="POST">

                <input type="hidden" name="id" value="<?php echo $id ?> ">


                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" placeholder="Enter your Name" value="<?php echo $name ?>" class="form-control">
                </div>

                <div class="form-group">
                    <label for="">Age</label>
                    <input type="text" name="age" placeholder="Enter your Age" value="<?php echo $age ?>" class="form-control">
                </div>

                <div class="form-group">
                    <label for="">Phone</label>
                    <input type="text" name="phone" placeholder="Enter your Phone" value="<?php echo $phone ?>" class="form-control">
                </div>

                <div class="form-group">
                    <label for="">Location</label>
                    <input type="text" name="location" placeholder="Enter your Location" value="<?php echo $location ?>" class="form-control">
                </div>
                <div class="form-group">
                    <?php if ($update === true) { ?>

                        <button type="submit" name="update" class="btn btn-info">Update</button>

                    <?php } else { ?>

                        <button type="submit" name="save" class="btn btn-primary">Save</button>
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