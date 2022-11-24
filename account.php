<?php 

session_start();
if(!isset($_SESSION['user'])){
	header("location:index.php"); exit();
}

if(isset($_GET['logout'])){
	unset($_SESSION['user']);
	header("location:index.php"); exit();
}

?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Rucek</title>
  	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
	<link rel='stylesheet' href='https://s3-us-west-2.amazonaws.com/s.cdpn.io/1462889/unicons.css'>
	<script type="text/javascript" src="main.js"></script>
	<link rel="stylesheet" href="css/account.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://codepen.io/skjha5993/pen/bXqWpR.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css'>
	<link rel="icon" type="image/png" href="img/favcion.png" />
	

</head>
<body class="body">

	<div class="container">
		<div class="row">

	
	
	<div class="col-sm-4 form-group mb-0">
	<a href="" class="logo float-left" >
        <img src="img/logo.png" alt="">
    </a>
	</div>

	<div class="col-sm-4 form-group mb-0">
	<h2 class="text-center textstyle">RUCEK GAMING LOUNGE</h2>
	</div>
	
	<div class="col-sm-4 form-group mb-0">
		<a href="?logout" class="btn btn-primary float-right" style="margin: 60px 0px;">Log Out</a>
	 </div>
	

</div>
</div>
</div>

    <div class="container">
        <form id="my-form" name="" onsubmit="return validateForm();" method="POST" action="https://script.google.com/macros/s/AKfycbyzLsTZKXJc2JtwabEQSXjTbAQiR9qUMLTJyfR_zIUjJUXdRZLLcjb0FN0dwVlT-FPFnw/exec">
        <div class="row jumbotron">

			<div class="col-sm-4 form-group change">
				<label> <b>Employee ID</b></label>
				<select readonly id="employeeid" name="EmployeeID" class="form-control custom-select browser-default">
					<option value="<?php echo $_SESSION['user'] ?>" selected><?php echo $_SESSION['user'] ?></option>
					</select>
			</div>

			<div class="col-sm-4 form-group">
			<label for="console">Console</label>
			<select id="console" name="Console" class="form-control custom-select browser-default" onchange="gameChange(this);" required>
				<option value="" selected disabled>Select Game Console</option>
				<option value="Play Station 3">Play Station 3</option>
				<option value="Play Station 4">Play Station 4</option>
				<option value="Play Station 5">Play Station 5</option>
			</select>
			</div>

			<div class="col-sm-4 form-group">
			<label for="game">Game Type</label>
			<select id="game" name="Game" class="form-control custom-select browser-default">
				<option value="0">Select Game Type</option>
			</select>
			</div>

			<div class="col-sm-3 form-group">
			<label>Duration</label>
			<select id="duration" name="Duration" class="form-control custom-select browser-default" required>
			  <option value="" selected disabled>Select Duration</option>
			  <option value="10 minutes">10 minutes</option>
			  <option value="30 minutes">30 minutes</option>
			  <option value="1 hour">1 hour</option>
			  <option value="2 hours">2 hours</option>
			  <option value="3 hours">3 hours</option>
			  <option value="4 hours">4 hours</option>
			  <option value="5 hours">5 hours</option>
			  <option value="10 hours">10 hours</option>
			  </select>
			</div>

			<div class="col-sm-3 form-group change">
			<label>Cost Per Game</label>
			<select id="cost" name="Cost" class="form-control custom-select browser-default" required>
				<option value="" selected disabled>Select Cost Per Game</option>
				<option value="50">₦50</option>
				<option value="100">₦100</option>
				<option value="200">₦200</option>
				<option value="500">₦500</option>
				<option value="1000">₦1,000</option>
				<option value="2000">₦2,000</option>
				<option value="3000">₦3,000</option>
				<option value="4000">₦4,000</option>
				<option value="5000">₦5,000</option>
				<option value="10000">₦10,000</option>
			</select>
			</div>

			<div class="col-sm-3 form-group change">
                <label for="count">Count</label>
                <input type="number" name="Count" class="form-control" id="count" placeholder="Enter Game Count" min="1" required>
            </div>

			<div class="col-sm-3 form-group change">
				<label>Players</label>
				<select id="players" name="Players" class="form-control custom-select browser-default" required>
					<option value="" selected disabled>Select Players</option>
					<option value="1">1</option>
					<option value="2">2</option>
				</select>
			</div>

			<div class="col-sm-3 form-group">
				<label for="screen">Screen</label>
				<input type="number" name="Screen" class="form-control" id="screen" placeholder="Enter Screen Number" min="1" required>
			</div>

			<div class="col-sm-3 form-group">
				<label for="due">Amount Due </label>
			<div class="input-group mb-3">
				<span class="input-group-text">₦</span>
				<input type="" readonly value="0" name="Amount Due" class="form-control" id="due" required>
			  </div>
			</div>

			<div class="col-sm-3 form-group change">
				<label>Status</label>
				<select readonly id="status" name="Status" class="form-control custom-select browser-default">
					<option value="PAID/PLAYED" selected>PAID/PLAYED</option>
					</select>
			</div>

			<div class="col-sm-3 form-group change">
				<label>Payment Method</label>
				<select id="method" name="Method" class="form-control custom-select browser-default" required>
					<option value="" selected disabled>Select Payment Method</option>
					<option value="Cash">Cash</option>
					<option value="Transfer">Transfer</option>
				</select>
			</div>



            <div class="col-sm-12 form-group mb-0">
               <button id="sub" type="submit"class="btn btn-primary float-right">Submit</button>
            </div>
            
        </div>
        </form>
    </div>

	<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
	<script  src="javascript/main.js"></script>
	<script  src="javascript/script.js"></script>


</body>
</html>


