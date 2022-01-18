<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Document</title>
</head>

<body>
    <div class="container">

        <?php require_once('image.php')

        ?>


        <?php
        $con = mysqli_connect("localhost", "root", "", "datatable");

        $sql = "SELECT * FROM image";

        $result = mysqli_query($con, $sql);

        ?>
        <form class="row justify-content-center" enctype="multipart/form-data">
            <table class="table">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>image</th>
                        <th colspan="2">action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($data = mysqli_fetch_assoc($result)) {
                    ?>
                        <tr>
                            <td><?php echo $data['id'] ?></td>
                            <td><img src="Image/<?php echo $data['image'] ?>" width="100px" height="100px" alt=""></td>
                            <td>
                                <a href="upload.php?edit=<?php echo $data['id'] ?>" class="btn btn-primary">Edit</a>
                                <a href="image.php?delete=<?php echo $data['id'] ?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </form>

        <form method="POST" action="image.php" enctype="multipart/form-data">
            <input type="hidden" name="updateId" value="<?php echo $id ?>">
            <label for="">Image</label>
            <input type="file" name="image">

            <?php
            if ($editor === false) {
            ?>
                <img src="">
                <button type="submit" name="submit" class="btn btn-info">Submit</button>
            <?php
            } else {
            ?>
                <img src="Image/<?php echo $image ?>" width="100px" height="100px">
                <button type="submit" name="update" class="btn btn-success">update</button>

            <?php
            }
            ?>
        </form>
    </div>
</body>

</html>