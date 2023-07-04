<?php
$con = mysqli_connect("localhost", "root", "", "user_system");

if ($con->connect_error) {
    die('failed');
}
