<?php require("register.class.php")?>


<?php 
    if(isset($_POST['submit'])){
        $user = new RegisterUser($_POST['lastname'],$_POST['firstname'],$_POST['employeeid'],$_POST['password']);


    }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Rucek's IMS</title>

    <!-- MAIN STYLE -->
    <link rel="stylesheet" href="css/register.css">
    <link rel="icon" type="image/png" href="img/favcion.png" />
  </head>
  <body>
    <a href="index.php" class="logo">
        <img src="img/logo.png" alt="">
    </a>
<!-- partial:index.partial.html -->


<div class="form">
  <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
      <div class="title">REGISTER</div>
      <div class="input-container ic1">
        <input name=lastname class="input" type="text" placeholder=" " />
        <div class="cut"></div>
        <label for="lastname" class="placeholder">Your Last Name</label>
      </div>
      <div class="input-container ic2">
        <input name="firstname" class="input" type="text" placeholder=" " />
        <div class="cut"></div>
        <label for="firstname" class="placeholder">Your First Name</label>
      </div>
      <div class="input-container ic2">
        <input name= employeeid  class="input" type="text" placeholder=" " />
        <div class="cut cut-short"></div>
        <label for="employeeid" class="placeholder">Your Employee ID</label>
      </div>
      <div class="input-container ic2">
        <input name="password" class="input" type="password" placeholder=" " />
        <div class="cut cut-short"></div>
        <label for="password" class="placeholder">Your Password</label>
      </div>
      <p class="subtitle"  style="color: red;  text-align: center;  "><?php echo @$user->error ?></p> 
      <p class="subtitle"  style="color: green;  text-align: center;"><?php echo @$user->success ?></p>

      <button name="submit" type="submit" class="submit">Register</button>
      
      <p class="subtitle1">Already have an account? <a href="index.php">LOGIN</a></p>


    </form>
    </div>

<!-- partial -->



  </body>



