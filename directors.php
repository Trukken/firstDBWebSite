<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .pic {
            width: 355px;
            height: 200px;
        }
    </style>
</head>

<body>













    <?php
    require_once './db.php';

    $db = 'moviedb';

    $connect = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, $db);

    $sql = "SELECT * FROM directors";
    $result = mysqli_query($connect, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) { // $row will be false when there is nothing anymore
            // mysqli_fetch_assoc "moves the cursor" returns the next value from the DB
            echo "<div><a href='director.php?director_id=" . $row['director_id'] . "'> pic: <img class='pic' src='" . $row["picture_path"] . "'> - Name: " . $row["name"] . " " . $row["birth_date"] . "</a></div><br>";
        }
    } else {
        echo "0 results";
    }

    mysqli_close($connect);






    ?>
</body>

</html>