<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TuneShare 2021</title>
</head>
<body>
    <header>
        <h1>TuneShare 2021 = Share Your Fave Tunes & Join The Community</h1>
    </header>
    <main>
        <form action="process.php" method="post">
            <label for="fname">First Name</label>
            <input type="text" name="fname" id="fname">
            <label for="lname">Last Name</label>
            <input type="text" name="lname" id="lname">
            <label for="genre">Favourite Genre</label>
            <input type="text" name="genre" id="genre">
            <label for="location">Your Location</label>
            <input type="text" name="location" id="location">
            <label for="email">Your Email</label>
            <input type="email" name="email" id="email">
            <label for="age">Your Age</label>
            <input type="number" name="age" id="age">   
            <label for="favsong">What are you listening to right now?</label>
            <input type="text" name="favsong" id="favsong">  
            <input type="submit" value="submit" name="submit">    
        </form>
    </main>
    <footer>
        <p> &copy; <?php echo getdate() ['year'];?> </p>
    </footer>
</body>
</html>