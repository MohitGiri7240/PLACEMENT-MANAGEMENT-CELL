<?php
include 'util.php'; 
session_start();
//error_reporting(0);

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

$sql= "SELECT * FROM company WHERE email_id = '$e' AND password = '$p'";
$result = mysqli_query($con, $sql);  
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
    //$count = mysqli_num_rows($result);   

 /*Get the matched company details*/
 $getMatchedStudent =  " SELECT CONCAT(s.`first_name`,' ', s.last_name) AS student_name ,s.`ssc_marks`,s.`hsc`,s.`ug`,s.`pg`
FROM `company` c,`student` s WHERE ABS(s.`ssc_marks`) >= ABS(c.`ssc_marks`) AND ABS(s.`hsc`) >= ABS(c.`hsc`) AND ABS(s.`pg`) >= ABS(c.`pg`) and c.email_id = '$e' AND c.password = '$p' GROUP BY s.`s no.`";
$studentInfoData = mysqli_query($con, $getMatchedStudent);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DISPLAY COMPANY</title>
    <link rel="stylesheet"type="text/css" href="display.css">
</head>
<body>

    <div class="row">
  <div class="col-sm-6">
    <h3>Company Details</h3> 
    <table class="table table-hover table-bordered">
    
    <tbody>
      
      <tr>
        <td>Company Name</td><td><?php echo $row['company_name'] ?></td>
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
        <td>Job Name</td><td><?php echo $row['job_name'] ?></td>
     </tr>

     <tr>
        <td>Recruitment Head</td><td><?php echo $row['rec_head'] ?></td>
     </tr>
     <tr>
        <td>Helpline Email</td><td><?php echo $row['email_id'] ?></td>
     </tr>
     <tr>
        <td>Helpline No</td><td><?php echo $row['help_contactnum'] ?></td>
     </tr>
  </tbody>
</table>  
  </div>

<!-- Student List -->
  <div class="col-sm-6 ">
    <div class="table-responsive card">
        <h3>Matched Candidate </h3>
    
     <?php    
      if(mysqli_num_rows($studentInfoData)>0){
        ?>
        <table class="table table-hover table-bordered">
  
      <tr>
        <th>Student Name</th>
        <th>10th</th>
        <th>12th</th>
        <th>UG</th>
        <th>PG</th>
      </tr>      
  
        <?php
         foreach($studentInfoData as $queryData)
        {  ?>
        <tr>
            <td><?php echo $queryData['student_name'] ?></td>
            <td><?php echo $queryData['ssc_marks'] ?></td>
            <td><?php echo $queryData['hsc'] ?></td>
            <td><?php echo $queryData['ug'] ?></td>            
            <td><?php echo $queryData['pg'] ?></td>
        </tr>
        <?php }     
       
      }else{ ?>
        <tr><td> There is no Candidate with this criteria !!!</td></tr>
      </div>
  <?php }
?>         
       
</table>
  </div>
</div>		           
</body>
</html>