<!DOCTYPE html>
<html lang="en">

<head>
  <title>Edit Data</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
  
  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
  
  <link rel="stylesheet" type="text/css" href="css/util.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <link rel="stylesheet" type="text/css" href="css/Form.css">
</head>

<body>

  <div class="limiter">
    <div class="container-login  " style="background-image: url('images/bg-01.jpg');">
      <div class=" p-t-30 p-b-50">
        <span class="SystemHeadings p-b-41">
          Password Management System
        </span>
        <div class="displayBox  p-b-33 p-t-5">
          <div class="container">
            <form action="php/edit_data.php" method="post">
              <div class="row">
                <div class="col-25">
                  <label for="fname">ID</label>
                </div>
                <div class="col-75">
                  <input type="text" id="id" name="id" value="<?php echo $_GET["id"] ?>" readonly>
                </div>
              </div>
              <div class="row">
                <div class="col-25">
                  <label for="fname">Title</label>
                </div>
                <div class="col-75">
                  <input type="text" id="title" name="title" value="<?php echo $_GET["title"] ?>">
                </div>
              </div>
              <div class="row">
                <div class="col-25">
                  <label for="lname">Username</label>
                </div>
                <div class="col-75">
                  <input type="text" id="uname" name="username" value="<?php echo $_GET["username"] ?>">
                </div>
              </div>

              <div class="row">
                <div class="col-25">
                  <label for="lname">Password</label>
                </div>
                <div class="col-75">
                  <input type="password" id="password" name="password" value="<?php echo $_GET["pass"] ?>">
                  <p>Password Strength</p>
                  <div id="myProgress">

                    <div id="myBar"></div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-25">
                  <label for="lname">Repeat Password</label>
                </div>
                <div class="col-75">
                  <input type="password" id="repeatPass" name="repeatPass" value="<?php echo $_GET["pass"] ?>">
                  <div id="message-div-2">
                    <span id='message'></span>
                  </div>
                </div>
              </div>
              <div class="row">
                <br />

                <br />
              </div>
              <div class="row">
                <div class="col-25">
                  <label for="lname">URL</label>
                </div>
                <div class="col-75">
                  <input type="text" id="url" name="url" value="<?php echo $_GET["url"] ?>">
                </div>
              </div>
          </div>
        </div>

        <div class="container-login100-form-btn m-t-32">
          <input type="submit" name="submit" class="login100-form-btn" value='Save'>

        </div>

        </form>
      </div>
    </div>
  </div>


  <div id="dropDownSelect1"></div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="js/main.js"></script>
  <script>
    $('#password, #repeatPass').on('keyup', function() {
      if ($('#password').val() == $('#repeatPass').val()) {
        $('#message').html('Passwords are matched :)').css('color', 'green');
      } else
        $('#message').html('Passwords not matching :(').css('color', 'red');
      check_pass();

    });
    $('#password').on('change', function() {
      check_pass();
    });

    check_pass();



    function move(val) {
      var i = 0;
      if (i == 0) {
        i = 1;
        var elem = document.getElementById("myBar");
        var width = 1;
        var id = setInterval(frame, 10);

        function frame() {
          if (width >= val) {
            clearInterval(id);
            i = 0;
          } else {
            width++;
            elem.style.width = width + "%";
          }
        }
      }
      i = 0;
    }

    function check_pass() {
      var val = document.getElementById("password").value;
      var no = 0;
      if (val != "") {
        if (val.length <= 6) no = 1;

        if (val.length > 6 && (val.match(/[a-z]/) || val.match(/\d+/) || val.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/))) no = 2;

        if (val.length > 6 && ((val.match(/[a-z]/) && val.match(/\d+/)) || (val.match(/\d+/) && val.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/)) || (val.match(/[a-z]/) && val.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/)))) no = 3;

        if (val.length > 6 && val.match(/[a-z]/) && val.match(/\d+/) && val.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/)) no = 4;

        if (no == 1) {
          move(25);
        }

        if (no == 2) {
          move(50);
        }

        if (no == 3) {
          move(75);
        }

        if (no == 4) {
          move(100);
        }
      }
    }
  </script>

</body>

</html>