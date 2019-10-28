<!DOCTYPE html>
<html lang="en">
<?php



if (isset($_GET['movieid'])) {
    $movieId = $_GET['movieid'];

    var_dump($movieId);
    require_once './db.php';

    $db = 'moviedb';
    $connect = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, $db);

    $sql = 'SELECT m.*,d.name AS director_name FROM movies m JOIN directors d ON d.director_id = m.director_id WHERE movie_id = ' . $movieId; //WHERE movie_id = 
    $result = mysqli_query($connect, $sql);

    $row = mysqli_fetch_assoc($result);
    $title = $row['name'];
} else {
    $title = "Choose something!";
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title ?></title>
</head>

<body>
    <h1><?php echo $title ?></h1>


    <?php
    /*echo '<form action="#" method="GET">
    <input type="text" name="movieid" placeholder="Enter the movie\'s ID">
    <input type="submit" value="Submit">
    </form>';*/

    if (isset($_GET['movieid'])) {
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            // $row will be false when there is nothing anymore
            // mysqli_fetch_assoc "moves the cursor" returns the next value from the DB
            echo "<div>id: <img src='" . $row["poster_path"] . "'> - Name: " . $row["name"] . " " . $row["release_date"] . " " . $row["director_name"] . "</div><br>";
        } else {
            echo "0 results";
        }


        mysqli_close($connect);
    }
    ?>
</body>

</html>