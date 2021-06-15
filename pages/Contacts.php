<?php
  session_start();
  require('../Database/database.php');
  if(!isset($_SESSION['email'])){
      header('location:index.php?PageName=SignIn');
  }
    if(isset($_POST['delete'])){
      echo "<h3>Delete set</h3>";
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/styles.css">
    <script src="../JavaScript/App.js"></script>
    <title>Document</title>
    <style>
    table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }

    td, th {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
    }

    tr:nth-child(even) {
      background-color: #dddddd;
    }
    </style>
</head>

<body>
    <header class="footer-header-style">
        <h1>Welcome <?php echo $_SESSION['email'] ?></h1>
        <div id="header-buttons">
          <div id="sign-buttons">
            <a class="button" type="button" href="Contacts.php?PageName=Add">Add</a>
            <a class="button" type="button" href="Contacts.php?PageName=Search">Search</a>
            <a class="button" type="button" href="Contacts.php?PageName=Display">Show Records</a>
            <a class="button" type="button" href="Contacts.php?PageName=home">Log Out</a>
          </div>
        </div>
    </header>
    <main id="contact-main">
      <?php
          $pages_folder = "./";
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
