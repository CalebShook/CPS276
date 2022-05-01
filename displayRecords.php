<?php

require_once('../../../shared/db.php');

$results = execute("SELECT * FROM a10");

for($i=0; $i<count($results); $i++) {
	$name[$i] = $results[$i]['name'];
	$address[$i] = $results[$i]['address'];
	$phone[$i] = $results[$i]['phone'];
	$email[$i] = $results[$i]['email'];
	$dob[$i] = $results[$i]['dob'];
	$age[$i] = $results[$i]['age'];
	if($results[$i]['cb1'] == "y") {
		$contactInfo[$i] = "Newsletter";
	}
	else {
		$contactInfo[$i] = "";
	}
	if($results[$i]['cb2'] == "y") {
		if($contactInfo[$i] == "") {
			$contactInfo[$i] = "Email Updates";
		}
		else {
			$contactInfo[$i] .= ", " . "Email Updates" ;
		}
	}
	if($results[$i]['cb3'] == "y") {
		if($contactInfo[$i] == "") {
			$contactInfo[$i] = "Text Updates";
		}
		else {
			$contactInfo[$i] .= ", " . "Text Updates";
		}
	}
	
}

if(isset($_REQUEST['delete'])) {
	for($i=0; $i<count($results); $i++) {
		$delete = "del_id_" . $results[$i]['a10_id'];
		if(isset($_REQUEST[$delete])) {
			$id = $results[$i]['a10_id'];
			$results = execute("DELETE FROM a10 WHERE a10_id = $id");
		}
	}
	header("Refresh:0");
}



?>

<html lang="en"><head>
		<title>Final Project</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<style>
			.error {
				color: red;
				margin-left: 5px;
			}

			/* I added the float left */
			.space {
				margin-right: 30px;
				float:left;
			}
			nav ul li {
				list-style: none;
			}
			</style>
	</head>

	<body class="container">
		<nav>
			<ul>
				<li><a href="http://russet.wccnet.edu/~syshook/10/student_assets/php/form.php">Add Contact Information</a></li>
				<li><a href="http://russet.wccnet.edu/~syshook/10/student_assets/php/displayRecords.php">Display All Contacts Information</a></li>
			</ul>
		</nav>
					<form method="post">
				<table class="table table-striped">
					<thead>
						<tr>
							<th scope="col">Name</th>
							<th scope="col">Address</th>
							<th scope="col">Phone</th>
							<th scope="col">Email</th>
							<th scope="col">DOB</th>
							<th scope="col">Contact</th>
							<th scope="col">Age</th>
							<th scope="col"></th>
						</tr>
					</thead>	
					<tbody>
						<?
						
						for($i=0; $i<count($results); $i++) {
							echo("<tr>
							<td>" . $name[$i] . "</td>
							<td>" . $address[$i] . "</td>
							<td>" . $phone[$i] . "</td>
							<td>" . $email[$i] . "</td>
							<td>" . $dob[$i] . "</td>
							<td>" . $contactInfo[$i] . "</td>
							<td nowrap=''>" . $age[$i] . "</td>
							<td><input type='checkbox' name='del_id_" . $results[$i]['a10_id'] . "'></td>
							</tr>");
						}
						
						?>
						
				<button onclick="return confirm('Are you sure?');" type="submit" name="delete" class="btn btn-danger">Delete</button>
			</form>
		

	
 </body></html>

