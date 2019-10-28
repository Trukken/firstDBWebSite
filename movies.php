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
    <h1>All the movies</h1>


    <?php

    echo '<form action="#" method="GET">
    <input type="text" name="movieid" placeholder="Enter the movie\'s ID">
    <input type="submit" value="Submit">
    </form><br>';

    require_once '../db.php';
    $db = 'moviedb';
    $connect = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, $db);

    $sql = 'SELECT movie_id,poster_path,name,release_date FROM movies';
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($result);



    if (isset($_GET['movieid']) && $_GET['movieid'] != 0) {

        $sql = 'SELECT movie_id,poster_path,name,release_date FROM movies WHERE movie_id =' . $_GET['movieid'];
        $result = mysqli_query($connect, $sql);
        $row = mysqli_fetch_assoc($result);

        if (mysqli_num_rows($result) > 0) {

            // output data of each row
            // $row will be false when there is nothing anymore
            // mysqli_fetch_assoc "moves the cursor" returns the next value from the DB
            echo "<div><a href='movie.php?movieid=" . $_GET['movieid'] . "'>id: <img src='" . $row["poster_path"] . "'> - Name: " . $row["name"] . " " . $row["release_date"] . "</a></div><br>";
        } else {
            echo "0 results";
        }
    } else {


        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            echo "<div><a href='movie.php?movieid=" . $row['movie_id'] . "'>id: <img src='" . $row["poster_path"] . "'> - Name: " . $row["name"] . " " . $row["release_date"] . "</a></div><br>";
            while ($row = mysqli_fetch_assoc($result)) { // $row will be false when there is nothing anymore
                // mysqli_fetch_assoc "moves the cursor" returns the next value from the DB
                echo "<div><a href='movie.php?movieid=" . $row['movie_id'] . "'>id: <img src='" . $row["poster_path"] . "'> - Name: " . $row["name"] . " " . $row["release_date"] . "</a></div><br>";
            }
        } else {
            echo "0 results";
        }

        mysqli_close($connect);
    }
    ?>









</body>

</html>