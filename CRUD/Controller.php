<?php
function my_connectDB()
{
    $host = "localhost";
    $user = "root";
    $pwd = "";
    $db = "SmashZone";
    $conn = mysqli_connect($host, $user, $pwd, $db) or die("Error connect to database");
    return $conn;
}

function my_closeDB($conn)
{
    mysqli_close($conn);
}

function createUsers($username, $email, $password, $phone, $isAdmin)
{
    if ($username != "" && $email != "" && $password != "" && $phone != "" && $isAdmin != "") {
        $conn = my_connectDB();
        $sql_query = "INSERT INTO Users (username, email, password, phone, isAdmin) 
                      VALUES ('$username', '$email', '$password', '$phone', '$isAdmin')";
        $result = mysqli_query($conn, $sql_query) or die(mysqli_error($conn));
        my_closeDB($conn);
    }
    return $result;
}

function readUsers()
{
    $allData = array();
    $conn = my_connectDB();
    if ($conn != NULL) {
        $sql_query = "SELECT * FROM Users";
        $result = mysqli_query($conn, $sql_query) or die(mysqli_error($conn));
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data['user_id'] = $row["user_id"];
                $data['username'] = $row["username"];
                $data['email'] = $row["email"];
                $data['password'] = $row["password"];
                $data['phone'] = $row["phone"];
                $data['isAdmin'] = $row["isAdmin"];
                array_push($allData, $data);
            }
        }
        my_closeDB($conn);
    }
    return $allData;
}

function deleteUser($user_id)
{
    if ($user_id > 0) {
        $conn = my_connectDB();
        $sql_query = "DELETE FROM Users WHERE user_id = " . $user_id;
        $result = mysqli_query($conn, $sql_query) or die("Error: " . mysqli_error($conn));
        my_closeDB($conn);
        return $result;
    }
    return false;
}
function getUserID($user_id)
{
    $data = array();
    $conn = my_connectDB();
    if ($conn != NULL) {
        $sql_query = "SELECT * FROM Users WHERE user_id = '$user_id'";
        $result = mysqli_query($conn, $sql_query) or die(mysqli_error($conn));
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data['user_id'] = $row["user_id"];
                $data['username'] = $row["username"];
                $data['email'] = $row["email"];
                $data['password'] = $row["password"];
                $data['phone'] = $row["phone"];
                $data['isAdmin'] = $row["isAdmin"];
            }
        }
    }
    my_closeDB($conn);
    return $data;
}

function updateUsers($user_id, $username, $email, $password, $phone, $isAdmin)
{
    if ($user_id != "" && $username != "" && $email != "" && $password != "" && $phone != "" && $isAdmin != "") {
        $conn = my_connectDB();
        $sql_query = "UPDATE Users 
                        SET username = '$username', 
                            email = '$email', 
                            password = '$password', 
                            phone = '$phone', 
                            isAdmin = '$isAdmin' 
                        WHERE user_id = '$user_id'";
        $result = mysqli_query($conn, $sql_query) or die(mysqli_error($conn));
        my_closeDB($conn);
    }
    return $result;
}

function deleteUsers($user_id)
{
    $result = false;
    if ($user_id != "") {
        $conn = my_connectDB();
        $sql_query = "DELETE FROM Users WHERE user_id = '$user_id'";
        $result = mysqli_query($conn, $sql_query) or die(mysqli_error($conn));
        my_closeDB($conn);
    }
    return $result;
}

function createFields($field_name, $price_per_hour)
{
    if ($field_name != "" && $price_per_hour != "") {
        $conn = my_connectDB();
        $sql_query = "INSERT INTO Fields (field_name, price_per_hour) 
                      VALUES ('$field_name', '$price_per_hour')";
        $result = mysqli_query($conn, $sql_query) or die(mysqli_error($conn));
        my_closeDB($conn);
    }
    return $result;
}

