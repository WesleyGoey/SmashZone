<?php include_once("Controller.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Create Data</title>
</head>

<body>
    <?php
    $type = isset($_GET['type']) ? $_GET['type'] : '';

    if ($type == 'user') {
    ?>
        <form action="Create.php?type=user" method="POST">
            <p>Username: <input type="text" name="create_username"></p>
            <p>Email: <input type="email" name="create_email"></p>
            <p>Password: <input type="password" name="create_password"></p>
            <p>Phone: <input type="text" name="create_phone"></p>
            <p>isAdmin: <input type="checkbox" name="create_isAdmin" value="1"></p>
            <p><input type="submit" name="create_user_submit" value="CREATE" /></p>
        </form>
        <?php
        if (isset($_POST['create_user_submit'])) {
            $username = $_POST['create_username'];
            $email = $_POST['create_email'];
            $password = $_POST['create_password'];
            $phone = $_POST['create_phone'];
            $isAdmin = isset($_POST['create_isAdmin']) ? 1 : 0;
            $resultUsers = createUsers($username, $email, $password, $phone, $isAdmin);
            if ($resultUsers == 1) {
                echo "<h1>Create User Data SUCCESS</h1>";
            } else {
                echo "<h1>Create User Data FAILED</h1>";
            }
        }
    }

    if ($type == 'field') {
        ?>
        <form action="Create.php?type=field" method="POST">
            <p>Field Name: <input type="text" name="create_field_name"></p>
            <p>Price Per Hour: <input type="number" name="create_price_per_hour"></p>
            <p><input type="submit" name="create_field_submit" value="CREATE" /></p>
        </form>
        <?php
        if (isset($_POST['create_field_submit'])) {
            $field_name = $_POST['create_field_name'];
            $price_per_hour = $_POST['create_price_per_hour'];
            $resultFields = createFields($field_name, $price_per_hour);
            if ($resultFields == 1) {
                echo "<h1>Create Field Data SUCCESS</h1>";
            } else {
                echo "<h1>Create Field Data FAILED</h1>";
            }
        }
    }

    if ($type == 'review') {
        ?>
        <form action="Create.php?type=review" method="POST">
            <p>User ID: <input type="number" name="create_user_id"></p>
            <p>Rating: <input type="number" name="create_rating"></p>
            <p>Comment: <textarea name="create_comment"></textarea></p>
            <p><input type="submit" name="create_review_submit" value="CREATE" /></p>
        </form>
        <?php
        if (isset($_POST['create_review_submit'])) {
            $user_id = $_POST['create_user_id'];
            $rating = $_POST['create_rating'];
            $comment = $_POST['create_comment'];
            $review_date = date('Y-m-d H:i:s');
            $resultReviews = createReviews($user_id, $rating, $comment, $review_date);
            if ($resultReviews == 1) {
                echo "<h1>Create Review Data SUCCESS</h1>";
            } else {
                echo "<h1>Create Review Data FAILED</h1>";
            }
        }
    }

    if ($type == 'booking') {
    ?>
        <form action="Create.php?type=booking" method="POST">
            <p>User ID: <input type="number" name="create_booking_user_id" required></p>
            <p>Field ID: <input type="number" name="create_booking_field_id" required></p>
            <p>Booking Date: <input type="date" name="create_booking_date" required></p>
            <p>Start Time: <input type="time" name="create_booking_start_time" required></p>
            <p>End Time: <input type="time" name="create_booking_end_time" required></p>
            <p>Status: <input type="text" name="create_booking_status" required></p>
            <p><input type="submit" name="create_booking_submit" value="CREATE" /></p>
        </form>
        <?php
        if (isset($_POST['create_booking_submit'])) {
            $user_id = $_POST['create_booking_user_id'];
            $field_id = $_POST['create_booking_field_id'];
            $booking_date = $_POST['create_booking_date'];
            $start_time = $_POST['create_booking_start_time'];
            $end_time = $_POST['create_booking_end_time'];
            $status = $_POST['create_booking_status'];
            $resultBookings = createBookings($user_id, $field_id, $booking_date, $start_time, $end_time, $status);
            if ($resultBookings) {
                echo "<h1>Create Booking Data SUCCESS</h1>";
            } else {
                echo "<h1>Create Booking Data FAILED</h1>";
            }
        }
    }

    if ($type == 'transaction') {
    ?>
        <form action="Create.php?type=transaction" method="POST">
            <p>Booking ID: <input type="number" name="create_transaction_booking_id" required></p>
            <p>Amount: <input type="number" name="create_transaction_amount" required></p>
            <p>Payment Method: <input type="text" name="create_payment_method" required></p>
            <p>Payment Date: <input type="datetime-local" name="create_payment_date" required></p>
            <p>Is Paid: <input type="checkbox" name="create_is_paid" value="1"></p>
            <p><input type="submit" name="create_transaction_submit" value="CREATE" /></p>
        </form>
    <?php
        if (isset($_POST['create_transaction_submit'])) {
            $booking_id = $_POST['create_transaction_booking_id'];
            $amount = $_POST['create_transaction_amount'];
            $payment_method = $_POST['create_payment_method'];
            $payment_date = $_POST['create_payment_date'];
            $isPaid = isset($_POST['create_is_paid']) ? 1 : 0;
            $resultTransactions = createTransactions($booking_id, $amount, $payment_method, $payment_date, $isPaid);
            if ($resultTransactions) {
                echo "<h1>Create Transaction Data SUCCESS</h1>";
            } else {
                echo "<h1>Create Transaction Data FAILED</h1>";
            }
        }
    }
    ?>
</body>
</html>