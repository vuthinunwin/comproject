<?php
session_start();

$errors = array(); 
// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'comproject');

if (isset($_POST['reg_user'])) {
    $firstname = $_POST['Customer_Name'];
    $lastname = $_POST['Customer_Lastname'];
    $username = $_POST['Customer_Username'];
    $email = $_POST['Customer_Email'];
    $password_1= $_POST['Customer_Password'];
    $password_2 = $_POST['Customer_Password2'];
    $telephone = $_POST['Customer_Telephone'];      
    $birthday = $_POST['Customer_Birthday'];
    $gerne = $_POST['Favorite_Gerne'];
  
    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($firstname)) { array_push($errors, "Firstname is required"); }
    if (empty($lastname)) { array_push($errors, "Lastname is required"); }
    if (empty($username)) { array_push($errors, "Username is required"); }
    if (empty($email)) { array_push($errors, "Email is required"); }
    if (empty($password_1)) { array_push($errors, "Password is required"); }
    if ($password_1 != $password_2) {array_push($errors, "The two passwords do not match");}
    if (empty($telephone)) { array_push($errors, "Telephone Number is required"); }
    if (empty($birthday)) { array_push($errors, "Birthday is required"); } 

  
    // first check the database to make sure 
    // a user does not already exist with the same username and/or email
    $user_check_query = "SELECT * FROM customer_db WHERE Customer_Username='$username' OR Customer_Email='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);
    
    if ($user) { // if user exists
      if ($user['username'] === $username) {
        array_push($errors, "Username already exists");
      }
  
      if ($user['email'] === $email) {
        array_push($errors, "email already exists");
      }
    }
  
    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
        $password = md5($password_1);//encrypt the password before saving in the database
  
        $sql = "INSERT INTO customer_db SET Customer_Username='$username' ,Customer_Password='$password_1',Customer_Email='$email', Customer_Name='$firstname'
        , Customer_Lastname='$lastname', Customer_Telephone='$telephone', Customer_Birthday='$birthday', Favorite_gerne='$gerne'";
        mysqli_query($db, $sql);
        $_SESSION['Customer_Username'] = $username;
        $_SESSION['success'] = "You are now logged in";
        header('location: index.php');
    }
}

if (isset($_POST['login_user'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
  
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
   
     if (count($errors) == 0) {
         $password = md5($password);
         $query = "SELECT * FROM customer_db WHERE Customer_Username='$username' AND Customer_Password='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
           $_SESSION['Customer_Username'] = $username;
           $_SESSION['Customer_Firstname'] = $firstname;
           $_SESSION['Customer_Lastname'] = $lastname;
           $_SESSION['success'] = "You are now logged in";
          header('location: index.php');
        }else 
        {
            array_push($errors, "Wrong username/password combination");
        }
  }
}
if (isset($_POST['pass_update'])) {
  $password_1= $_POST['Customer_Password1'];
  $password_2 = $_POST['Customer_Password2'];
  $password_3= $_POST['Customer_Password3'];

  if (empty($password_1)) { array_push($errors, "Old Password is required"); }
  if (empty($password_2)) { array_push($errors, "New Password is required"); }
  if (empty($password_3)) { array_push($errors, "Confirm New Password is required"); }
  if ($password_2 != $password_3) {array_push($errors, "The two passwords do not match");}
 
  
    // Finally, register user if there are no errors in the form
  if (count($errors) == 0) 
      {
        $password = md5($password_1);//encrypt the password before saving in the database
        $_SESSION['username'] = $username;
        $query = "UPDATE users SET password=$password_2 WHERE 'username' = $username";
        mysqli_query($db, $query);
        header('location: index.php');
      }
}
?>


#echo $_SESSION['firstname'],$_SESSION['lastname'] ใส่ใน index