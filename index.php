<?php
//index.php

?>
<!DOCTYPE html>
<html>

<head>
    <title>Calendar Integration with PHP and Mysql</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="calendar.js"></script>

</head>

<body>
    <br />
    <h2 align="center"><a href="#">Calendar Integration with PHP and Mysql</a></h2>
    <br />
    <div class="container">
        <div id="calendar"></div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="mymodal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Create Event</h4>
                </div>
                <div class="modal-body" style="min-height: 320px;">

                    <div class="form-group">
                        <label for="p-in" class="col-md-4 label-heading">Event Name</label>
                        <div class="col-md-12 ui-front">
                            <input type="text" class="form-control" id="eventname" name="name" value="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="p-in" class="col-md-6 label-heading">Start Time<input type="time" id="startclock"
                                class="time-demo form-control floating-label" placeholder="Time"></label>
                        <label for="p-in" class="col-md-6 label-heading">End Time<input type="time" id="endclock"
                                class="time-demo form-control floating-label" placeholder="Time"></label>
                    </div>

                    <div class="form-group">
                        <div id="days">
                            <label class="col-md-3"><input type="checkbox" id="sat" name="r_event" value="saturday">
                                Saturday</label>
                            <label class="col-md-3"><input type="checkbox" id="sun" name="r_event" value="sunday">
                                Sunday</label>
                            <label class="col-md-3"><input type="checkbox" id="mon" name="r_event" value="monday">
                                Monday</label>
                            <label class="col-md-3"><input type="checkbox" id="tues" name="r_event" value="tuesday">
                                Tuesday</label>
                            <label class="col-md-3"><input type="checkbox" id="wed" name="r_event" value="wednesday">
                                Wednesday</label>
                            <label class="col-md-3"><input type="checkbox" id="thur" name="r_event" value="thursday">
                                Thursday</label>
                            <label class="col-md-6"><input type="checkbox" id="fri" name="r_event" value="friday">
                                Friday</label>
                            <label class="col-md-12">Number of Weeks for recurrence
                                <select id="rectime">
                                    <option>2</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                </select>
                            </label>
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="all_week"> Every week</button>
                    <button type="button" class="btn btn-info" id="other_week">Every other week</button>
                    <button type="button" class="btn btn-default" id="single_event">Single Event</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


    <!--Delete Modal -->
    <div class="modal fade" id="delete_modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Delete Event</h4>
                </div>
                <div class="modal-body" style="min-height: 100px;">
                    Are you sure you want to delete the event(s)?
                </div>
                <input type="hidden" id="event_id" value="">
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" id="all_event">Delete All recurrent event</button>
                    <button type="button" class="btn btn-default" id="one_event">Delete Event</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</body>

</html>