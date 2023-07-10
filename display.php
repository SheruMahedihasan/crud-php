<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</head>

<body>

    <?php
    include 'mysqli.config.php';
    ?>

    <table class="table bg-light-subtle border-light-subtle text-center">
        <div class="head mt-5 text-center">
            <h2> User Data</h2>
        </div>
        <thead>
            <tr>
                <th>id</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Password</th>
                <th>Action</th>
            </tr>
        </thead>

        <?php
        $query = "select * from user_master";
        $result = mysqli_query($con, $query);
        $data = mysqli_num_rows($result);
        if ($data != 0) {
            $data = mysqli_num_rows($result);
            while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['password']; ?></td>
                    <td> <a href='update_data.php?id=<?php echo $row['id']; ?>'><input type='submit' value='Edit' class='update'></a>
                        <a href='delete_data.php?id=<?php echo $row['id']; ?>'>
                            <button onclick='return confirm("Are you sure delete?")'>DELETE</button>
                        </a>
                    </td>
                </tr>
            <?php    }
        } else {  ?>
            <tr>
                <td><b>No Result...........</b></td>
            </tr>
        <?php
        }
        ?>

    </table>
    <div class="py-3 m-auto text-center">
        <button class="btn btn-success"><a href="insert_data.php" class="text-light ">Insert</a></button>
        <button class="btn btn-success"><a href="index.php" class="text-light ">Back To Home</a></button>
    </div>
</body>

</html>