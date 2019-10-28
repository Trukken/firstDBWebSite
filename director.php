<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>








    <?php
    if (isset($_GET['director_id'])) {
        require_once '../db.php';
        $db = 'moviedb';
        $directorid = $_GET['director_id'];
        $connect = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, $db);

        $sql = "SELECT d.*,m.movie_id,m.name AS movie_name FROM directors d JOIN movies m ON d.director_id = m.director_id WHERE d.director_id = $directorid";
        $result = mysqli_query($connect, $sql);

        $row = mysqli_fetch_assoc($result);

        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            // $row will be false when there is nothing anymore
            // mysqli_fetch_assoc "moves the cursor" returns the next value from the DB
            echo "<div>id: <img src='" . $row["picture_path"] . "'> - Name: " . $row["name"] . " " . $row["birth_date"] . "</div><br>";
            echo '<ul>';
            echo '<li><a href="movie.php?movieid=' . $row["movie_id"] . '">' . $row["movie_name"] . '</li>'; //<a href="movie.php?movieid=' . $row["movie_id"] . '">
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<li><a href="movie.php?movieid=' . $row["movie_id"] . '">' . $row["movie_name"] . '</li>';
            }
            echo '</ul>';
        } else {
            echo "0 results";
        }
    } else {
        echo '404';
    }










    ?>
</body>

</html>