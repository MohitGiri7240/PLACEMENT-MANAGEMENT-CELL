<?php
   
   //error_reporting(0);
   $insert = false;
   if(isset($_POST['register']))
   {
   $server="localhost";
   $usernme="root";
   $password="";
   $database="student";

   $con= mysqli_connect($server,$usernme,$password,$database);
   
   if(!$con)
   {
       die("connection to this database failed due to" . mysqli_connect_error());
   }
     // echo"Succesfully connection established to the database";
 
    $fname = $_POST ['fname'];
    $lname = $_POST ['lname'];
    $age = $_POST ['age'];
    $email = $_POST ['email'];
    $num = $_POST ['num'];
    $rech = $_POST ['rech'];
    $ssc = $_POST ['ssc'];
    $hsc= $_POST ['hsc'];
    $ug= $_POST ['ug'];
    $pg= $_POST ['pg'];
    $gender = $_POST ['gender'];

    $g = "";
     if($gender== "on")
     {
         $g = 'male';
     }
     else
     {
        $g='female';
     }
    $tech = $_POST ['tech'];
    $pass = $_POST ['pass'];
    $cpass = $_POST ['cpass'];
    $sql= "INSERT INTO `student`.`student`(`first_name`,`last_name`,`age`,`email_id`,`mobile_number`,`address`,`ssc_marks`,`hsc`,`ug`,`pg`,`gender`,`technology`,`password`,`confirm_password`) VALUES ('$fname','$lname','$age','$email','$num','$rech','$ssc','$hsc','$ug','$pg','$g','$tech','$pass','$cpass')";

    //echo $sql;
   if($pass!=$cpass)
   {echo"<script>alert('Password and confirm password didnot match')</script>";}
   else
   
    if($con->query($sql) == true && $cpass==$pass)
    {
        echo "Successfully inserted";
        // Flag for successful insertion
        $insert = true;
    }
    else
    {
        echo "ERROR: $sql <br> $con->error";
    }

    // Close the database connection
    $con->close();
}
 //include 'util.php'; 
?>


<!DOCTYPE html>
   <html lang="en">
        <head>
          <meta charset="UTF-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <title>Student login page</title>
        <link rel="stylesheet"type="text/css" href="student.css">
        </head>
<body>
        <div class="container">
            <h1>Student Sign up </h1></div>
            <div class="main">
        
            <form method="POST" name="loginForm" action="studentsignin.php"  autocomplete="off">
            
        <?php

            if($insert == true)
             {
             echo "<p class='submitMsg'>Thanks for submitting your form</p>";
             }
        ?>

            <div id="name">
            <h2 class="name">First Name</h2>
            <input class="fname" type="text" name="fname" autocomplete="off" required>
            <h2 class="name">Last Name</h2>
            <input class="lname" type="text" name="lname" required>
            </div>

            <h2 class="name">DOB</h2>
            <input class="age" type="date" name="age" >

            <h2 class="name">Email_id</h2>
            <input class="email" type="email"name="email" required >
            
            <h2 class="name">Mobile Number</h2>
            <input class="num" type="tel" name="num" max="9999999999" min="0000000000" required>
        
            <h2 class="name">Address</h2>
            <input class="rech" type="text" name="rech" required>
      
            <div>
         <h3 class="name">Eligibiity Criteria :</h3>
   
     <table  width="110%">
            
            <tr>
          
            <th class="name">10th (cgpa)</th>
              <td><input class="ssc" type="number" name="ssc" id="ssc" value="0.0"max="10" min="00" step="0.1" required></td>
        
              </tr>
        
            <tr>
          
                <th class="name">12th (cgpa)</th>
               <td><input class="hsc" type="number" name="hsc" id="hsc" value="0.0"max="10" min="00" step="0.1"required></td>
            </tr>
           
            
            <tr>
                <th class="name">UG (cgpa)</th>
                <td><input class="ug" type="number" name="ug" id="ug" value="0.0"max="10" min="00" step="0.1"required></td>
            </tr>
            <tr>
                <th class="name">Post (cgpa)</th>
                <td><input class="pg" type="number" name="pg" id="pg" value="0.0"max="10" min="00" step="0.1"required></td>
            </tr>
           
        </table>
        
        
        <br>
   


        </div>
        
            <h2 id="costomer">Gender</h2>
            <label class="radio">
                <input class="radio-one" type="radio" name="gender">
                <?php $gender="male";?>
                <span class="checkmark"></span>
                Male
            </label>
            <label class="radio">
                <input class="radio-one" type="radio" name="gender">
                <?php $gender="female"; ?>
                <span class="checkmark"></span>
                Female
            </label> 
            
                

            <h2 class="name">Technology</h2>
            <SELECT name="tech" id="tech" class="tech" placeholder="select"  required>
                <OPTION>Select</OPTION>
                <OPTION>Artificial Intelligence</OPTION>
                <OPTION>Machine Learning</OPTION>
                <OPTION>Web Technologies</OPTION>
                <OPTION>IoT</OPTION>
                <OPTION>Big Data</OPTION>
                <OPTION>Network And Information Security</OPTION>
                <OPTION>Data Mining & Data Warehousing</OPTION>
                <OPTION>Compiler Design</OPTION>
                <OPTION>Mobile Adhoc Networks</OPTION>
                <OPTION>Software Engineering</OPTION>
                <OPTION>Agile Software Development</OPTION>
                <OPTION>Databases & Information Retrieval Systems</OPTION>
                <OPTION>Distributed Computing & Cloud Computing</OPTION>
                <OPTION>Natural Language Processing</OPTION>
                <OPTION>Image Processing</OPTION>
                <OPTION>Data Science</OPTION>
                <OPTION>Embedded Systems</OPTION>
            </select>

            <h2 class="name">Password</h2>
            <input class="pass" type="password" name="pass" required="required" ng-minlength="4" id="newpassword">

            <h2 class="name">Confirm Password</h2>
            <input class="pass" type="password" name="cpass" match-password="changePasswordVo.pass" required id="changepwd">


           
            
            <button type="submit" class="btn btn-md btn-primary" name="register">Register</button>
        </form>
        </div>  
    </div>
</body>
</html>