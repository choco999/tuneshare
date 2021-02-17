<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanks For Submitting</title>
</head>
<body>
    <header>
        <h1>TuneShare 2021 = Share Your Fave Tunes & Join The Community</h1>
    </header>
    <?php
        // create variables to store info
        $first_name = filter_input(INPUT_POST, 'fname');
        $last_name = filter_input(INPUT_POST, 'lname');
        $genre = filter_input(INPUT_POST, 'genre');
        $location = filter_input(INPUT_POST, 'location');
        $age = filter_input(INPUT_POST, 'age',FILTER_VALIDATE_INT);
        $email = filter_input(INPUT_POST, 'email',FILTER_VALIDATE_EMAIL);
        $favsong = filter_input(INPUT_POST, 'favsong');

        // set up a flag variable for debugging
        $ok = true;

        // some form validation
        if ($age === false){
            echo "<p>Please use a numeric value for age</p>";
            $ok = false;
        }
        
        if ($email === false){
            echo "<p>Please use a proper email address</p>";
            $ok = false;
        }

        if($ok === true){
            try {
                // connect to db
                require('connect.php');

                // set up SQL query
                $sql = "INSERT into songs (first_name, last_name, genre, location, email, age, favsong) 
                        VALUES (:firstname, :lastname, :genre, :location, :email, :age, :favsong)";
                
                // call the prepare method of the PDO object
                $statement = $db->prepare($sql);

                //bind parameters using the bindParam method of the PDO Statement Object 
                $statement->bindParam(':firstname', $first_name);
                $statement->bindParam(':lastname', $last_name);
                $statement->bindParam(':genre', $genre);
                $statement->bindParam(':location', $location);
                $statement->bindParam(':email', $email);
                $statement->bindParam(':age', $age);
                $statement->bindParam(':favsong', $favsong);

                // execute the query
                $statement->execute();

                echo '<p> Success, your tune has been added!</p>';

                // close DB connection
                $statement->closeCursor();
            }
            catch (PDOException $e) {
                echo '<p>/something went wrong..</p>';
                $error_message = $e->getMessage();
                echo $error_message;
            }
        }
    ?>


    <footer>
        <p> &copy; <?php echo getdate() ['year'];?> </p>
    </footer>
</body>
</html>