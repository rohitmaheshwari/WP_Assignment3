<!DOCTYPE html>
<html lang="en">

<head>
	<title>Login V16</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="images/icons/favicon.ico" />
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>

<body>

	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					Create New Password
				</span>
				<form class="login100-form validate-form p-b-33 p-t-5" action="php/store_password.php" method="post">

					<div class="wrap-input100 validate-input" data-validate="Enter Title">
						<input class="input100" type="text" name="title" placeholder="Enter title" require>
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter username">
						<input class="input100" type="text" name="username" placeholder="User name" require>
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					<div class="container wrap-input100 validate-input" data-validate="Enter password">
						<!-- <input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span> -->
						<input type="password" class="input100" name="password" id="password" placeholder="Enter the password" require>
						<span class="eyeicon"> <i class="far fa-eye" id="togglePassword"></i> </span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter Repeat Password">
						<input type="password" onkeyup="trigger()" class="input100" name="password" id="retypePassword" placeholder="Repeat password" require>
						<span class="eyeicon"> <i class="far fa-eye" id="toggleRetypePassword"></i> </span>
					</div>
					<br />
					<div id="message-div">
						<span id='message'></span>
					</div>
					<br />
					<center>
						<p>Password Strength</p>
						<div id="myProgress">

							<div id="myBar"></div>
						</div>
					</center>

					<div class=" wrap-input100 validate-input">

					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter URL">
						<input class="input100" type="text" name="url" placeholder="Enter URL" require>
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>


					<div class="container-login100-form-btn m-t-32">
						<input type="submit" name="submit" class="login100-form-btn" value="Register">
					</div>

				</form>
			</div>
		</div>
	</div>


	<div id="dropDownSelect1"></div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script>
		// Toggle eye icon
		const togglePassword = document.querySelector('#togglePassword');
		const password = document.querySelector('#password');

		togglePassword.addEventListener('click', function(e) {
			// toggle the type attribute
			const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
			password.setAttribute('type', type);
			// toggle the eye slash icon
			this.classList.toggle('fa-eye-slash');
		});

		const togglePassword1 = document.querySelector('#toggleRetypePassword');
		const repassword = document.querySelector('#retypePassword');

		togglePassword1.addEventListener('click', function(e) {
			// toggle the type attribute
			const type = repassword.getAttribute('type') === 'password' ? 'text' : 'password';
			repassword.setAttribute('type', type);
			// toggle the eye slash icon
			this.classList.toggle('fa-eye-slash');
		});

		// Password generator
		function generatePassword() {
			var randomstring = Math.random().toString(36).slice(-8);
			document.getElementById("password").value = randomstring;
			document.getElementById("retypePassword").value = randomstring;
			// return retVal;
		}
		generatePassword();
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
				// If the password length is less than or equal to 6
				if (val.length <= 6) no = 1;

				// If the password length is greater than 6 and contain any lowercase alphabet or any number or any special character
				if (val.length > 6 && (val.match(/[a-z]/) || val.match(/\d+/) || val.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/))) no = 2;

				// If the password length is greater than 6 and contain alphabet,number,special character respectively
				if (val.length > 6 && ((val.match(/[a-z]/) && val.match(/\d+/)) || (val.match(/\d+/) && val.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/)) || (val.match(/[a-z]/) && val.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/)))) no = 3;

				// If the password length is greater than 6 and must contain alphabets,numbers and special characters
				if (val.length > 6 && val.match(/[a-z]/) && val.match(/\d+/) && val.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/)) no = 4;

				if (no == 1) {
					move(25);
					// document.getElementById("pass_type").innerHTML = "Very Weak";
				}

				if (no == 2) {
					// document.getElementById("pass_type").innerHTML = "Weak";
					move(50);
				}

				if (no == 3) {
					// document.getElementById("pass_type").innerHTML = "Good";
					move(75);
				}

				if (no == 4) {
					// document.getElementById("pass_type").innerHTML = "Strong";
					move(100);
				}
			}
		}

		$('#password, #retypePassword').on('keyup', function() {
			if ($('#password').val() == $('#retypePassword').val()) {
				$('#message').html('Passwords are matched :)').css('color', 'green');
			} else
				$('#message').html('Passwords not matching :(').css('color', 'red');
			check_pass();

		});

		$('#password').on('change', function() {
			check_pass();
		});
		
	</script>
	<!-- <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script> -->

	<script src="js/main.js"></script>

</body>

</html>