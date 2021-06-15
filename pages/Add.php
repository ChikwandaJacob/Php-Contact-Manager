<?php
  if(isset($_POST['add'])){
    $connection = new mysqli($server_name, $server_user_name, $server_user_password, $server_database_name);
    $fname = $_POST['firstName'];
    $lname = $_POST['lastName'];
    $email = $_POST['email'];
    $phone1 = $_POST['phone1'];
    $phone2 = $_POST['phone2'];
    $phone3 = $_POST['phone3'];
    $whatsapp = $_POST['whatsapp'];
    $userEmail = $_SESSION['email'];
    $sql = "INSERT INTO contacts VALUES ('$fname', '$lname', '$email', '$phone1', '$phone2', '$phone3', '$whatsapp', '$userEmail')";
    if($connection->query($sql)){
      ?>

<div >
    <h4 style="color:green; text-align:center">Record Added.<h4>
    <?php
      }else{
      ?>
    <h4 style="color:red; text-align:center">Record Not Added. $connection->error. Try again.<h4>
    <?php
      }
      $connection->close();
    }
    ?>
    <h3 style="text-align:center">Add Record</h3>
    <form action="" method="post">
        <label for="firstName">First Name</label><br>
        <input class="form-input" type="text" name="firstName" placeholder="Kindly enter contacts first name..." required><br>
        <label for="lastName">Last Name</label><br>
        <input class="form-input" type="text" name="lastName" placeholder="Kindly enter contacts last name..." required><br>
        <label for="Email">Email</label><br>
        <input class="form-input" type="text" name="email" placeholder="Kindly enter contacts email..." required><br>
        <label for="phone1">Phone 1</label><br>
        <input class="form-input" type="text" name="phone1" placeholder="Kindly enter contacts first phone number..." required><br>
        <label for="phone2">Phone 2</label><br>
        <input class="form-input" type="text" name="phone2" placeholder="Kindly enter contacts second phone number..." required><br>
        <label for="phone3">Phone 3</label><br>
        <input class="form-input" type="text" name="phone3" placeholder="Kindly enter contacts third phone number..." required><br>
        <label for="whatsapp">WhatSapp</label><br>
        <input class="form-input" type="text" name="whatsapp" id="password" placeholder="Kindly enter contacts whatsapp line..." required><br><br>
        <button type="submit" name="add" style="background-color:#5cb85c; border: none; font-size: 15px;" class="button" href="#">Add</button>
    </form>
</div>
