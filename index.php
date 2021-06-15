<?php
  session_start();
  if(isset($_SESSION['email'])){
    header("location:index.php?PageName=SignIn");
  }
  require './Database/database.php';
  $password = $email = "";
  if(isset($_POST['password']) && isset($_POST['email'])){
    $password = $_POST['password'];
    $email = $_POST['email'];
    $message = "";
    $connection = new mysqli($server_name, $server_user_name, $server_user_password, $server_database_name);
    $sql = "INSERT INTO users VALUES ('$email', '$password')";
    if($connection->query($sql)){
      header('location:pages/Contacts.php');
    }else{
      echo "<h4 style=\"color:red\">Registration Unsuccessful. $connection->error. Try again.<h4>";
    }
    $connection->close();
  }

  if(isset($_POST['sign_in'])){
    $password = $_POST['sign_in_password'];
    $email = $_POST['sign_in_email'];
    $connection = new mysqli($server_name, $server_user_name, $server_user_password, $server_database_name);
    $fetchsql = "SELECT * FROM `users` WHERE email = '$email' AND password = '$password'";
    $result = $connection->query($fetchsql);
    if($result->num_rows > 0){
      while($row = $result->fetch_assoc()) {
        $_SESSION['email'] = $email;
        header('location:pages/Contacts.php');
      }
    } else {
      echo "0 results";
    }
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/styles.css">
    <script src="./JavaScript/App.js"></script>
    <title>Document</title>
</head>

<body>
    <header class="footer-header-style">
        <h1>Welcome to Your Online Contact Manager</h1>
        <div id="header-buttons">
            <div id="sign-buttons">
              <a class="button" type="button" href="index.php?PageName=SignIn">Sign In</a>
              <a class="button" type="button" href="index.php?PageName=SignUp">Sign Up</a>
            </div>
        </div>
    </header>
    <main id="main">
        <?php
            $pages_folder = "pages";
            $pages_directory = scandir($pages_folder);
            unset($pages_directory[0], $pages_directory[1]);
            if(isset($_GET['PageName'])){
                $page_name = $_GET['PageName'];
                if(in_array($page_name.'.php', $pages_directory)){
                    include($pages_folder.'/'.$page_name.'.php');
                }else{
                    echo "not found";
                }
            }else{
                echo "Option not set";
            }
        ?>
    </main>
    <footer class="footer-header-style">
        <p>Powered by Jay Works &copy 2021</p>
    </footer>
</body>

</html>
