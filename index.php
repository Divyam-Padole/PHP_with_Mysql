<?php
  $insert =false;
    if($_POST['name'])
    {

  

//set connection varible

    $server="localhost";
    $username="root";
    $password="";

//create a db connection

    $con=mysqli_connect($server,$username,$password);

    //check for connection success
    if(!$con)
    {
        die("connecton to mysql failed due to" .mysqli_connect_error());

    }
    // echo "Success connection to database";
    
    //collect post varible

    
    $name=$_POST['name'];
  $gender=$_POST['gender'];
    $age =$_POST['age'];
   $number=$_POST['number'] ;
   $email=$_POST['email'] ;
    $desc=$_POST['desc'];


    $sql="INSERT INTO `tavel_db`.`trip` (`name`, `age`, `gender`, `number`, `email`, `other`, `date`) 
    VALUES ('$name', '$age', '$gender', '$number', '$email', '$desc', current_timestamp());";

    // echo $sql;


        //execute the query

    if($con->query($sql)==true)
    {
        // echo"Successfully inserted";

        //flag for connection varible
        $insert = true;

    }
    else{
        echo "Error $sql <br> $con->error";

    }
        $con->close();

    }

?>



<!-- Importing html in php  -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Form</title>
    <link rel="styleSheet" href="style.css">
    <script src="index.js"></script>
</head>
<body>

        <div class="container">
            <h3> Welcome to YCCE travel</h3>
            <p>Enter the details for your details</p>

            <?php
if ($insert == true) {
    echo "<p class=\"Msgsubmit\">Thanks for your Responces</p>";
}
?>

          
            
            
            <form action="index.php" method="post">
                   <input type="text" name="name" id="name" placeholder="Enter the name">
                   <input type="text" name="age" id="age" placeholder="Enter the age">
                   <input type="text" name="gender" id="gender" placeholder="Enter the gender">
                   <input type="number" name="number" id="gender" placeholder="Enter the number">
                   <input type="email" name="email" id="email" placeholder="Enter the email">
                   <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter the extra details"></textarea>
                    <button class="btn">Submit</button>
                    <button class="btn">Reset</button>

            </form>
            <!-- INSERT INTO `trip` (`name`, `age`, `gender`, `number`, `email`, `desc`, `date`, `sr_no`) VALUES ('Test Name', '21', 'Male', '9999999999', 'test@gamil.com', 'this is for adimin test', current_timestamp(), NULL); -->
        </div>
</body>
</html>