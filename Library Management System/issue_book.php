<?php
include "db.php";
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$msg = "";

// ISSUE BOOK LOGIC
if (isset($_POST['issue'])) {

    $student_name = $_POST['student_name'];
    $roll_no      = $_POST['roll_no'];
    $department   = $_POST['department'];
    $book_id      = $_POST['book_id'];
    $issue_date   = $_POST['issue_date'];

    // Check book quantity
    $q = mysqli_query($conn, "SELECT quantity FROM books WHERE book_id = $book_id");
    $row = mysqli_fetch_assoc($q);

    if ($row['quantity'] > 0) {

        // Insert into issued_books
        mysqli_query($conn,
            "INSERT INTO issued_books
            (book_id, student_name, roll_no, department, issue_date)
            VALUES
            ($book_id, '$student_name', '$roll_no', '$department', '$issue_date')"
        );

        // Decrease book quantity
        mysqli_query($conn,
            "UPDATE books SET quantity = quantity - 1 WHERE book_id = $book_id"
        );

        $msg = "Book Issued Successfully";

    } else {
        $msg = "Book Not Available";
    }
}

// Fetch books for dropdown
$books = mysqli_query($conn, "SELECT * FROM books WHERE quantity > 0");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Issue Book</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Issue Book</h2>

<?php
if ($msg != "") {
    echo "<p><b>$msg</b></p>";
}
?>

<form method="POST">

    <input type="text" name="student_name" placeholder="Student Name" required>
    <br><br>

    <input type="text" name="roll_no" placeholder="Roll No" required>
    <br><br>

    <select name="department" required>
        <option value="">Select Department</option>
        <option value="Computer Science">Computer Science</option>
        <option value="IT">IT</option>
        <option value="BBA">BBA</option>
        <option value="Electrical">Electrical</option>
    </select>
    <br><br>

    <select name="book_id" required>
        <option value="">Select Book</option>
        <?php while ($b = mysqli_fetch_assoc($books)) { ?>
            <option value="<?php echo $b['book_id']; ?>">
                <?php echo $b['title']; ?>
            </option>
        <?php } ?>
    </select>
    <br><br>

    <input type="date" name="issue_date" required>
    <br><br>

    <div class="btn-row">
        <button type="submit" name="issue">Issue Book</button>
        <button type="button" onclick="window.location.href='dashboard.php'">
            Back to Dashboard
        </button>
    </div>
</form>



</body>
</html>
