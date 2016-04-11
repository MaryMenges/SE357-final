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
        <!--Club Registration Form-->
        <h2>Register Club</h2>

        <form action='club_main_page.php?action=create_account' method='POST'>

          <fieldset class="form-group">
            <input type="text" class="form-control" for="clubName" placeholder="Club Name" name="club_name" />
          </fieldset>

          <fieldset class="form-group">
            <input type="text" class="form-control" for="clubUsername" placeholder="Username" name="username" />
          </fieldset>

          <fieldset class="form-group">
            <input type="password" class="form-control" for="clubPassword" placeholder="Password" name="password" />
          </fieldset>

          <fieldset class="form-group">
            <input type="password" class="form-control" for="clubRetypePassword" placeholder="Confirm Password" name="confirm_password" />
          </fieldset>

          <fieldset class="form-group">
            <a href="club_sign_in_view.php" class="btn btn-default">Cancel</a>
            <button type="submit" class="btn btn-primary">Register</button>
          </fieldset>

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
