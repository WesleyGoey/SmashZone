<?php include_once('Controller.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Guest Book Entry</title>
</head>

<body>
    <h1>Create New User</h1>

    <form action="Insert.php" method="post">
        <p>Username: <input type="text" name="create_username" required></p>
        <p>Email: <input type="email" name="create_email" required></p>
        <p>Password: <input type="text" name="create_password" required></p>
        <p>Phone: <input type="text" name="create_phone" required></p>
        <p>isAdmin: <input type="checkbox" name="create_isAdmin" value="1"></p>
        <p><input type="submit" name="create_submit" value="Create Entry"></p>
    </form>

    <?php
    if (isset($_POST['create_submit'])) {
        $username = $_POST['create_username'];
        $email = $_POST['create_email'];
        $password = $_POST['create_password'];
        $phone = $_POST['create_phone'];
        $isAdmin = isset($_POST['create_isAdmin']) ? 1 : 0;

        $result = createUser($username, $email, $password, $phone, $isAdmin);

        if ($result == 1) {
    ?>
        <h1>CREATE USER DATA SUCCESS</h1>
        <p>Username: <?= $username ?></p>
        <p>Email: <?= $email ?></p>
        <p>Password: <?= $password ?></p>
        <p>Phone: <?= $phone ?></p>
        <p>isAdmin: <?= $isAdmin ?></p>
        <p><a href="index.php">Back to Main</a></p>
    <?php
        }
    }
    ?>
</body>

</html>