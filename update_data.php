<?php
include 'mysqli.config.php';

$id = $_GET['id'];



$query = "SELECT * from user_master where id='$id'";

$result = mysqli_query($con, $query);

$row = mysqli_fetch_array($result);

if (!$row) {
    echo "Record not Found";
    die();
}
?>

<html>

<head>
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <div class="row m-auto p-4 mt-4">
            <div class="col-ml-6  offset-m-4">

                <form class="p-3  bg-light-subtle" method="post" action=" ">
                    <div class=" header text-center">
                        <h1>Edit User Information</h1>
                    </div>

                    <br>
                    <!-- <div class="form-group">
                        <label class="form-label">id</label>
                        <input type="number" name="id" value="" class="form-control">
                    </div> -->
                    <div class="form-group">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" value="<?php echo $row['name']; ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Phone</label>
                        <input type="number" name="phone" value="<?php echo $row['phone']; ?>" class="form-control">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" value="<?php echo $row['email']; ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" value="<?php echo $row['password']; ?>" class="form-control">
                    </div>

                    <div class="py-3 m-auto text-center">
                        <button type="submit" name="update" class="btn btn-success w-100">Update</button>
                        <div class="py-3 m-auto text-center">
                            <button class="btn btn-success"><a href="insert_data.php" class="text-light ">Insert</a></button>
                            <button class="btn btn-success"><a href="display.php" class="text-light ">Display</a></button>
                            <button class="btn btn-success"><a href="index.php" class="text-light ">Back To Home</a></button>
                        </div>
                    </div>


                </form>

            </div>
        </div>
    </div>
</body>

</html>

<?php

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query1 = "UPDATE user_master SET name='$name',phone='$phone',email='$email',password='$password' where id='$id'";
    $result1 = mysqli_query($con, $query1);
    if ($result1) {
        echo '<script>alert("Record Updated")</script>';
        header("location:display.php");
    }
}
?>