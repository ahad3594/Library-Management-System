<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>

<h2><b>Library Management System</b></h2>



<br>

<ul>
    <li><a href="add_book.php"><b>Add Book</b></a></li>
    <li><a href="view_books.php"><b>View Books</b></a></li>
    <li><a href="issue_book.php"><b> Issue Book</b></a></li>
    <li><a href="issued_books.php"><b>Issued Books</b></a></li>
    <li><a href="logout.php"><b>Logout</b></a></li>
</ul>

</body>
</html>
