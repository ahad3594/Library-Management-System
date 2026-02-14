<?php
include "db.php";
session_start();

if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    // Simple admin login query (basic)
    $query = "SELECT * FROM users 
              WHERE username='$username' 
              AND password='$password' 
              AND role='admin'";

    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {

        $row = mysqli_fetch_assoc($result);

        // Session create
        $_SESSION['user_id'] = $row['user_id'];

        // Redirect to dashboard
        header("Location: dashboard.php");
        exit();

    } else {
        echo "<p style='color:red;'>Invalid Username or Password</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login Portal</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Admin Login Portal</h2>


<br>

<form method="POST">

    <input type="text" name="username" placeholder="Username" required>
    <br><br>

    <input type="password" name="password" placeholder="Password" required>
    <br><br>

    <div class="btn-row">
        <button type="submit" name="login">Login</button>
        <button type="button" onclick="window.location.href='register.php'">
            Register New Admin
        </button>
    </div>

</form>


</body>
</html>
