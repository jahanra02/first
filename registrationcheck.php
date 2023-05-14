
<?php
require_once('../models/dbmodel.php');

if(isset($_POST['submit']))
{
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $address = $_POST['address'];
  $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
  $dob = $_POST['dob'];
  $password = $_POST['password'];
  $medical_history = $_POST['medical_history'];
  
  // Validation
  if(empty($name) || empty($email) || empty($password))
  {
    echo "Please fill in all required fields.";
  }
  else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Please enter a valid email address.";
  }
  else if (!preg_match('/^[0-9]{10}$/', $phone)) {
    echo "Please enter a valid phone number.";
  }
  else if (strlen($password) < 8) {
    echo "Password must be at least 8 characters long.";
  }
  else
  {
    $result = register($name, $email, $phone, $address, $gender, $dob, $password, $medical_history);
    
    if($result)
    {
      header('Location:../views/login.php');
    }
    else
    {
      header('Location:../views/registration.php');
    }
  } 
}




