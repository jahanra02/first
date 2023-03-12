<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>
</head>
<body>

<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $user_name = $_POST['user_name'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $short_bio = $_POST['short_bio'];

    // Validate form data
    if (empty($user_name)) {
        $_SESSION['error_message'] = "User name is required.";
    } elseif (empty($first_name)) {
        $_SESSION['error_message'] = "First name is required.";
    } elseif (empty($last_name)) {
        $_SESSION['error_message'] = "Last name is required.";
    } elseif (empty($email)) {
        $_SESSION['error_message'] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error_message'] = "Invalid email format.";
    } elseif (empty($short_bio)) {
        $_SESSION['error_message'] = "Short bio is required.";
    } else {
        // Save form data to database or send an email
        // Redirect to success page
        $_SESSION['success_message'] = "Registration successful.";
        header('Location: success.php');
        exit();
    }
}
?>

<h1>Registration Form</h1>

<?php
// Display error message if there is one
if(isset($_SESSION['error_message'])) {
    echo '<div style="color:red;">'.$_SESSION['error_message'].'</div>';
    unset($_SESSION['error_message']);
}
?>

<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <table>
        <tr>
            <td><label for="user_name">User Name*</label></td>
            <td><input type="text" name="user_name"></td>
        </tr>
        <tr>
            <td><label for="first_name">First Name*</label></td>
            <td><input type="text" name="first_name"></td>
        </tr>
        <tr>
            <td><label for="last_name">Last Name*</label></td>
            <td><input type="text" name="last_name"></td>
        </tr>
        <tr>
            <td><label for="email">Email*</label></td>
            <td><input type="email" name="email"></td>
        </tr>
        <tr>
            <td><label for="short_bio">Short Bio</label></td>
            <td><textarea name="short_bio"></textarea></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="submit" value="Submit"></td>
        </tr>
    </table>
</form>

</body>
</html>
