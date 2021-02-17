<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
        <h1>TuneShare 2021 = Share Your Fave Tunes & Join The Community</h1>
    </header>

    <?php
    // connect to db
    require('connect.php');

    // set up our query
    $sql = "SELECT * FROM songs";

    // prepare the query
    $statement = $db->prepare($sql);

    // execute the query
    $statement->execute();

    // use fetchAll to store results
    $records = $statement->fetchAll();

    // echo out top of table
    echo "<table><tbody>";

    foreach($records as $record){
        echo"<tr><td>"  .$record['first_name']. "</td><td>" 
                        .$record['last_name'] . "</td><td>"
                        .$record['genre'] . "</td><td>" 
                        .$record['location'] . "</td><td>" 
                        .$record['email'] . "</td><td>"
                        .$record['age'] . "</td><td>" 
                        .$record['favsong'] . "</td></tr>";
    }

    echo "</tbody></table>";


    // close the DB connection
    $statement->closeCursor();

    ?>

    <footer>
        <p> &copy; <?php echo getdate() ['year'];?> </p>
    </footer>
</body>
</html>