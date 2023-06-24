<?php

if(isset($_POST['search']))
{
    $c1 = $_POST['c1'];
    $c2 = $_POST['c2'];
    $c3 = $_POST['c3'];
    $c4 = $_POST['c4'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `company` WHERE ssc_marks>='$c1' and hsc>='$c2' and ug>='$c3' and pg>='$c4'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `company`";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "company");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Company Data </title>
        <style>
            table,tr,th,td
            {
            
                border: 1px solid black;
            }
        </style>
    </head>
    <body>
        
        <form action="filterdatac.php" method="post">
            <input type="text" name="c1" placeholder="Enter min. 10th CGPA">
            <input type="text" name="c2" placeholder="Enter min. 12th CGPA">
            <input type="text" name="c3" placeholder="Enter min. UG CGPA">
            <input type="text" name="c4" placeholder="Enter min. PG CGPA"><br><br>
            <input type="submit" name="search" value="Filter"><br><br>
            
            <table>
                <tr>
                    <th>Id</th>
                    <th>Company Name</th>
                    <th>Job Name</th>
                    <th>10th</th>
                    <th>12th</th>
                    <th>UG</th>
                    <th>PG</th>
                    <th>Recruitment Head</th>
                    <th>Email id</th>
                    <th>Helpline no.</th>

                </tr>

      <!-- populate table from mysql database -->
                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                    <td><?php echo $row['s no.'];?></td>
                    <td><?php echo $row['company_name'];?></td>
                    <td><?php echo $row['job_name'];?></td>
                    <td><?php echo $row['ssc_marks'];?></td>
                    <td><?php echo $row['hsc'];?></td>
                    <td><?php echo $row['ug'];?></td>
                    <td><?php echo $row['pg'];?></td>
                    <td><?php echo $row['rec_head'];?></td>
                    <td><?php echo $row['email_id'];?></td>
                    <td><?php echo $row['help_contactnum'];?></td>

                </tr>
                <?php endwhile;?>
            </table>
        </form>
        
    </body>
</html>