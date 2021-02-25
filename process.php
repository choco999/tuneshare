<?php require('header.php'); ?>
    <?php

    ob_start();
        // create variables to store info
        $first_name = filter_input(INPUT_POST, 'fname');
        $last_name = filter_input(INPUT_POST, 'lname');
        $genre = filter_input(INPUT_POST, 'genre');
        $location = filter_input(INPUT_POST, 'location');
        $age = filter_input(INPUT_POST, 'age',FILTER_VALIDATE_INT);
        $email = filter_input(INPUT_POST, 'email',FILTER_VALIDATE_EMAIL);
        $favsong = filter_input(INPUT_POST, 'favsong');

        //initialize id
        $id = null;
        $id = filter_input(INPUT_POST, 'user_id');

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
                if(!empty($id)) {
                    $sql = "UPDATE songs SET first_name = :firstname, last_name= :lastname, genre = :genre, 
                                                location = :location, email = :email, age = :age, favsong = :favsong
                                                WHERE user_id = :user_id;";
                }
                else {
                    $sql = "INSERT into songs (first_name, last_name, genre, location, email, age, favsong) 
                    VALUES (:firstname, :lastname, :genre, :location, :email, :age, :favsong)";
                }

                
                
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

                // bind $id if updating
                if(!empty($id)){
                    $statement->bindParam(':user_id', $id);
                }

                // execute the query
                $statement->execute();

                //echo '<p> Success, your tune has been added!</p>';
                echo "<a href='view.php'> View All Tunes </a>";  

                // close DB connection
                $statement->closeCursor();
            }
            catch (PDOException $e) {
                header('error.php');
            }
        }

    require('footer.php'); 
    ob_flush();
    ?>