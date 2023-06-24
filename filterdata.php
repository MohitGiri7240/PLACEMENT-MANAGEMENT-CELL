<?php

if(isset($_POST['search']))
{
    $v1 = $_POST['v1'];
    $v2 = $_POST['v2'];
    $v3 = $_POST['v3'];
    $v4 = $_POST['v4'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `student` WHERE ssc_marks>='$v1' and hsc>='$v2' and ug>='$v3' and pg>='$v4'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `student`";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "student");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Student Marks</title>
        <style>
            table,tr,th,td
            {
                background-color: blue;
                border: 1px solid black;
            }
        </style>
    </head>
    <body>
        
        <form action="filterdata.php" method="post">
            <input type="text" name="v1" placeholder="Enter min. 10th CGPA"><br>
            <input type="text" name="v2" placeholder="Enter min. 12th CGPA"><br>
            <input type="text" name="v3" placeholder="Enter min. UG CGPA"><br>
            <input type="text" name="v4" placeholder="Enter min. PG CGPA"><br><br>
            <input type="submit" name="search" value="Filter"><br><br>
            
            <table>
                <tr>
                    <th>Id</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>10th</th>
                    <th>12th</th>
                    <th>UG</th>
                    <th>PG</th>

                </tr>

      <!-- populate table from mysql database -->
                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                    <td><?php echo $row['s no.'];?></td>
                    <td><?php echo $row['first_name'];?></td>
                    <td><?php echo $row['last_name'];?></td>
                    <td><?php echo $row['ssc_marks'];?></td>
                    <td><?php echo $row['hsc'];?></td>
                    <td><?php echo $row['ug'];?></td>
                    <td><?php echo $row['pg'];?></td>
                </tr>
                <?php endwhile;?>
            </table>
        </form>
        
    </body>
</html>