function readFields()
{
    $allData = array();
    $conn = my_connectDB();
    if ($conn != NULL) {
        $sql_query = "SELECT * FROM Fields";
        $result = mysqli_query($conn, $sql_query) or die(mysqli_error($conn));
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data['field_id'] = $row["field_id"];
                $data['field_name'] = $row["field_name"];
                $data['price_per_hour'] = $row["price_per_hour"];
                array_push($allData, $data);
            }
        }
    }
    return $allData;
}

function getFieldID($field_id)
{
    $data = array();
    $conn = my_connectDB();
    if ($conn != NULL) {
        $sql_query = "SELECT * FROM Fields WHERE field_id = '$field_id'";
        $result = mysqli_query($conn, $sql_query) or die(mysqli_error($conn));
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data['field_id'] = $row["field_id"];
                $data['field_name'] = $row["field_name"];
                $data['price_per_hour'] = $row["price_per_hour"];
            }
        }
    }
    my_closeDB($conn);
    return $data;
}

function updateFields($field_id, $field_name, $price_per_hour)
{
    if ($field_id != "" && $field_name != "" && $price_per_hour != "") {
        $conn = my_connectDB();
        $sql_query = "UPDATE Fields 
                        SET field_name = '$field_name', 
                            price_per_hour = '$price_per_hour'
                        WHERE field_id = '$field_id'";
        $result = mysqli_query($conn, $sql_query) or die(mysqli_error($conn));
        my_closeDB($conn);
    }
    return $result;
}

function deleteFields($field_id)
{
    $result = false;
    if ($field_id != "") {
        $conn = my_connectDB();
        $sql_query = "DELETE FROM Fields WHERE field_id = '$field_id'";
        $result = mysqli_query($conn, $sql_query) or die(mysqli_error($conn));
        my_closeDB($conn);
    }
    return $result;
}

function createReviews($user_id, $rating, $comment, $review_date)
{
    if ($user_id != "" && $rating != "" && $comment != "" && $review_date != "") {
        $conn = my_connectDB();
        $sql_query = "INSERT INTO Reviews (user_id, rating, comment, review_date) 
                      VALUES ('$user_id', '$rating', '$comment', '$review_date')";
        $result = mysqli_query($conn, $sql_query) or die(mysqli_error($conn));
        my_closeDB($conn);
    }
    return $result;
}

function readReviews()
{
    $allData = array();
    $conn = my_connectDB();
    if ($conn != NULL) {
        $sql_query = "SELECT * FROM Reviews";
        $result = mysqli_query($conn, $sql_query) or die(mysqli_error($conn));
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data['review_id'] = $row["review_id"];
                $data['user_id'] = $row["user_id"];
                $data['rating'] = $row["rating"];
                $data['comment'] = $row["comment"];
                $data['review_date'] = $row["review_date"];
                array_push($allData, $data);
            }
        }
    }
    return $allData;
}

function getReviewID($review_id)
{
    $data = array();
    $conn = my_connectDB();
    if ($conn != NULL) {
        $sql_query = "SELECT * FROM Reviews WHERE review_id = '$review_id'";
        $result = mysqli_query($conn, $sql_query) or die(mysqli_error($conn));
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data['review_id'] = $row["review_id"];
                $data['user_id'] = $row["user_id"];
                $data['rating'] = $row["rating"];
                $data['comment'] = $row["comment"];
                $data['review_date'] = $row["review_date"];
            }
        }
    }
    my_closeDB($conn);
    return $data;
}

function updateReviews($review_id, $user_id, $rating, $comment, $review_date)
{
    if ($review_id != "" && $user_id != "" && $rating != "" && $comment != "" && $review_date != "") {
        $conn = my_connectDB();
        $sql_query = "UPDATE Reviews 
                        SET user_id = '$user_id', 
                            rating = '$rating', 
                            comment = '$comment', 
                            review_date = '$review_date'
                        WHERE review_id = '$review_id'";
        $result = mysqli_query($conn, $sql_query) or die(mysqli_error($conn));
        my_closeDB($conn);
    }
    return $result;
}

