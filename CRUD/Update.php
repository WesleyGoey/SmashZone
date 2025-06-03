<?php include_once("ShowTable.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data</title>
</head>
<body>
    <h1>Update User Data</h1>
    <?php
        $data_to_be_updated = $_GET["updateID"];
        getUserID($data_to_be_updated);
    ?>

    <form action="">
        
    </form>

</body>
</html>