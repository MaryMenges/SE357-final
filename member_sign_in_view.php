<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" />

    <!-- css includes -->
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.css" rel="stylesheet" />
  </head>
  <body>

      <div class="col-md-4">

      </div>

          <div class="col-md-4" style="text-align:center">
            <!--Club Sign-In Form-->
            <h2>Member Sign In</h2>
            <h3><?php echo $data[event_name]?></h3>

            <form action="member_sign_in.php?action=sign_in" method="POST">

              <div class="alert alert-info" role="alert"><?php echo $error_message ?></div>

              <fieldset class="form-group">
                <input type="text" class="form-control" for="" placeholder="Student ID" />
              </fieldset>

              <fieldset class="form-group">
                <button type="submit" class="btn btn-primary">Sign In</button>
                <button type="" class="btn btn-secondary">Go Back</button>
              </fieldset>

            </form>

          </div>

          <div class="col-md-4">

          </div>

        </div>




        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  </body>
</html>
