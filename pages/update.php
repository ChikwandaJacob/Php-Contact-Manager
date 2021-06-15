<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/styles.css">
    <script src="../JavaScript/App.js"></script>
    <title>Document</title>
</head>

<body>
  <?php
  require '../Database/database.php';
    $global_email = $_GET['update'];
      if(isset($_POST['update-data'])){
        $connection = new mysqli($server_name, $server_user_name, $server_user_password, $server_database_name);
        $fname = $_POST['firstName'];
        $lname = $_POST['lastName'];
        $email = $_POST['email'];
        $phone1 = $_POST['phone1'];
        $phone2 = $_POST['phone2'];
        $phone3 = $_POST['phone3'];
        $whatsapp = $_POST['whatsapp'];
        $sql = "UPDATE contacts SET firstName = '$fname', lastName = '$lname', contactEmail = '$email', phone1 = '$phone1', phone2 = '$phone2', phone3 = '$phone3', whatSapp = '$whatsapp' WHERE contactEmail = '$global_email'";
        if($connection->query($sql)){
          echo "<h3 style=\"color:green\">Record updated Successful.<h3>";
          echo "Click <a href=\"Contacts.php?PageName=Display\">here</a> to go back.";
        }else{
          echo "<h3 style=\"color:red\">Record not updated. $connection->error. Try again.<h3>";
          echo "Click <a href=\"Contacts.php?PageName=Display\">here</a> to go back.";
        }
      }
      $connection = new mysqli($server_name, $server_user_name, $server_user_password, $server_database_name);
      $sql = "SELECT * FROM contacts WHERE contactEmail='$global_email'";
      $result = $connection->query($sql);
      if($result->num_rows > 0){
        while($row = $result->fetch_assoc()) {?>
<main>
      <div>
      <h3 style="text-align:center">Update Record</h3>
      <form action="" method="post">
          <label for="firstName">First Name</label><br>
          <input class="form-input" type="text" name="firstName" value="<?php echo $row["firstName"]; ?>" placeholder="Kindly enter contacts first name..." required><br>
          <label for="lastName">Last Name</label><br>
          <input class="form-input" type="text" name="lastName" value="<?php echo $row["lastName"]; ?>" placeholder="Kindly enter contacts last name..." required><br>
          <label for="Email">Email</label><br>
          <input class="form-input" type="text" name="email" value="<?php echo $row["contactEmail"]; ?>" placeholder="Kindly enter contacts email..." required><br>
          <label for="phone1">Phone 1</label><br>
          <input class="form-input" type="text" name="phone1" value="<?php echo $row["phone1"]; ?>" placeholder="Kindly enter contacts first phone number..." required><br>
          <label for="phone2">Phone 2</label><br>
          <input class="form-input" type="text" name="phone2" value="<?php echo $row["phone2"]; ?>" placeholder="Kindly enter contacts second phone number..." required><br>
          <label for="phone3">Phone 3</label><br>
          <input class="form-input" type="text" name="phone3" value="<?php echo $row["phone3"]; ?>" placeholder="Kindly enter contacts third phone number..." required><br>
          <label for="whatsapp">WhatSapp</label><br>
          <input class="form-input" type="text" name="whatsapp" value="<?php echo $row["whatSapp"]; ?>" placeholder="Kindly enter contacts whatsapp line..." required><br><br>
          <button type="submit" name="update-data" style="background-color:#5cb85c; border: none; font-size: 15px;" class="button" href="#">Update</button>
      </form>
      <?php
    }
      $connection->close();
    }
      ?>
  </div>
  <main>
</body>

</html>