function deleteReviews($review_id)
{
    $result = false;
    if ($review_id != "") {
        $conn = my_connectDB();
        $sql_query = "DELETE FROM Reviews WHERE review_id = '$review_id'";
        $result = mysqli_query($conn, $sql_query) or die(mysqli_error($conn));
        my_closeDB($conn);
    }
    return $result;
}

function createTransactions($user_id, $booking_id, $order_date, $amount, $payment_method, $payment_date, $isPaid)
{
    $result = false;
    // isPaid boleh 0 (tidak perlu cek != "")
    if ($user_id != "" && $booking_id != "" && $order_date != "" && $amount != "") {
        $conn = my_connectDB();
        $sql_query = "INSERT INTO Transactions (user_id, booking_id, order_date, amount, payment_method, payment_date, isPaid) 
                      VALUES ('$user_id', '$booking_id', '$order_date', '$amount', '$payment_method', '$payment_date', '$isPaid')";
        $result = mysqli_query($conn, $sql_query) or die(mysqli_error($conn));
        my_closeDB($conn);
    }
    return $result;
}

function readTransactions()
{
    $allData = array();
    $conn = my_connectDB();
    if ($conn != NULL) {
        $sql_query = "SELECT * FROM Transactions";
        $result = mysqli_query($conn, $sql_query) or die(mysqli_error($conn));
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data['transaction_id'] = $row["transaction_id"];
                $data['user_id'] = $row["user_id"];
                $data['booking_id'] = $row["booking_id"];
                $data['order_date'] = $row["order_date"];
                $data['amount'] = $row["amount"];
                $data['payment_method'] = $row["payment_method"];
                $data['payment_date'] = $row["payment_date"];
                $data['isPaid'] = $row["isPaid"];
                array_push($allData, $data);
            }
        }
    }
    return $allData;
}

function getTransactionID($transaction_id)
{
    $data = array();
    $conn = my_connectDB();
    if ($conn != NULL) {
        $sql_query = "SELECT * FROM Transactions WHERE transaction_id = '$transaction_id'";
        $result = mysqli_query($conn, $sql_query) or die(mysqli_error($conn));
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data['transaction_id'] = $row["transaction_id"];
                $data['user_id'] = $row["user_id"];
                $data['booking_id'] = $row["booking_id"];
                $data['order_date'] = $row["order_date"];
                $data['amount'] = $row["amount"];
                $data['payment_method'] = $row["payment_method"];
                $data['payment_date'] = $row["payment_date"];
                $data['isPaid'] = $row["isPaid"];
            }
        }
    }
    my_closeDB($conn);
    return $data;
}

function updateTransactions($transaction_id, $user_id, $booking_id, $order_date, $amount, $payment_method, $payment_date, $isPaid)
{
    if ($transaction_id != "" && $user_id != "" && $booking_id != "" && $order_date != "" && $amount != "") {
        $conn = my_connectDB();
        if ($isPaid == 0) {
            $payment_method = "NULL";
            $payment_date = "NULL";
        }
        else {
            $payment_method = "'$payment_method'";
            $payment_date = "'$payment_date'";
        }
        $sql_query = "UPDATE Transactions 
                        SET user_id = '$user_id',
                            booking_id = '$booking_id', 
                            order_date = '$order_date',
                            amount = '$amount', 
                            payment_method = $payment_method, 
                            payment_date = $payment_date, 
                            isPaid = '$isPaid'
                        WHERE transaction_id = '$transaction_id'";
        $result = mysqli_query($conn, $sql_query) or die(mysqli_error($conn));
        my_closeDB($conn);
    }
    return $result;
}

function deleteTransactions($transaction_id)
{
    $result = false;
    if ($transaction_id != "") {
        $conn = my_connectDB();
        $sql_query = "DELETE FROM Transactions WHERE transaction_id = '$transaction_id'";
        $result = mysqli_query($conn, $sql_query) or die(mysqli_error($conn));
        my_closeDB($conn);
    }
    return $result;
}

