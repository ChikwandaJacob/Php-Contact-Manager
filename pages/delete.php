<?php
  require '../Database/database.php';
  $email = $_GET['delete'];
  $connection = new mysqli($server_name, $server_user_name, $server_user_password, $server_database_name);
  $sql = "DELETE FROM contacts WHERE contactEmail='$email'";
  if ($connection->query($sql) === TRUE) {
    echo "<h3 style=\"color:green\">Record Deleted Successful.<h3>";
    echo "Click <a href=\"Contacts.php?PageName=Display\">here</a> to go back.";
  } else {
    echo "<h3 style=\"color:green\">Record not Deleted. $connection->error. Try again.<h3>";
    echo "Click <a href=\"Contacts.php?PageName=Display\">here</a> to go back.";
  }
  $connection->close();
?>
