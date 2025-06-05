<?php include_once("Controller.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data</title>
</head>

<body>
    <?php
    if (isset($_GET["updateUserID"])) {
        $data_to_be_updated = $_GET["updateUserID"];
        $data = getUserID($data_to_be_updated);
    ?>

        <form action="Update.php" method="POST">
            <p>UserID: <input type="text" name="update_user_id" value="<?= $data['user_id'] ?>"></p>
            <p>Username: <input type="text" name="update_username" value="<?= $data['username'] ?>"></p>
            <p>Email: <input type="email" name="update_email" value="<?= $data['email'] ?>"></p>
            <p>Password: <input type="password" name="update_password" value="<?= $data['password'] ?>"></p>
            <p>Phone: <input type="text" name="update_phone" value="<?= $data['phone'] ?>"></p>
            <p>isAdmin: <input type="checkbox" name="update_isAdmin" value="1" <?= $data['isAdmin'] ? 'checked' : '' ?>></p>
            <p><input type="submit" name="update_user_submit" value="UPDATE" /></p>

        </form>

        <?php
    }
    if (isset($_POST['update_user_submit'])) {
        $user_id = $_POST['update_user_id'];
        $username = $_POST['update_username'];
        $email = $_POST['update_email'];
        $password = $_POST['update_password'];
        $phone = $_POST['update_phone'];
        $isAdmin = isset($_POST['update_isAdmin']) ? 1 : 0;

        $resultUsers = updateUsers($user_id, $username, $email, $password, $phone, $isAdmin);

        if ($resultUsers == 1) {
        ?>
            <h1>Update User Data with ID <?= $user_id ?> SUCCESS</h1>
            <p>Username : <?= $username ?></p>
            <p>Email : <?= $email ?></p>
            <p>Password : <?= $password ?></p>
            <p>Phone : <?= $phone ?></p>
            <p>isAdmin : <?= $isAdmin ?></p>

        <?php
        }
    }

    if (isset($_GET["updateFieldID"])) {
        $data_to_be_updated = $_GET["updateFieldID"];
        $fields = readFields();
        $data = null;
        foreach ($fields as $f) {
            if ($f['field_id'] == $data_to_be_updated) {
                $data = $f;
                break;
            }
        }
        if ($data) {
        ?>
            <form action="Update.php" method="POST">
                <p>Field ID: <input type="text" name="update_field_id" value="<?= $data['field_id'] ?>"></p>
                <p>Field Name: <input type="text" name="update_field_name" value="<?= $data['field_name'] ?>"></p>
                <p>Price per Hour: <input type="number" name="update_price_per_hour" value="<?= $data['price_per_hour'] ?>"></p>
                <p><input type="submit" name="update_field_submit" value="UPDATE" /></p>
            </form>
        <?php
        }
    }
    if (isset($_POST['update_field_submit'])) {
        $field_id = $_POST['update_field_id'];
        $field_name = $_POST['update_field_name'];
        $price_per_hour = $_POST['update_price_per_hour'];

        $resultFields = updateFields($field_id, $field_name, $price_per_hour);

        if ($resultFields == 1) {
        ?>
            <h1>Update Field Data with ID <?= $field_id ?> SUCCESS</h1>
            <p>Field Name : <?= $field_name ?></p>
            <p>Price per Hour : <?= $price_per_hour ?></p>
        <?php
        }
    }

    if (isset($_GET["updateReviewID"])) {
        $data_to_be_updated = $_GET["updateReviewID"];
        $reviews = readReviews();
        $data = null;
        foreach ($reviews as $r) {
            if ($r['review_id'] == $data_to_be_updated) {
                $data = $r;
                break;
            }
        }
        if ($data) {
        ?>
            <form action="Update.php" method="POST">
                <p>Review ID: <input type="text" name="update_review_id" value="<?= $data['review_id'] ?>"></p>
                <p>User ID: <input type="text" name="update_review_user_id" value="<?= $data['user_id'] ?>"></p>
                <p>Rating: <input type="number" name="update_review_rating" value="<?= $data['rating'] ?>"></p>
                <p>Comment: <input type="text" name="update_review_comment" value="<?= $data['comment'] ?>"></p>
                <p>Review Date: <input type="text" name="update_review_date" value="<?= $data['review_date'] ?>"></p>
                <p><input type="submit" name="update_review_submit" value="UPDATE" /></p>
            </form>
        <?php
        }
    }
    if (isset($_POST['update_review_submit'])) {
        $review_id = $_POST['update_review_id'];
        $user_id = $_POST['update_review_user_id'];
        $rating = $_POST['update_review_rating'];
        $comment = $_POST['update_review_comment'];
        $review_date = $_POST['update_review_date'];

        $resultReviews = updateReviews($review_id, $user_id, $rating, $comment, $review_date);

        if ($resultReviews == 1) {
        ?>
            <h1>Update Review Data with ID <?= $review_id ?> SUCCESS</h1>
            <p>User ID : <?= $user_id ?></p>
            <p>Rating : <?= $rating ?></p>
            <p>Comment : <?= $comment ?></p>
            <p>Review Date : <?= $review_date ?></p>
        <?php
        }
    }

    if (isset($_GET["updateTransactionID"])) {
        $data_to_be_updated = $_GET["updateTransactionID"];
        $transactions = readTransactions();
        $data = null;
        foreach ($transactions as $t) {
            if ($t['transaction_id'] == $data_to_be_updated) {
                $data = $t;
                break;
            }
        }
        if ($data) {
        ?>
            <form action="Update.php" method="POST">
                <p>Transaction ID: <input type="text" name="update_transaction_id" value="<?= $data['transaction_id'] ?>"></p>
                <p>User ID: <input type="text" name="update_transaction_user_id" value="<?= $data['user_id'] ?>"></p>
                <p>Booking ID: <input type="text" name="update_transaction_booking_id" value="<?= $data['booking_id'] ?>"></p>
                <p>Order Date: <input type="text" name="update_transaction_order_date" value="<?= $data['order_date'] ?>"></p>
                <p>Amount: <input type="number" name="update_transaction_amount" value="<?= $data['amount'] ?>"></p>
                <p>Payment Method: <input type="text" name="update_transaction_payment_method" value="<?= $data['payment_method'] ?>"></p>
                <p>Payment Date: <input type="text" name="update_transaction_payment_date" value="<?= $data['payment_date'] ?>"></p>
                <p>isPaid: <input type="checkbox" name="update_transaction_isPaid" value="1" <?= $data['isPaid'] ? 'checked' : '' ?>></p>
                <p><input type="submit" name="update_transaction_submit" value="UPDATE" /></p>
            </form>
        <?php
        }
    }
    if (isset($_POST['update_transaction_submit'])) {
        $transaction_id = $_POST['update_transaction_id'];
        $user_id = $_POST['update_transaction_user_id'];
        $booking_id = $_POST['update_transaction_booking_id'];
        $amount = $_POST['update_transaction_amount'];
        $order_date = $_POST['update_transaction_order_date'];
        $payment_method = $_POST['update_transaction_payment_method'];
        $payment_date = $_POST['update_transaction_payment_date'];
        $isPaid = isset($_POST['update_transaction_isPaid']) ? 1 : 0;

        $resultTransactions = updateTransactions($transaction_id, $user_id, $booking_id, $amount, $order_date, $payment_method, $payment_date, $isPaid);

        if ($resultTransactions == 1) {
        ?>
            <h1>Update Transaction Data with ID <?= $transaction_id ?> SUCCESS</h1>
            <p>User ID : <?= $user_id ?></p>
            <p>Booking ID : <?= $booking_id ?></p>
            <p>Order Date : <?= $order_date ?></p>
            <p>Amount : <?= $amount ?></p>
            <p>Payment Method : <?= $payment_method ?></p>
            <p>Payment Date : <?= $payment_date ?></p>
            <p>isPaid : <?= $isPaid ?></p>
    <?php
        }
    }
    if (isset($_GET["updateBookingID"])) {
        $data_to_be_updated = $_GET["updateBookingID"];
        $bookings = readBookings();
        $data = null;
        foreach ($bookings as $b) {
            if ($b['booking_id'] == $data_to_be_updated) {
                $data = $b;
                break;
            }
        }
        if ($data) {
        ?>
            <form action="Update.php" method="POST">
                <p>Booking ID: <input type="text" name="update_booking_id" value="<?= $data['booking_id'] ?>"></p>
                <p>User ID: <input type="text" name="update_booking_user_id" value="<?= $data['user_id'] ?>"></p>
                <p>Field ID: <input type="text" name="update_booking_field_id" value="<?= $data['field_id'] ?>"></p>
                <p>Booking Date: <input type="text" name="update_booking_date" value="<?= $data['booking_date'] ?>"></p>
                <p>Start Time: <input type="text" name="update_booking_start_time" value="<?= $data['start_time'] ?>"></p>
                <p>End Time: <input type="text" name="update_booking_end_time" value="<?= $data['end_time'] ?>"></p>
                <p>Status: <input type="text" name="update_booking_status" value="<?= $data['status'] ?>"></p>
                <p><input type="submit" name="update_booking_submit" value="UPDATE" /></p>
            </form>
        <?php
        }
    }
    if (isset($_POST['update_booking_submit'])) {
        $booking_id = $_POST['update_booking_id'];
        $field_id = $_POST['update_booking_field_id'];
        $booking_date = $_POST['update_booking_date'];
        $start_time = $_POST['update_booking_start_time'];
        $end_time = $_POST['update_booking_end_time'];
        $booking_price = $_POST['update_booking_price'];
        $status = $_POST['update_booking_status'];

        $resultBookings = updateBookings($booking_id, $field_id, $booking_date, $start_time, $end_time, $booking_price, $status);

        if ($resultBookings == 1) {
        ?>
            <h1>Update Booking Data with ID <?= $booking_id ?> SUCCESS</h1>
            <p>Field ID : <?= $field_id ?></p>
            <p>Booking Date : <?= $booking_date ?></p>
            <p>Start Time : <?= $start_time ?></p>
            <p>End Time : <?= $end_time ?></p>
            <p>Booking Price : <?= $booking_price ?></p>
            <p>Status : <?= $status ?></p>
        <?php
        }
    }
    ?>

</body>

</html>