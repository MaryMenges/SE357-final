<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" />

    <!-- css includes -->
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.css" rel="stylesheet" />

    <link href="styles.css" rel="stylesheet">

    <title>Attendance</title>
  </head>
  <body>

    <div class="container">
      <div class="row" style="padding-top:20px;">

        <!-- Club Title -->
        <div class="col-md-8" style="font-size:32px;">
          <?php echo $data[club_name]; ?>
        </div>



        <!-- Sign out change path when php-->
        <div class="col-md-4" class="form-group">
          <a href="club_sign_in.php?action=sign_out" type="button" class="btn btn-primary pull-right" style="margin-left:10px">Sign Out</a>
          <button type="button" class="btn btn-default pull-right" data-toggle="modal" data-target="#new-event-modal">New Event</button>
          <button type="button" class="btn  pull-right" style="margin-right:10px; border-color:gray" data-toggle="modal" data-target="#new-student-modal"><span class="glyphicon glyphicon-user"></span></button><br />

        </div>
      </div>

        <div class="row">
          <!-- Events dropdown -->
          <div class="col-md-8">

          </div>

        <div class="col-md-4">

          <form action="member_sign_in.php?action=start_event_sign_in" method="POST">

          <div class="input-group" style="margin-bottom:25px;">
            <select class="form-control" for="eventType" name="event_id" style="">
              <option hidden>Select Event to Begin Sign In</option>
<?php
foreach($event as $e) {
print<<<print_one
<option value="$e[event_id]">$e[event_name]</option>
print_one;
}
?>
            </select>
            <span class="input-group-btn">
              <button class="btn btn-default" type="submit" >Go!</button>
            </span>
          </div>
        </form>
        </div>

        <div class="row">
          <div class="col-md-12">

            <table class="table table-striped table-hover table-responsive table-small">
              <thead>
                <tr>
                  <th>Student ID</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th># Attended</th>
<!-- Printing event titles-->
<?php
foreach($event as $e) {
print<<<print_one
<th>$e[event_name]</th>
print_one;
}
?>
                </tr>
              </thead>
              <tbody>
            <!-- Printing members of club -->
<?php
foreach($member as $m) {
print <<<print_one
<tr>
<td>$m[student_id]</td>
<td>$m[first_name]</td>
<td>$m[last_name]</td>
<td>0</td>
print_one;


foreach($event as $e) {
if (in_array($e[event_id], $attendance[$m[member_id]])) {
print <<<print_two
<td align="left"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></td>
print_two;
} else {
print <<<print_three
<td></td>
print_three;
}
}


print <<<print_four
</tr>
print_four;
}
?>
            </tbody>
            </table>

            </div>

          </div>
        </div>


        <div class="modal fade" id="new-event-modal" role="dialog">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                New Event
              </div>

              <!-- New event form -->
              <div class="modal-body">
                <form action="club_main_page.php?action=new_event" method="POST" onsubmit="return validateEvent(this)">

                  <fieldset class="form-group">
                    <input type="text" class="form-control" for="eventName" placeholder="Name" name="event_name" />
                  </fieldset>

                  <fieldset class="form-group">
                    <select class="form-control" for="eventType" name="event_type">
                      <option value="" hidden>Type</option>
                      <option value="general_meeting">General Meeting</option>
                      <option value="officer_meeting">Officer Meeting</option>
                      <option value="special_event">Special Event</option>
                    </select>
                  </fieldset>

                  <fieldset class="form-group">
                    <div class="input-group date" date-provide="datepicker">
                      <input type="text" class="form-control" placeholder="Date" name="date" id="picker" readonly/>
                      <div class="input-group-addon">
                        <span class="glyphicon glyphicon-th pull-left"></span>
                      </div>
                    </div>
                  </fieldset>

                  <fieldset class="form-group">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Create</button><!--removed data-dismiss="modal"-->
                  </fieldset>

                </form>
              </div>
            </div>
          </div>
        </div>



        <!-- New student modal -->
        <div class="modal fade" id="new-student-modal" role="dialog">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                New Member
              </div>

              <!-- New member form -->
              <div class="modal-body">

                <form action="club_main_page.php?action=new_member" method="POST" onsubmit="return validateMember(this)">

                  <fieldset class="form-group">
                    <input type="text" class="form-control" for="studentID" placeholder="Student ID" name="student_id" />
                  </fieldset>

                  <fieldset class="form-group">
                    <input type="text" class="form-control" for="memberFName" placeholder="First Name" name="first_name" />
                  </fieldset>

                  <fieldset class="form-group">
                    <input type="text" class="form-control" for="memberLName" placeholder="Last Name" name="last_name" />
                  </fieldset>

                  <fieldset class="form-group">
                    <input type="text" class="form-control" for="memberEmail" placeholder="Email" name="email" />
                  </fieldset>

                  <fieldset class="form-group">
                    <input type="text" class="form-control" for="memberPhone" placeholder="Phone" name="phone" />
                  </fieldset>

                  <fieldset class="form-group">
                    <input type="text" class="form-control" for="memberMajor" placeholder="Major" name="major"/>
                  </fieldset>

                  <fieldset class="form-group">
                    <div class="input-group date" date-provide="datepicker">
                      <input type="text" class="form-control" placeholder="Graduation Year" name="grad_year" id="year" readonly/>
                      <div class="input-group-addon">
                        <span class="glyphicon glyphicon-th pull-left"></span>
                      </div>
                    </div>
                  </fieldset>

                  <fieldset class="form-group">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button><!--removed data-dismiss="modal"-->
                  </fieldset>

                </form>

              </div>
            </div>
          </div>
        </div>





    <!-- jQuery necesssary for bootstrap.js-->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.js"></script>

    <script>
      $('#new-student-modal').on('hidden.bs.modal', function(){
        window.location.reload(true);
      });
      $('#new-event-modal').on('hidden.bs.modal', function(){
        window.location.reload(true);
      });
    </script>
    <script>
      $(document).ready(function() {
        $('#picker').datepicker({
          format: "mm-dd-yyyy",
          autoclose: true,
          ignoreReadonly: true
        });
        $('#year').datepicker({
          format: "yyyy",
          viewMode: "years",
          minViewMode: "years",
          autoclose: true,
          ignoreReadonly: true
        });
      });
    </script>

    <script type="text/javascript" src="validations.js"></script>

  </body>
</html>
