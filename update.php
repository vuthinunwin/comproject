<?php
session_start();
$errors = array(); 

$db = mysqli_connect('localhost', 'root', '', 'comproject');


if (isset($_POST['pass_update'])) {
    $username = $_SESSION['username'];
    $check = "SELECT password FROM users WHERE username = '$username'";
    $sql = mysqli_query($db, $check);
    $result= mysqli_fetch_assoc($sql);
    $password_1= $_POST['Customer_Password1'];
    $password_2 = $_POST['Customer_Password2'];
    $password_3= $_POST['Customer_Password3'];
    echo ($result["password"]);
    if (($password_1)&&md5($password_1)!=$result["password"]) { array_push($errors, "Your Old Password is wrong"); }
    if (empty($password_1)) { array_push($errors, "Old Password is required"); }
    if (empty($password_2)) { array_push($errors, "New Password is required"); }
    if (empty($password_3)) { array_push($errors, "Confirm New Password is required"); }
    if ($password_2 != $password_3) {array_push($errors, "The two passwords do not match");}
   
    
      // Finally, register user if there are no errors in the form
    if (count($errors) == 0) 
        {
          $password = md5($password_2);//encrypt the password before saving in the database
          $query = "UPDATE users SET password='$password' WHERE username = '$username'";
          mysqli_query($db, $query);
          header('location: index.php');
        }
        
}
?>
