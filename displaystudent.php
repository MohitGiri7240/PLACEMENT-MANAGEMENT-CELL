<?php
include 'util.php'; 
session_start();

$server ="localhost";  
$username ="root";  
$password ="";  
$database ="student";    
$con = mysqli_connect($server, $username, $password, $database);  

if(!$con)
{ 
 die("Failed to connect with MySQL: ". mysqli_connect_error());  
}  

$e = $_SESSION['email_id'];
$p = $_SESSION['pass'];

 $sql= "SELECT * FROM student WHERE email_id = '$e' AND password = '$p'";
 $result = mysqli_query($con, $sql);  
 $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
 //$count = mysqli_num_rows($result);   

 /*Get the matched company details*/
 $getMatchedComapanyInfo =  " SELECT c.company_name,c.`ssc_marks`,c.`hsc`,c.`ug`,c.`pg` ,c.`job_name`,c.`email_id` FROM `company` c , `student` s  WHERE ABS(s.`ssc_marks`) >= ABS(c.`ssc_marks`) 
 AND ABS(s.`hsc`) >= ABS(c.`hsc`) 
 AND ABS(s.`ug`) >= ABS(c.`pg`)  and s.email_id = '$e' AND s.password = '$p' GROUP BY c.company_name";

$companyInfoData = mysqli_query($con, $getMatchedComapanyInfo);  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DISPLAY STUDENT</title>
    <link rel="stylesheet"type="text/css" href="display.css">
</head>
<body>

<div class="row">
  <div class="col-sm-6">
     <h2>Student Details </h2>

<table class="table table-hover table-bordered">
    
    <tbody style="border: 1px solid gray;">
      <tr>
        <td>First Name</td><td><?php echo $row['first_name'] ?></td>
     </tr>
     <tr>
        <td>Last Name</td><td><?php echo $row['last_name'] ?></td>
     </tr>
     <tr>
        <td>Age</td><td><?php echo $row['age'] ?></td>
     </tr>
     <tr>
        <td>Email Id</td><td><?php echo $row['email_id'] ?></td>
     </tr>
     <tr>
        <td>Mobile No.</td><td><?php echo $row['mobile_number'] ?></td>
     </tr>
     <tr>
        <td>Address</td><td><?php echo $row['address'] ?></td>
     </tr>
     <tr>
        <td>10th</td><td><?php echo $row['ssc_marks'] ?></td>
     </tr>
     <tr>
        <td>12th</td><td><?php echo $row['hsc'] ?></td>
     </tr>

     <tr>
        <td>UG</td><td><?php echo $row['ug'] ?></td>
     </tr>
     <tr>
        <td>PG</td><td><?php echo $row['pg'] ?></td>
     </tr>

     <tr>
        <td>Gender</td><td><?php echo $row['gender'] ?></td>
     </tr>
     <!--<tr>
        <td>Strength</td><td><?php echo $row['strength'] ?></td>
     </tr>-->
     <tr>
        <td>Technology</td><td><?php echo $row['technology'] ?></td>
     </tr>
    </tbody>
  </table>   </div>

  <div class="col-sm-6">
    <h2>Matched Company </h2>
    
     <?php    
      if(mysqli_num_rows($companyInfoData)>0){
        ?>
        <table class="table table-hover table-bordered">
    <thead>
      <tr>
         <tr>
        <th>Company Name</th>
        <th>Job Title</th>
        <th>10th</th>
        <th>12th</th>
        <th>UG</th>
        <th>PG</th>
      </tr>       
      </tr>      
    </thead>
        <?php 
         foreach($companyInfoData as $queryData)
        {  ?>
        <tr>
            <td><?php echo $queryData['company_name'] ?></td>
            <td><?php echo $queryData['job_name'] ?></td>
            <td><?php echo $queryData['ssc_marks'] ?></td>
            <td><?php echo $queryData['hsc'] ?></td>
            <td><?php echo $queryData['ug'] ?></td>
            <td><?php echo $queryData['pg'] ?></td>
        </tr>
        <?php }     
       
      }else{ ?>
        <tr><td> There is no matched company found !!!</td></tr>
      </div>
  <?php }
?>         
       
</table>
  </div>
 
</div>


</body>
</html>
