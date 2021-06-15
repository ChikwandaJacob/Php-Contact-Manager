<div>
  <h3 style="text-align:center">Search Record</h3>
  <form action="" method="post">
      <label for="firstName">First Name</label><br>
      <input class="form-input" type="text" name="firstName" placeholder="Kindly enter contacts first name..." required><br><br>
      <button type="submit" name="search" style="background-color:#5cb85c; border: none; font-size: 15px;" class="button" href="#">Search</button>
  </form>
  <?php
    if(isset($_POST['search'])){
      $connection = new mysqli($server_name, $server_user_name, $server_user_password, $server_database_name);
      $fname = $_POST['firstName'];
      $sql = "SELECT * FROM contacts WHERE firstName = '$fname'";
      $result = $connection->query($sql);
      ?>
      <table>
        <tr>
          <th>fname</th>
          <th>lname</th>
          <th>email</th>
          <th>phone 1</th>
          <th>phone 2</th>
          <th>phone 3</th>
          <th>whatsapp</th>
          <th>action 1</th>
          <th>action 2</th>
        </tr>
        <?php
      if($result->num_rows > 0){
        while($row = $result->fetch_assoc()) {
        ?>
        <tr>
          <td><?php echo $row["firstName"]; ?></td>
          <td><?php echo $row["lastName"]; ?></td>
          <td><?php echo $row["contactEmail"]; ?></td>
          <td><?php echo $row["phone1"]; ?></td>
          <td><?php echo $row["phone2"]; ?></td>
          <td><?php echo $row["phone3"]; ?></td>
          <td><?php echo $row["whatSapp"]; ?></td>
          <td><a href="delete.php?delete=<?php echo $row["contactEmail"]; ?>">Delete</a></td>
          <td><a href="update.php?update=<?php echo $row["contactEmail"]; ?>">Update</a></td>
        </tr>
    <?php
  }?>
  </table>
  <?php
}else{
      ?>
    <h4 style="color:red; text-align:center">Record Not Added. $connection->error. Try again.<h4>
    <?php
      }
      $connection->close();
    }
    ?>

</div>
