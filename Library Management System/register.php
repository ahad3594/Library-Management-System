<?php
include "db.php";

if (isset($_POST['register'])) {

    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $dob = $_POST['dob'];
    $cnic = $_POST['cnic'];
    $address = $_POST['address'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // 1️⃣ Confirm password check
    if ($password != $confirm_password) {

        echo "<p style='color:red;'>Passwords do not match</p>";

    } else {

        // 2️⃣ Email already exists check
        $check_email = mysqli_query($conn,
            "SELECT * FROM users WHERE email='$email'");

        if (mysqli_num_rows($check_email) > 0) {

            echo "<p style='color:red;'>Email already exists</p>";

        } else {

            // 3️⃣ Insert admin record
            $query = "INSERT INTO users 
            (first_name, middle_name, last_name, dob, cnic, address, username, email, password, role)
            VALUES 
            ('$first_name', '$middle_name', '$last_name', '$dob', '$cnic', '$address', '$username', '$email', '$password', 'admin')";

            if (mysqli_query($conn, $query)) {
                echo "<p style='color:green;'>Admin Registered Successfully</p>";
            } else {
                echo "<p style='color:red;'>Registration Failed</p>";
            }
        }
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Admin Registration</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Admin Registration Form</h2>

<form method="POST">

    <input type="text" name="first_name" placeholder="First Name" required><br><br>

    <input type="text" name="middle_name" placeholder="Middle Name"><br><br>

    <input type="text" name="last_name" placeholder="Last Name" required><br><br>

    <input type="date" name="dob" required><br><br>

    <input type="text" name="cnic" placeholder="CNIC" required><br><br>

    <textarea name="address" placeholder="Address" required></textarea><br><br>

    <input type="email" name="email" placeholder="Email" required><br><br>

    <input type="text" name="username" placeholder="Username" required><br><br>

    <input type="password" name="password" placeholder="Password" required><br><br>

    <input type="password" name="confirm_password" placeholder="Confirm Password" required><br><br>

    <div class="btn-row">
        <button type="submit" name="register">Register Admin</button>
        <button type="button" onclick="window.location.href='login.php'">
            Back to Login
        </button>
    </div>

</form>


</body>
</html>
