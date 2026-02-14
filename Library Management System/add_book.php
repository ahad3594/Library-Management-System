<?php
include "db.php";
session_start();

if (isset($_POST['add'])) {

    $title = $_POST['title'];
    $author = $_POST['author'];
    $isbn = $_POST['isbn'];
    $quantity = $_POST['quantity'];
   

    mysqli_query($conn,
        "INSERT INTO books (title, author, isbn, quantity)
         VALUES ('$title', '$author', '$isbn', '$quantity')");

    echo "<p style='color:green;'>Book Added Successfully</p>";
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Add Book</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>

<h2>Add Book</h2>

<form method="POST">
    <input type="text" name="title" placeholder="Book Title" required><br><br>
    <input type="text" name="author" placeholder="Author" required><br><br>
    <input type="text" name="isbn" placeholder="ISBN" required><br><br>
    <input type="number" name="quantity" placeholder="Quantity" required><br><br>

    <!-- BUTTON ROW -->
    <div class="btn-row">
        <button type="submit" name="add">Add Book</button>
        <button type="button" onclick="window.location.href='dashboard.php'">
            Back to Dashboard
        </button>
    </div>
</form>





</body>
</html>
