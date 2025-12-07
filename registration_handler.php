<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login to Cook Me</title>
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/login.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  
  
  <script type="text/javascript">
    $(document).ready(function() {
    $('#loginForm').on('submit', function(e) {
      if ($('#email').val() == '' || $('#password').val() == '') {
      alert('Both fields are required!');
      e.preventDefault();
      }
    });
    });
  </script>
  
  <title>Registation Status</title>
</head>
<body>
  <div class=centered-text>
    <?php
    require 'config.php';

    $userFirstName = $_POST["first-name"] ?? '';
    $userLastName = $_POST["last-name"] ?? '';
    $userEmail = $_POST["email"] ?? '';
    $userCountry = $_POST["country"] ?? '';
    $userMobileNumber = $_POST["mobile-number"] ?? '';
    $userConfirmPassword = $_POST["confirm-password"] ?? '';

    $sql = "SELECT * FROM user WHERE Email = '$userEmail' OR Contact_Number = '$userMobileNumber'";
    $result = $con->query($sql);
    
    if ($result->num_rows > 0) {
      echo "<h2>E-mail or phone number already registered.<br>Please use a different one.</h2>";               
      echo '<a href="registationform.php" class="register-btn">Register Now</a>';
    } else {
      $insert_sql = "INSERT INTO user VALUES ('','$userFirstName','$userLastName','$userEmail','$userCountry','$userMobileNumber','$userConfirmPassword')";
      if($con->query($insert_sql)){
        
        header("Location: login_index.php");
      } else {
        echo "Error".$con->error;
      }
    }
    $con->close();
    ?>  
  </div>
</body>
</html>
