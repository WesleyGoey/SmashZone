<?php include_once("Controller.php");
if (isset($_GET["deleteUserID"])) {
    $data_to_be_deleted = $_GET["deleteUserID"];
    $result = deleteUsers($data_to_be_deleted);
    if ($result == 1) {
        echo "<h1>Delete User Data with ID $data_to_be_deleted SUCCESS</h1>";
    } else {
        echo "<h1>Delete User Data with ID $data_to_be_deleted FAILED</h1>";
    }
}
if (isset($_GET["deleteFieldID"])) {
    $data_to_be_deleted = $_GET["deleteFieldID"];
    $result = deleteFields($data_to_be_deleted);
    if ($result == 1) {
        echo "<h1>Delete Field Data with ID $data_to_be_deleted SUCCESS</h1>";
    } else {
        echo "<h1>Delete Field Data with ID $data_to_be_deleted FAILED</h1>";
    }
}
if (isset($_GET["deleteReviewID"])) {
    $data_to_be_deleted = $_GET["deleteReviewID"];
    $result = deleteReviews($data_to_be_deleted);
    if ($result == 1) {
        echo "<h1>Delete Review Data with ID $data_to_be_deleted SUCCESS</h1>";
    } else {
        echo "<h1>Delete Review Data with ID $data_to_be_deleted FAILED</h1>";
    }
}
if (isset($_GET["deleteBookingID"])) {
    $data_to_be_deleted = $_GET["deleteBookingID"];
    $result = deleteBookings($data_to_be_deleted);
    if ($result == 1) {
        echo "<h1>Delete Booking Data with ID $data_to_be_deleted SUCCESS</h1>";
    } else {
        echo "<h1>Delete Booking Data with ID $data_to_be_deleted FAILED</h1>";
    }
}
