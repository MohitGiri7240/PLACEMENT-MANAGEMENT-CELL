<?php
include 'util.php';
session_start();
$insert = false;
if(isset($_POST['login']))
{
$server ="localhost";  
$username ="root";  
$password ="";  
$database ="student";  
  
$con = mysqli_connect($server, $username, $password, $database);  

if(!$con)
{  
    die("Failed to connect with MySQL: ". mysqli_connect_error());  
}  

$email_id = $_POST ['email_id'];  
$pass = $_POST ['pass'];  
$usertype = $_POST['usertype'];

    //to prevent from mysqli injection  
    $email_id = stripcslashes($email_id);  
    $pass = stripcslashes($pass);  
    $email_id = mysqli_real_escape_string($con,$email_id);  
    $pass = mysqli_real_escape_string($con,$pass);  
    
    $sql = "SELECT * FROM student WHERE email_id = '$email_id' AND password = '$pass'";  
    $result = mysqli_query($con, $sql);  
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
    $count = mysqli_num_rows($result);   

       
        $_SESSION['email_id'] = $_POST ['email_id'];
        $_SESSION['pass']= $_POST ['pass'];
        $_SESSION['usertype'] = $_POST ['usertype'];
        

        if($usertype == "student"||$usertype == "STUDENT"||$usertype == "Student" ) 
        { 
            $sql = "SELECT * FROM student WHERE email_id = '$email_id' AND password = '$pass'";  
            $result = mysqli_query($con, $sql);  
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
            $count = mysqli_num_rows($result);   
             
            
              if($count==1)
             {  
               $insert = true;
               echo "<h1><center> Login successful </center></h1>"; 
               header("Location: displaystudent.php"); 
               exit(); 
             } 
             else
              {  
               echo "<h1> Login failed. Invalid username or password.</h1>";  
              } 

        } 
    
        else if ($usertype == "company"||$usertype == "Company"||$usertype == "Company") 
        { 
            $sql = "SELECT * FROM company WHERE email_id = '$email_id' AND password = '$pass'";  
            $result = mysqli_query($con, $sql);  
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
            $count = mysqli_num_rows($result);   
             
            
              if($count==1)
             {  
            $insert = true;
            echo "<h1><center> Login successful </center></h1>";
            header("Location: displaycom.php"); 
            exit(); 
             } 
             else
            {  
            echo "<h1> Login failed. Invalid username or password.</h1>";  
            } 
        } 
        else if ($usertype == "admin"||$usertype == "ADMIN"||$usertype == "Admin") 
        {   
            $insert = true; 
            echo "<h1><center> Login successful </center></h1>";
            header("Location: admin.php");  
            exit(); 
        } 
          
}
?>


<!DOCTYPE html>
   <html lang="en">
   <head>  
    <title>Login</title>   
    <link rel = "stylesheet" type = "text/css" href = "login.css">   
</head>  
<body>  
    <div id = "frm">  
        <h1>Login</h1>  
        <form name="f1" action = "login.php"  method = "POST">  

            <p>  
                <label> UserName: </label>
                <input class = "email"  type = "email"  name = "email_id"  required>
            </p>  
            <p>  
                <label> Password: </label>  
                <input type = "password" id ="pass" name  = "pass"  required/>  
            </p>  
            <p>  
                <label> UserType: </label>  
                <!-- <input type = "usertye" id ="usertype" name  = "usertype"  required/>  -->
                <SELECT name="usertype" id="usertype" placeholder="select login Type"  required>
                <OPTION>Select</OPTION>
                <OPTION>Student</OPTION>
                <OPTION>Company</OPTION>
                </SELECT> 
            </p>  
            <p>     
                <button type="submit" name="login" class="btn btn-md btn-primary">LOGIN</button>
            </p>  
        </form>  
    </div>  
</body>     
</html>  

<!--if($insert == true)
    {
        echo $count;echo "<br>";
        //echo var_dump($row);
        //print_r($row);
        echo $row['s no.'];echo "<br>";echo $row['first_name'];echo "<br>";echo $row['last_name'];echo "<br>";
        echo $row['age'];echo "<br>";echo $row['email_id'];echo "<br>";echo $row['mobile_number'];echo "<br>";
        echo $row['address'];echo "<br>";echo $row['qualification'];echo "<br>";echo $row['gender'];echo "<br>";
        echo $row['strength'];echo "<br>";echo $row['technology'];echo "<br>";
    } -->