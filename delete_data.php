<?php
include 'mysqli.config.php';
?>
<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <div class="row m-auto p-4 mt-4">
            <div class="col-ml-6  offset-m-4">


                <form class="p-3  bg-light-subtle" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <div class=" header text-center">
                        <h1>Select ID And Delete Record</h1>
                    </div>
                    <div class="form-group">
                        <label class="form-label">ID</label>
                        <input type="number" name="id" class="form-control">
                    </div>
                    <button type="submit" name="delete" class="btn btn-success w-100">Delete</button>
                </form>
                <div class="py-3 m-auto text-center">
                    <div class="py-3 m-auto text-center">
                        <button class="btn btn-success"><a href="update_data.php" class="text-light ">Update</a></button>
                        <button class="btn btn-success"><a href="insert_data.php" class="text-light ">Insert</a></button>
                        <button class="btn btn-success"><a href="display.php" class="text-light ">Display</a></button>
                        <button class="btn btn-success"><a href="index.php" class="text-light ">Back To Home</a></button>
                    </div>
                </div>

            </div>
        </div>
    </div> -->
<?php

// if (isset($_POST['delete'])) {
$id = $_GET['id'];
$query = "DELETE from user_master where id='$id'";
// print($query);
// exit;
$result = mysqli_query($con, $query);
if ($result) {
    header("location:index.php");
}
// }
?>
<!-- </body>

</html> -->