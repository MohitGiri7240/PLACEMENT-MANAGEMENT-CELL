<?php

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
      //echo"Succesfully connection established to the database";
 
        $cname = $_POST ['cname'];
        $ssc = $_POST ['ssc'];
        $hsc= $_POST ['hsc'];
        $ug= $_POST ['ug'];
        $pg= $_POST ['pg'];
        $jobname = $_POST ['jobname'];
        $rhead = $_POST ['rhead'];
        $email_id = $_POST ['email_id'];
        $helpn = $_POST ['helpn'];
        $pass = $_POST ['pass'];
        $cpass = $_POST ['cpass'];
        $sql="INSERT INTO `student`.`company`(`company_name`,`ssc_marks`,`hsc`,`ug`,`pg`,`job_name`,`rec_head`,`email_id`,`help_contactnum`,`password`, `confirm_password`) VALUES ('$cname','$ssc','$hsc','$ug','$pg','$jobname','$rhead','$email_id','$helpn','$pass','$cpass')";
 
        if($pass!=$cpass)
   {echo"<script>alert('Password and confirm password didnot match')</script>";}
   else

        {  
          //echo $sql;
         if($con->query($sql) == true)
            {
               //echo "Successfully inserted";
               // Flag for successful insertion
               $insert = true;
            }
        else{
              echo "ERROR: $sql <br> $con->error";
            }
    
        // Close the database connection
       
    }  

 $con->close();

        }

      
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>company login</title>
    <link rel="stylesheet"type="text/css" href="comstyle.css">
</head>
<body>
    <div class="container">
    <h1>Recruiter Sign up </h1></div>
    <div class="main">
        <form action="companypage.php" method="POST" autocomplete="off">
       
      <?php        
        if($insert == true)
         {
           echo "<p class='submitMsg'>Thanks for submitting your form</p>";
         }        
      ?>

        <div class="name">
           <h2 class="name">Name of company</h2>
            <input class="cname" type="text" name="cname" required>
            <h3 class="name">Eligibiity Criteria :</h3>
            <table  width="110%">
            <tr>
            <th class="name">10th (cgpa)</th>
            <td><input class="ssc" type="number" name="ssc" id="ssc" value="0.0"max="10" min="00" step="0.1" required></td>
           </tr>
            <tr>
                <th class="name">12th (cgpa)</th>
               <td><input class="hsc" type="number" name="hsc" id="hsc" value="0.0"max="10" min="00" step="0.1" required></td>
            </tr>
            <tr>
                <th class="name">UG (cgpa)</th>
                <td><input class="ug" type="number" name="ug" id="pg" value="0.0"max="10" min="00" step="0.1" required></td>
            </tr>
            <tr>
                <th class="name">PG (cgpa)</th>
                <td><input class="pg" type="number" name="pg" id="pg" value="0.0"max="10" min="00" step="0.1"required></td>
            </tr>
           
        </table>
        
        
        <br>
   


        </div>
        <div>
            <h2 class="name">Specialization</h2>
            <SELECT name="jobname" id="jobname" class="jobname" placeholder="select"  required>
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
        </div>
           <h2 class="name">Recruitment Head</h2>
             <input class="rhead" type="text" name="rhead" required>
    
           <h2 class="name">Contact Email</h2>
             <input class="mailid" type="email" name="email_id" required>

           <h2 class="name">Contact no.</h2>
             <input class="helpn" type="num"name="helpn" required>

           <h2 class="name">Password</h2>
             <input class="pass" type="password" name="pass" required>

           <h2 class="name">Confirm Password</h2>
             <input class="pass" type="password" name="cpass" required>  
    
         <button type="submit" name="register">Register</button>
      </form>
    </div>
</body>
</html>





