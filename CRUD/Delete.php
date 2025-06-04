<?php include_once 'Controller.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete User Entry</title>
</head>

<body>
    <h1> delete user data</h1>
    <?php
    if (isset($_GET["deleteUserID"])) {
        $data_to_be_deleted = $_GET["deleteUserID"];
        $resultDelete = deleteUser($data_to_be_deleted);
        if ($resultDelete) {
            echo "<h1>DELETE USER DATA with ID $data_to_be_deleted SUCCESS</h1>";
        } else {
            echo "<h1>DELETE USER DATA with ID $data_to_be_deleted FAILED</h1>";
        }
    }
    ?>
    <a href="index.php">Back to Main</a>
</body>

</html>