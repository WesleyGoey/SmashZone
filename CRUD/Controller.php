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
                $data['user_id'] = $row["user_id"];
                $data['field_id'] = $row["field_id"];
                $data['booking_date'] = $row["booking_date"];
                $data['start_time'] = $row["start_time"];
                $data['end_time'] = $row["end_time"];
                $data['status'] = $row["status"];
                array_push($allData, $data);
            }
        }
    }
    return $allData;
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
                $data['booking_id'] = $row["booking_id"];
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

function getUserID($user_id)
{
    $data = array();
    $conn = my_connectDB();
    if ($conn != NULL) {
        $sql_query = "SELECT * FROM Users WHERE user_id = " . $user_id;
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
        $sql_query = "SELECT * FROM Fields WHERE field_id = " . $field_id;
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
        $sql_query = "SELECT * FROM Reviews WHERE review_id = " . $review_id;
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
                $data['user_id'] = $row["user_id"];
                $data['field_id'] = $row["field_id"];
                $data['booking_date'] = $row["booking_date"];
                $data['start_time'] = $row["start_time"];
                $data['end_time'] = $row["end_time"];
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
        $sql_query = "SELECT * FROM Bookings WHERE booking_id = " . $booking_id;
        $result = mysqli_query($conn, $sql_query) or die(mysqli_error($conn));
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data['booking_id'] = $row["booking_id"];
                $data['user_id'] = $row["user_id"];
                $data['field_id'] = $row["field_id"];
                $data['booking_date'] = $row["booking_date"];
                $data['start_time'] = $row["start_time"];
                $data['end_time'] = $row["end_time"];
                $data['status'] = $row["status"];
            }
        }
    }
    my_closeDB($conn);
    return $data;
}

function updateBookings($booking_id, $user_id, $field_id, $booking_date, $start_time, $end_time, $status)
{
    if ($booking_id != "" && $user_id != "" && $field_id != "" && $booking_date != "" && $start_time != "" && $end_time != "" && $status != "") {
        $conn = my_connectDB();
        $sql_query = "UPDATE Bookings 
                        SET user_id = '$user_id', 
                            field_id = '$field_id', 
                            booking_date = '$booking_date', 
                            start_time = '$start_time', 
                            end_time = '$end_time', 
                            status = '$status'
                        WHERE booking_id = '$booking_id'";
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
                $data['booking_id'] = $row["booking_id"];
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
        $sql_query = "SELECT * FROM Transactions WHERE transaction_id = " . $transaction_id;
        $result = mysqli_query($conn, $sql_query) or die(mysqli_error($conn));
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data['transaction_id'] = $row["transaction_id"];
                $data['booking_id'] = $row["booking_id"];
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

function updateTransactions($transaction_id, $booking_id, $amount, $payment_method, $payment_date, $isPaid)
{
    if ($transaction_id != "" && $booking_id != "" && $amount != "" && $payment_method != "" && $payment_date != "" && $isPaid != "") {
        $conn = my_connectDB();
        $sql_query = "UPDATE Transactions 
                        SET booking_id = '$booking_id', 
                            amount = '$amount', 
                            payment_method = '$payment_method', 
                            payment_date = '$payment_date', 
                            isPaid = '$isPaid'
                        WHERE transaction_id = '$transaction_id'";
        $result = mysqli_query($conn, $sql_query) or die(mysqli_error($conn));
        my_closeDB($conn);
    }
    return $result;
}
