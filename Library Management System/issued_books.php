<?php
include "db.php";
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

/* ===== RETURN BOOK LOGIC ===== */
if (isset($_GET['return_id'])) {

    $issue_id = $_GET['return_id'];

    // get book_id from issued_books
    $q = mysqli_query($conn,
        "SELECT book_id FROM issued_books WHERE issue_id = $issue_id");
    $row = mysqli_fetch_assoc($q);
    $book_id = $row['book_id'];

    // delete issued record
    mysqli_query($conn,
        "DELETE FROM issued_books WHERE issue_id = $issue_id");

    // increase book quantity
    mysqli_query($conn,
        "UPDATE books SET quantity = quantity + 1 WHERE book_id = $book_id");

    header("Location: issued_books.php");
    exit();
}

/* ===== FETCH ISSUED BOOKS ===== */
$result = mysqli_query($conn,
    "SELECT issued_books.*, books.title
     FROM issued_books
     JOIN books ON issued_books.book_id = books.book_id"
);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Issued Books</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Issued Books List</h2>

<table border="1" cellpadding="10">
    <tr>
        <th>Book Name</th>
        <th>Student Name</th>
        <th>Roll No</th>
        <th>Department</th>
        <th>Issue Date</th>
        <th>Action</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
        <td><?php echo $row['title']; ?></td>
        <td><?php echo $row['student_name']; ?></td>
        <td><?php echo $row['roll_no']; ?></td>
        <td><?php echo $row['department']; ?></td>
        <td><?php echo $row['issue_date']; ?></td>
        <td>
            <a href="issued_books.php?return_id=<?php echo $row['issue_id']; ?>"
               onclick="return confirm('Return this book?');">
               Return
            </a>
        </td>
    </tr>
    <?php } ?>
</table>

<div class="back-btn">
    <button type="button" onclick="window.location.href='dashboard.php'">
        Back to Dashboard
    </button>
</div>



</body>
</html>
