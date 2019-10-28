<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        h1 {
            text-align: center;
        }
    </style>
</head>

<body>
    <h1>Hello blyat!</h1>

    <h1><a href="movies.php">Go to movies</a></h1>
    <h1><a href="directors.php">Go to directors</a></h1>







    <div>
        <?php
        require_once '../db.php';
        $db = "moviedb";

        $connect = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, $db);

        if (!$connect) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // var_dump($connect);

        $sql = 'SELECT * FROM movies ORDER BY release_date DESC LIMIT 3';
        $result = mysqli_query($connect, $sql);

        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while ($row = mysqli_fetch_assoc($result)) { // $row will be false when there is nothing anymore
                // mysqli_fetch_assoc "moves the cursor" returns the next value from the DB
                echo "<div>id: " . $row["movie_id"] . " - Name: " . $row["name"] . " " . $row["release_date"] . " views: " . $row["views"] . "</div><br>";
            }
        } else {
            echo "0 results";
        }



        ?>
    </div>
</body>

</html>