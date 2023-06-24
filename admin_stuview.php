<!DOCTYPE html>
<html> 

<head>
	<meta charset="utf-8">
	<title>Placement Management System</title>
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Font-->
	<link rel="stylesheet" type="text/css" href="css/sourcesanspro-font.css">
	<!-- Main Style Css -->
	<link rel="stylesheet" href="css/style.css" />
	<link rel="stylesheet" href="css/bootstrap.min.css" />
</head>

<body class="form-v8"> 
<?php if (isset($_GET['msg']) && $_GET['msg'] == 1) {
        echo "<script> alert('Records inserted successfully') </script>";
    }
    ?>
	<div class="page-content">
		<div class="form-v9-content">
			<div class="card ">
				<div class="card-header card-primary" style="color: #000;background-color: #00a6ff;padding: 15px;">Placement Management System<span style="float: right; "><a href='studentsignin.php' class="btn btn-sm btn-warning">Register</a></span></div>
				<div class="card-body">
	
	
	<div class="24554554"></div>			
		<table class="table table-striped" border=2 >
						<thead>
							<tr>
								<th>S no</th>
                                <th>FirstName</th>
                                <th>LastName</th>					
                                <th>Age</th>
								<th>Email</th>	
                                <th>Number</th>
								<th>Address</th>	
								<th>10th</th>
								<th>12th</th>
								<th>UG</th>
								<th>PG</th>
								<th>Gender</th>			
								<th>Technology</th>								

							</tr>
						</thead>
						<tbody>
							<?php

							$mysqli = new mysqli("localhost", "root", "", "student");
							$i = 1;
							// Check connection
							if ($mysqli === false) {
								die("ERROR: Could not connect. " . $mysqli->connect_error);
							}
							# Prepare the SELECT Query
							$query  = 'SELECT * FROM `student`.`student`';
							if ($result = $mysqli->query($query)) {
								while ($row = $result->fetch_assoc()) {
									# Execute the SELECT Query
							?>
									<tr>
										<td><?php echo $i++ ?></td>
                                        <td><?php echo $row['first_name'] ?></td>
                                        <td><?php echo $row['last_name'] ?></td>				
                                        <td><?php echo $row['age'] ?></td>
								        <td><?php echo $row['email_id'] ?></td>
								        <td><?php echo $row['mobile_number'] ?></td>
										<td><?php echo $row['address'] ?></td>
										<td><?php echo $row['ssc_marks'] ?></td>
										<td><?php echo $row['hsc'] ?></td>
										<td><?php echo $row['ug'] ?></td>
										<td><?php echo $row['pg'] ?></td>
								        <td><?php echo $row['gender'] ?></td>			
								        
								        <td><?php echo $row['technology'] ?></td>	
									</tr>
							<?php
								}
							} ?>
						</tbody>
					</table>
				</div>
			</div>

		</div>
	</div>

</body>

</html>