function createBookings($order_name, $field_id, $booking_date, $start_time, $end_time, $booking_price, $status)
{
    $result = false;
    if ($order_name != "" && $field_id != "" && $booking_date != "" && $start_time != "" && $end_time != "" && $booking_price != "") {
        $conn = my_connectDB();
        $sql_query = "INSERT INTO Bookings (order_name, field_id, booking_date, start_time, end_time, booking_price, status) 
                      VALUES ('$order_name', '$field_id', '$booking_date', '$start_time', '$end_time', '$booking_price', '$status')";
        $result = mysqli_query($conn, $sql_query) or die(mysqli_error($conn));
        my_closeDB($conn);
    }
    return $result;
}

function readBookings()
{
    $allData = array();
    $conn = my_connectDB();
    if ($conn != NULL) {
        $sql_query = "SELECT * FROM Bookings";
        $result = mysqli_query($conn, $sql_query) or die(mysqli_error($conn));
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data['booking_id'] = $row["booking_id"];
                $data['order_name'] = $row["order_name"];
                $data['field_id'] = $row["field_id"];
                $data['booking_date'] = $row["booking_date"];
                $data['start_time'] = $row["start_time"];
                $data['end_time'] = $row["end_time"];
                $data['booking_price'] = $row["booking_price"];
                $data['status'] = $row["status"];
                array_push($allData, $data);
            }
        }
    }
    return $allData;
}

function getBookingID($booking_id)
{
    $data = array();
    $conn = my_connectDB();
    if ($conn != NULL) {
        $sql_query = "SELECT * FROM Bookings WHERE booking_id = '$booking_id'";
        $result = mysqli_query($conn, $sql_query) or die(mysqli_error($conn));
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data['booking_id'] = $row["booking_id"];
                $data['order_name'] = $row["order_name"];
                $data['field_id'] = $row["field_id"];
                $data['booking_date'] = $row["booking_date"];
                $data['start_time'] = $row["start_time"];
                $data['end_time'] = $row["end_time"];
                $data['booking_price'] = $row["booking_price"];
                $data['status'] = $row["status"];
            }
        }
    }
    my_closeDB($conn);
    return $data;
}

function updateBookings($booking_id, $order_name, $field_id, $booking_date, $start_time, $end_time, $booking_price, $status)
{
    if ($booking_id != "" && $order_name != "" && $field_id != "" && $booking_date != "" && $start_time != "" && $end_time != "" && $booking_price != "" && $status != "") {
        $conn = my_connectDB();
        $sql_query = "UPDATE Bookings 
                        SET order_name = '$order_name',
                            field_id = '$field_id',
                            booking_date = '$booking_date', 
                            start_time = '$start_time', 
                            end_time = '$end_time', 
                            booking_price = '$booking_price',
                            status = '$status'
                        WHERE booking_id = '$booking_id'";
        $result = mysqli_query($conn, $sql_query) or die(mysqli_error($conn));
        my_closeDB($conn);
    }
    return $result;
}

function deleteBookings($booking_id)
{
    $result = false;
    if ($booking_id != "") {
        $conn = my_connectDB();
        $sql_query = "DELETE FROM Bookings WHERE booking_id = '$booking_id'";
        $result = mysqli_query($conn, $sql_query) or die(mysqli_error($conn));
        my_closeDB($conn);
    }
    return $result;
}

function updateUserProfilePicture($user_id, $profile_picture_path)
{
    $result = false;
    if ($user_id != "") {
        $conn = my_connectDB();
        if ($conn) {
            try {
                if ($profile_picture_path == "") {
                    $sql_query = "UPDATE Users SET profile_picture=NULL WHERE user_id='$user_id'";
                } else {
                    $profile_picture_path_sql = mysqli_real_escape_string($conn, $profile_picture_path);
                    $sql_query = "UPDATE Users SET profile_picture='$profile_picture_path_sql' WHERE user_id='$user_id'";
                }
                $result = mysqli_query($conn, $sql_query);
                if (!$result) {
                    error_log("SQL Error: " . mysqli_error($conn));
                }
            } catch (Exception $e) {
                error_log("Exception: " . $e->getMessage());
            }
            my_closeDB($conn);
        }
    }
    return $result;
}

