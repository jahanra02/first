<?php if (isset($errors) && count($errors) > 0) { ?>
  <div class="errors">
    <?php foreach ($errors as $error) { ?>
      <p><?php echo $error; ?></p>
    <?php } ?>
  </div>
<?php } ?>

<!DOCTYPE html>
<html>
<head>
    <title>Patient Registration Form</title>
</head>
<body>
    <h2>Patient Registration Form</h2>
    <form action="../controllers/registration_controller.php" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" required><br><br>

        <label for="address">Address:</label>
        <textarea id="address" name="address" required></textarea><br><br>

        <label for="gender">Gender:</label>
        <input type="radio" id="male" name="gender" value="male" required>
        <label for="male">Male</label>
        <input type="radio" id="female" name="gender" value="female" required>
        <label for="female">Female</label><br><br>

        <label for="dob">Date of Birth:</label>
        <input type="date" id="dob" name="dob" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <label for="medical_history">Medical History:</label>
        <textarea id="medical_history" name="medical_history"></textarea><br><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
