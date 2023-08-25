<?php
$insert=false;
if(isset($_POST['name']))
{
    //set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";

    //create connection
    $con = mysqli_connect($server,$username,$password);

    //check for connection success
    if(!$con)
    {
        die("failed connecting to the database" . mysqli_connect_error());
    }
    // else
    // echo"succesfully connected to db";

    //collect post variables
    $name = $_POST['name'];
    $age =$_POST['age'] ;
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $other = $_POST['desc'];

    $sql = "INSERT INTO `trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ( '$name', '$age', '$gender', '$email', '$phone', '$other', current_timestamp());";

    // echo $sql;


    //execute the query
    if($con->query($sql)==true)
    {
        //flag for succesful insertion
        $insert=true;
    }
    else
    {
        echo"ERROR : $sql <br> $con->error";
    }

    //close the database connection-
    $con->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Welcome to Hetauda School of Management</h1>
        <?php 
            if($insert==true)
            {
                echo"<p class='para'>Thanks for submitting your form</p>";
            }
        ?>
        <form action="project.php" method="post">
                <input type="text" placeholder="enter your name" name="name" id="name">
                <input type="text" placeholder="enter your age " name="age" id="age">
                <input type="text" placeholder="enter your gender" name="gender" id="gender">
                <input type="email" placeholder="enter your email" name="email" id="email">
                <input type="phone" placeholder="enter your phone" name="phone" id="phone">
                <textarea name="desc" id="desc" cols="30" rows="10" placeholder="enter other information here"></textarea>
                <button type="submit" class="btn">submit</button>
        </form>
    </div>
     <script src="main.js"></script>
  
</body>
</html>