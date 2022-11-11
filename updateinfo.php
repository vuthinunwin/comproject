<?php 
  include('testupdate.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Update Info</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="header">
	<h2>Update Info</h2>
</div>
<form action="updateinfo.php" method="post">
<?php include('errors.php'); ?>
<div class="input-group"> 
    <label for="New Username" class="form-label">Username</label>
        <input type="text" name="Customer_Username">  
</div>
<div class="input-group"> 
    <label for="New Email" class="form-label">Email</label>
        <input type="email" name="Customer_Email">
</div>
<div class="input-group">
  	  <button type="submit" class="btn" name="info_update">Update Info</button>
</div>
</form>	
</body>
</html>
