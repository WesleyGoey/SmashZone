<?php include_once("Controller.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wesley Goeinawan - Nicholas Gerwin Mawardji</title>
</head>

<body>
    <h1>Read All Users Data</h1>
    <a href="insert.php">Create New User</a>
    <?php
    $result = readUsers();
    foreach ($result as $row) {
    ?>
        <ul>
            <li><?= $row["user_id"] ?></li>
            <li><?= $row["username"] ?></li>
            <li><?= $row["email"] ?></li>
            <li><?= $row["password"] ?></li>
            <li><?= $row["phone"] ?></li>
            <li><?= $row["isAdmin"] ?></li>
        </ul>
        <a href="Update.php?updateUserID=<?= $row['user_id'] ?>">Update</a>
        <a href="Delete.php?deleteUserID=<?= $row['user_id'] ?>">Delete</a>
    <?php
    }
    ?>

    <h1>Read All Fields Data</h1>
    <?php
    $result = readFields();
    foreach ($result as $row) {
    ?>
        <ul>
            <li><?= $row["field_id"] ?></li>
            <li><?= $row["field_name"] ?></li>
            <li><?= $row["price_per_hour"] ?></li>
        </ul>
        <a href="Update.php?updateFieldID=<?= $row['field_id'] ?>">Update</a>
    <?php
    }
    ?>

    <h1>Read All Reviews Data</h1>
    <?php
    $result = readReviews();
    foreach ($result as $row) {
    ?>
        <ul>
            <li><?= $row["review_id"] ?></li>
            <li><?= $row["user_id"] ?></li>
            <li><?= $row["rating"] ?></li>
            <li><?= $row["comment"] ?></li>
            <li><?= $row["review_date"] ?></li>
        </ul>
        <a href="Update.php?updateReviewID=<?= $row['review_id'] ?>">Update</a>
    <?php
    }
    ?>

    <h1>Read All Bookings Data</h1>
    <?php
    $result = readBookings();
    foreach ($result as $row) {
    ?>
        <ul>
            <li><?= $row["booking_id"] ?></li>
            <li><?= $row["user_id"] ?></li>
            <li><?= $row["field_id"] ?></li>
            <li><?= $row["booking_date"] ?></li>
            <li><?= $row["start_time"] ?></li>
            <li><?= $row["end_time"] ?></li>
            <li><?= $row["status"] ?></li>
        </ul>
        <a href="Update.php?updateBookingID=<?= $row['booking_id'] ?>">Update</a>
    <?php
    }
    ?>

    <h1>Read All Transactions Data</h1>
    <?php
    $result = readTransactions();
    foreach ($result as $row) {
    ?>
        <ul>
            <li><?= $row["transaction_id"] ?></li>
            <li><?= $row["booking_id"] ?></li>
            <li><?= $row["amount"] ?></li>
            <li><?= $row["payment_method"] ?></li>
            <li><?= $row["payment_date"] ?></li>
            <li><?= $row["isPaid"] ?></li>
        </ul>
        <a href="Update.php?updateTransactionID=<?= $row['transaction_id'] ?>">Update</a>
    <?php
    }
    ?>
</body>

</html>