<!DOCTYPE html>
<html lang="en">

<head>
  <title>Password List</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
  <link rel="stylesheet" type="text/css" href="css/util.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
</head>

<body>

  <div class="limiter">
    <div class="container-login  " style="background-image: url('images/bg-01.jpg');">
      <div class=" p-t-30 p-b-50">
        <span class="SystemHeadings p-b-41">
          Password Management System
        </span>
        <div class="displayBox  p-b-33 p-t-5">
          <table>
            <tr>
              <th>ID</th>
              <th>Title</th>
              <th>Username</th>
              <th>Password</th>
              <th>URL</th>
            </tr>
            <?php include 'php/password_list.php';

            while ($row = mysqli_fetch_assoc($result)) {

            ?>
              <tr class="grab">
                <td scope="row" id="id"><?php echo $row['id']; ?></td>
                <td ondblclick="editPassword(<?php echo $row['id']; ?>)" id="title<?php echo $row['id']; ?>"><?php echo $row['title']; ?></td>
                <td id="uname<?php echo $row['id']; ?>"><?php echo $row['username']; ?></td>
                <td id="pass<?php echo $row['id']; ?>"><?php echo $row['password']; ?></td>
                <td id="url<?php echo $row['id']; ?>"><?php echo $row['URL']; ?></td>
              </tr>
            <?php
            }
            ?>

          </table>

        </div>

        <div class="container-login100-form-btn m-t-32">
          <input type=button onClick="location.href='createPassword.php'" class="login100-form-btn" value='New'>
          <br />
          <input type=button onClick="location.href='search.php'" class="login100-form-btn" value='Search'>

        </div>
      </div>
    </div>
  </div>


  <div id="dropDownSelect1"></div>
  <script src="js/main.js"></script>
  <script>
    function editPassword(id) {
      var title = document.getElementById("title" + id).textContent;
      var uname = document.getElementById("uname" + id).textContent;
      var pass = document.getElementById("pass" + id).textContent;
      var url = document.getElementById("url" + id).textContent;
      window.location.href = "edit-password.php?id=" + id + "&title=" + title + "&username=" + uname + "&pass=" + pass + "&url=" + url;
    }
  </script>

</body>

</html>