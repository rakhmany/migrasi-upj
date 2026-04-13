<!DOCTYPE html>

<html lang="en" class="app">

<head>

  {include file='scale/header_meta.tpl'}

</head>

<body class="">

  <section id="content" class="m-t-lg wrapper-md animated fadeInUp">    

    <div class="container aside-xl">

      <a class="navbar-brand block" href="{$baseurl_admin}">FaberCMS</a>

      <section class="m-b-lg">

        <header class="wrapper text-center">

          <strong>Sign in to get in touch</strong>

        </header>

        <form action="{$baseurl_admin}login.php" method="post">

		  {php}

			if ($_SESSION['login_fail'] == '1') {

				echo '<div class="alert alert-danger">

                  <button type="button" class="close" data-dismiss="alert">×</button>

                  <i class="fa fa-ban-circle"></i><!-- <strong>Warning!</strong> --> Login Failed.... </div>';

				// echo "<font class=red style='font-size:14px;'><b>Login Failed...</b></font><br><br>";

				$_SESSION['login_fail'] = '0';

			}

			if ($_SESSION['tmp_msg'] != '') {

				echo '<div class="alert alert-danger">

                  <button type="button" class="close" data-dismiss="alert">×</button>

                  <i class="fa fa-ban-circle"></i><!-- <strong>Warning!</strong> --> '.$_SESSION['tmp_msg'].' </div>';

				// echo "<font class=red style='font-size:14px;'><b>".$_SESSION['tmp_msg']."</b></font><br><br>";

				$_SESSION['tmp_msg'] = '';

			}

		  {/php}

          <div class="list-group">

            <div class="list-group-item">

              <label class="sr-only" for="username">Username</label>

			  <div class="input-group m-b">

			    <span class="input-group-addon"><i class="fa fa-user"></i></span>

				<input type="text" class="form-control" placeholder="Username" name="username" id="username" 
				       pattern="[A-Za-z0-9._-]+" 
				       title="Username hanya boleh mengandung huruf, angka, titik, underscore, dan dash"
				       value="{php}echo isset($_POST['username']) ? htmlspecialchars($_POST['username'], ENT_QUOTES, 'UTF-8') : '';{/php}"
				       oninput="validateUsername(this)">

			  </div>

            </div>

            <div class="list-group-item">

			  <label class="sr-only" for="passwd">Password</label>

			  <div class="input-group m-b">

			    <span class="input-group-addon"><i class="fa fa-lock"></i></span>

				<input type="password" class="form-control" placeholder="Password" name="passwd" id="passwd">

			  </div>

            </div>

			<div class="list-group-item">

			  <label class="sr-only" for="security_code">Security Code</label>

			  <div class="input-group m-b">

			    <span class="input-group-addon" style="padding:0;"><img src="CaptchaSecurityImages.php?width=100&height=40&characters=5" /></span>

				<input type="text" placeholder="Security Code" class="form-control input-lg m-b" maxlength="7" size="8" name="security_code" id="security_code">

			  </div>

			</div>

          </div>

          <button type="submit" class="btn btn-lg btn-primary btn-block" id="submitBtn">Sign in</button>

          <script>
          function filterUsername(value) {
            // Hanya izinkan huruf, angka, titik, underscore, dan dash
            return value.replace(/[^A-Za-z0-9._-]/g, '');
          }
          
          function validateUsername(input) {
            var cleanValue = filterUsername(input.value);
            if (input.value !== cleanValue) {
              input.value = cleanValue;
            }
            
            var submitBtn = document.getElementById('submitBtn');
            if (cleanValue.length > 0) {
              input.style.borderColor = '';
              input.style.backgroundColor = '';
              input.setCustomValidity('');
              submitBtn.disabled = false;
              submitBtn.style.backgroundColor = '';
            } else {
              input.style.borderColor = '';
              input.style.backgroundColor = '';
              input.setCustomValidity('');
              submitBtn.disabled = false;
              submitBtn.style.backgroundColor = '';
            }
          }
          
          // Block dangerous characters on keypress
          document.getElementById('username').addEventListener('keypress', function(e) {
            var char = String.fromCharCode(e.which);
            if (!/[A-Za-z0-9._-]/.test(char)) {
              e.preventDefault();
              return false;
            }
          });
          
          // Block dangerous characters on input
          document.getElementById('username').addEventListener('input', function(e) {
            validateUsername(e.target);
          });
          
          // Filter paste content
          document.getElementById('username').addEventListener('paste', function(e) {
            e.preventDefault();
            var paste = (e.clipboardData || window.clipboardData).getData('text');
            var cleanPaste = filterUsername(paste);
            
            var start = e.target.selectionStart;
            var end = e.target.selectionEnd;
            var currentValue = e.target.value;
            
            e.target.value = currentValue.substring(0, start) + cleanPaste + currentValue.substring(end);
            e.target.setSelectionRange(start + cleanPaste.length, start + cleanPaste.length);
            
            validateUsername(e.target);
          });
          
          // Block drag and drop
          document.getElementById('username').addEventListener('drop', function(e) {
            e.preventDefault();
          });
          
          document.getElementById('username').addEventListener('dragover', function(e) {
            e.preventDefault();
          });
          </script>

          <div class="text-center m-t m-b"><a href="{$baseurl_admin}forgetpass.php"><small>Forgot password?</small></a></div>

          <!-- <div class="line line-dashed"></div>

          <p class="text-muted text-center"><small>Do not have an account?</small></p>

          <a href="signup.html" class="btn btn-lg btn-default btn-block">Create an account</a> -->

        </form>

      </section>

    </div>

  </section>

  <!-- footer -->

  <footer id="footer">

    <div class="text-center padder">

      <p>

        <small>Copyright {$smarty.now|date_format:"%Y"} - All rights reserved by faberhost.com</small>

      </p>

    </div>

  </footer>

  <!-- / footer -->

  {include file='scale/footer.tpl'}

</body>

</html>