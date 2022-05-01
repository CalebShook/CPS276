<?php

require_once('../../../shared/db.php');

$name = "John Doe";
$nameError = "";
$address = "123 Blue st";
$addressError = "";
$city = "Ann Arbor";
$cityError = "";
$phone = "123.123.1234";
$phoneError = "";
$email = "john@gmail.com";
$emailError = "";
$dob = "1995-07-12";
$dobError = "";
$cb1 = "n";
$cb2 = "n";
$cb3 = "n";
$ageGroupError = "";
$errors = 0;

if(isset($_POST['submit'])) {

    $pattern = '/^([a-z]|-|\'|\s)+$/i';
    $name = $_REQUEST['name'];
    if(preg_match($pattern, $name) != 1) {
        $nameError = "Invalid Name";
        $errors++;
    }

    $pattern = '/^\d+\s(\.|-|[a-z]|\s)+$/i';
    $address = $_REQUEST['address'];
    if(preg_match($pattern, $address) != 1) {
        $addressError = "Invalid Address";
        $errors++;
    }

    $pattern = '/^[a-z\s]+$/i';
    $city = $_REQUEST['city'];
    if(preg_match($pattern, $city) != 1) {
        $cityError = "Invalid City Name";
        $errors++;
    }

    $pattern = '/^\d{3}\.\d{3}\.\d{4}$/';
    $phone = $_REQUEST['phone'];
    if(preg_match($pattern, $phone) != 1) {
        $phoneError = "Invalid Phone Number";
        $errors++;
    }

    $email = $_REQUEST['email'];
    if(filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
        $emailError = "Invalid Email Address";
        $errors++;
    }

    $pattern = '/^\d{4}\-\d{2}\-\d{2}$/';  
    $dob = $_REQUEST['dob'];
    if(preg_match($pattern, $dob) != 1) {
        $dobError = "Invalid Date of Birth";
        $errors++;
		echo($dob);
    }

    if(!isset($_REQUEST['age'])) {
        $ageGroupError = "Please Select an Age Range";
        $errors++;
    }

	if(isset($_REQUEST['cb1'])) {
		$cb1 = "y";
	}

	if(isset($_REQUEST['cb2'])) {
		$cb2 = "y";
	}

	if(isset($_REQUEST['cb3'])) {
		$cb3 = "y";
	}

    if($errors == 0) {

		$state = $_REQUEST['state'];
		$age = $_REQUEST['age'];

		$db = getPDO();
		$query = "INSERT INTO a10 (name, address, city, phone, state, dob, age, email, cb1, cb2, cb3) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		$stmt = $db->prepare($query);
		$stmt->execute([$name, $address, $city, $phone, $state, $dob, $age, $email, $cb1, $cb2, $cb3]);

        $name = "";
        $nameError = "";
        $address = "";
        $addressError = "";
        $city = "";
        $cityError = "";
        $phone = "";
        $phoneError = "";
        $email = "";
        $emailError = "";
        $dob = "";
        $dobError = "";
        $ageGroupError = "";
    }

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
			<div class="form-group">
							</div>
			<div class="form-group">
   				<label for="name" class="space">Name (letters only)</label><div class="error"><?=$nameError?></div>
				<input type="text" class="form-control" name="name" id="name" value="<?=$name?>">
			</div>
			<div class="form-group">
   				<label for="address" class="space">Address (just number and street)</label><div class="error"><?=$addressError?></div>
				<input type="text" class="form-control" name="address" id="address" value="<?=$address?>">
			</div>
			<div class="form-group">
   				<label for="city" class="space">City</label><div class="error"><?=$cityError?></div>
				<input value="<?=$city?>" type="text" class="form-control" name="city" id="city">
			</div>
			<div class="form-group">
   				<label for="state" class="space">State</label>
				<select class="form-control" name="state" id="state">
					<option value="Michigan">Michigan</option>
					<option value="Wisconsin">Wisconsin</option>
					<option value="Illinois">Illinois</option>
					<option value="Indiana">Indiana</option>
					<option value="Minnesota">Minnesota</option>
				</select>
			</div>
			<div class="form-group">
   				<label for="phone" class="space">Phone</label><div class="error"><?=$phoneError?></div>
				<input value="<?=$phone?>" type="text" class="form-control" name="phone" id="phone">
			</div>
			<div class="form-group">
   				<label for="email" class="space">Email</label><div class="error"><?=$emailError?></div>
				<input value="<?=$email?>" type="text" class="form-control" name="email" id="email">
			</div>
			<div class="form-group">
   				<label for="dob" class="space">Date of birth</label><div class="error"><?=$dobError?></div>
				<input value="<?=$dob?>" type="date" class="form-control" name="dob" id="dob">
			</div>
			<div class="form-group">
				Please check all contact types you would like (optional):<br>
				<input type="checkbox" id="cb1" name="cb1" value="cb1">
  				<label for="cb1"> Newsletter</label>&nbsp;&nbsp;
 			    <input type="checkbox" id="cb2" name="cb2" value="cb2">
  				<label for="cb2"> Email Updates</label>&nbsp;&nbsp;
   			    <input type="checkbox" id="cb3" name="cb3" value="cb3">
  				<label for="cb3"> Text Updates</label>&nbsp;&nbsp;
			</div>
			<div class="form-group">
				<div class="space">Please select an age range (you must select one)</div><div class="error"><?=$ageGroupError?></div><br>
				<input type="radio" id="10-18" name="age" value="10-18">
 				<label for="10-18">10-18</label>&nbsp;&nbsp;
    			<input type="radio" id="19-30" name="age" value="19-30">
 				<label for="19-30">19-30</label>&nbsp;&nbsp;
				<input type="radio" id="30-50" name="age" value="30-50">
 				<label for="30-50">30-50</label>&nbsp;&nbsp;
				<input type="radio" id="51+" name="age" value="51+">
 				<label for="51+">51+</label>
			</div>


			<button type="submit" name="submit" class="btn btn-primary">Submit</button>
			<br><br><br><br>
		</form>
		

	
 </body></html>