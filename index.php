<?php
$insert = false;
if(isset($_POST['name'])){

    // To set the connection variables

    $server = "localhost";
    $username = "root";
    $password = "";


    // To create a database connection

    $conn = mysqli_connect($server, $username, $password);


    // To check for connection success

    if(!$conn){
        die("connection to this database failed due to" . mysqli_connect_error());
    }

    // echo "Success connecting to the db";


    // Collect post variables

    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];

    $sql = "INSERT INTO `trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
    // echo $sql;


    // To execute the query

    if($conn->query($sql) == true){
        // echo "Successfully inserted";

        // Flag for successful connection

        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $conn->error";
    }

    // To close the database connection

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@500&display=swap" rel="stylesheet">

</head>
<body>
    <img class="bg" src="bg.jpg" alt="Image of IIT Kharagpur">
    <div class="container"> 
    <h1>Welcome to IIT Kharagpur US Trip form</h1>   
    <p>Enter your details and submit your form to confirm your participation in the trip.</p>
    <?php
        if($insert == true){
        echo "<p class='submitMsg'>Thanks for submitting the form. We are happy to see you joining for the US trip.</p>";
        }
    ?>
    <form action="index.php" method="post">
        <input type="text" name="name" id="name" placeholder="Enter your name">
        <input type="text" name="age" id="age" placeholder="Enter your age">
        <input type="text" name="gender" id="gender" placeholder="Enter your gender">
        <input type="email" name="email" id="email" placeholder="Enter your email">
        <input type="phone" name="phone" id="phone" placeholder="Enter your Phone">
        <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information here"></textarea>
        </textarea>
        <button class="btn">Submit</button>
    </form>
 </div>
 <script src="index.js"></script>
</body>
</html>