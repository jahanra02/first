
<?php
$nameErr = $emailErr = ""; 
$name = $email = ""; 


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
            $nameErr = "Only letters and white space allowed";
        }
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    /*if(isset($POST['Upload-Img']))
    {
     $file_name =$_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name']; 
      $file_type =$_FILES['image']['type'];
      move_uploaded_file($file_temp, "image/" . $file_name);}*/

    

    if (empty($nameErr) && empty($emailErr)) {
        $myfile = fopen("sdf.txt", "a") or die("Can't open file");
        $txt = $name . ", " . $email . "\n";
        fwrite($myfile, $txt);
        fclose($myfile);

       
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Reg</title>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
         <fieldset> <legend>Registration</legend>
        Name: <input type="text" name="name" value="<?php echo $name;?>"><br>
        <?php if (!empty($nameErr)) {
            echo $nameErr . "<br>";
        } ?>
        Email: <input type="email" name="email" value="<?php echo $email;?>"><br>
        <?php if (!empty($emailErr)) {
            echo $emailErr . "<br>";
        } ?>
         Password: <input type="password" name="pass" placeholder="Enter your password"><br><br><hr>
          Your Image: <input type="file" name="image" ><br><br><hr>
            <input type="submit" value="Submit">
            </fieldset> 
        </form>
        </body>
        </html>
     














































































