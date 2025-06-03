<?php include_once("ShowTable.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data</title>
</head>
<body>
    <?php
    if (isset($_GET["updateID"])) {
        $data_to_be_updated = $_GET["updateID"];
        $data = getUserID($data_to_be_updated);
    ?>

    <form action="Update.php" method="POST">
        <p>UserID: <input type="text" name="update_user_id" value="<?= $data['user_id'] ?>"></p>
        <p>Username: <input type="text" name="update_username" value="<?= $data['username'] ?>"></p>
        <p>Email: <input type="email" name="update_email" value="<?= $data['email'] ?>"></p>
        <p>Password: <input type="password" name="update_password" value="<?= $data['password'] ?>"></p>
        <p>Phone: <input type="text" name="update_phone" value="<?= $data['phone'] ?>"></p>
        <p>isAdmin: <input type="checkbox" name="update_isAdmin" value="1" <?= $data['isAdmin'] ? 'checked' : '' ?>></p>
        <p><input type="submit" name="update_submit" /></p>

    </form>

    <?php
    }
    if (isset($_POST['update_submit'])) {
        $user_id = $_POST['update_user_id'];
        $username = $_POST['update_username'];
        $email = $_POST['update_email'];
        $password = $_POST['update_password'];
        $phone = $_POST['update_phone'];
        $isAdmin = isset($_POST['update_isAdmin']) ? 1 : 0;

        $result = updateUsers($user_id, $username, $email, $password, $phone, $isAdmin);
        echo $result;

        if ($result == 1) {
    ?>
    <h1>Update User Data with ID <?= $user_id ?> SUCCESS</h1>
    <p>Username : <?= $username?></p>
    <p>Email : <?= $email?></p>
    <p>Password : <?= $password?></p>
    <p>Phone : <?= $phone?></p>
    <p>isAdmin : <?= $isAdmin?></p>

    <?php
        }
    }

    ?>
</body>
</html>