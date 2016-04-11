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
      <div class="row" style="padding-top:20px;">

        <!-- Club Title -->
        <div class="col-md-8" style="font-size:20px;">
          <?php echo $data[club_name]; ?>
        </div>

        <!-- Sign out change path when php-->
        <div class="col-md-4" class="form-group">
          <a href="club_sign_in.php" type="button" class="btn btn-primary btn-sm pull-right" style="margin-left:10px" action="club_sign_in.php?action=sign_out">Sign Out</a>
          <a href="new_event_view.html" class="btn btn-default btn-sm pull-right">New Event</a>


        </div>

        <!-- Member Table -->
        <table class="table table-striped table-hover table-responsive table-small">
          <thead>
            <tr>
              <th>Member ID</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th># Attended</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">s0912276</th>
              <td>Taylor</td>
              <td>Klodowski</td>
              <td>1</td>
            </tr>
            <tr>
              <th scope="row">s0934456</th>
              <td>Mary</td>
              <td>Menges</td>
              <td>2</td>
            </tr>
          </tbody>
        </table>


        <!-- new student modal -->
        <button type="button" class="btn btn-sm" data-toggle="modal" data-target="#new-student-modal"><span class="glyphicon glyphicon-user"></span></button>


        <div class="modal fade" id="new-student-modal" role="dialog">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                New Member
              </div>

              <!-- New member form -->
              <div class="modal-body">
                Test
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>




    <!-- jQuery necesssary for bootstrap.js-->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script>
      $('#new-student-modal').on('hidden.bs.modal', function(){

        window.location.reload(true);
      })
    </script>
  </body>

</html>
