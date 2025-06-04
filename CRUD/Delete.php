<?php include_once 'controller.php'; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Delete Guest Book Entry</title>
    </head>
    <body>
        <h1> delete guestbook data</h1>
        <?php
        $data_to_be_deleted = $_GET["deleteID"];
        $resultDelete = deleteUser($data_to_be_deleted);
        echo $resultDelete;
        ?>
        <a href="main.php">Back to Main</a>
    </body>
</html>