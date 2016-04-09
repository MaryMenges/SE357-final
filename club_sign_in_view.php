<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" />

    <!-- css includes -->
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link href="custom.css" rel="stylesheet"> -->

    <title>Attendance</title>
  </head>
  <body>

    <div class="container">
      <div class="col-md-4">

      </div>

      <div class="col-md-4" style="text-align:center">
        <!--Club Sign-In Form-->
        <h2>MU Club Attendance</h2>
        <form action="club_main_page.php?action=validate" method="post">

          <div class="alert alert-info" role="alert"><?php echo $error_message ?></div>

          <fieldset class="form-group">
            <input type="text" class="form-control" for="clubUsername" placeholder="Username" name="username" />
          </fieldset>

          <fieldset class="form-group">
            <input type="password" class="form-control" for="clubPassword" placeholder="Password" name="password" />
          </fieldset>

          <fieldset class="form-group">
            <button type="submit" class="btn btn-primary">Sign In</button>
          </fieldset>

          <small class="text-muted">New club? <a href="club_register.php">Register here</a></small>

        </form>

      </div>

      <div class="col-md-4">

      </div>

    </div>

    <!-- jQuery necesssary for bootstrap.js-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  </body>

</html>
