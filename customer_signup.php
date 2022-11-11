<?php 
  include('connection.php'); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
    <title>Registration system</title>
</head>
<body>
<div class="header">
  	<h2>Register</h2>
  </div>
    <form action="customer_signup.php" method="post">
      <?php include('errors.php'); ?>
  	  <div class="input-group"> 
        <label for="First name" class="form-label">First name</label>
        <input type="text" name="Customer_Name">
      </div>
      <div class="input-group"> 
        <label for="Last name" class="form-label">Last name</label>
        <input type="text" name="Customer_Lastname">
      </div>
      <div class="input-group"> 
      <label for="Username" class="form-label">Username</label>
          	<input type="text" name="Customer_Username">
      </div>
      <div class="input-group"> 
      <label for="Password" class="form-label">Password</label>
            <input type="password" name="Customer_Password">  
      </div>
      <div class="input-group"> 
      <label for="Confirm Password" class="form-label">Confirm Password</label>
            <input type="password" name="Customer_Password2">
      </div>
      <div class="input-group"> 
      <label for="Email address">Email address</label>
            <input type="email" name="Customer_Email">
      </div>
      <div class="input-group"> 
      <label for="Phone">Enter your phone number:</label>
            <input type="tel" class="form-control" id="phone" name="Customer_Telephone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}">
      </div>
      <div class="input-group"> 
      <label for="birthday">Birthday:</label>
            <input type="date" class="form-control" id="birthday" name="Customer_Birthday">  
      </div>
      <div class="input-group"> 
      <label for="favorite genre">Favorite Genre:</label>
            <select class="form-select" name="Favorite_Gerne" >
              <option selected>Select Genre</option>
              <option value="1">Pop</option>
              <option value="2">Rock</option>
              <option value="3">Jazz</option>
            </select>
     </div>
     <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
            <label class="form-check-label" for="invalidCheck2">
              Agree to terms and conditions
            </label>
      </div>
     <div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
  	<p>
  		Already a member? <a href="loginpage.php">Login</a>
  	</p>
    </form>
	
</body>
</html>