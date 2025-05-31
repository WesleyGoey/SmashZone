<?php include 'ShowTable.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Read All Data</h1>
    <?php
    $result = readUser();
    foreach ($result as $row) { 
    ?>
        <ul>
            <li><?= $row['user_id'] ?></li>
            <li><?= $row['username'] ?></li>
            <li><?= $row['email'] ?></li>
            <li><?= $row['password'] ?></li>
            <li><?= $row['phone'] ?></li>
        </ul>
    <?php
    }
    ?>
</body>
</html>
