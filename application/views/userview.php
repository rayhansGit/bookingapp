<!DOCTYPE html>
<html>
 <head>
  <title>Classroom Calendar Scheduler</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap-datetimepicker.min.css">
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="<?php echo base_url()?>assets/js/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="<?php echo base_url()?>assets/js/moment.min.js"></script>
 
<script src="<?php echo base_url()?>assets/js/fullcalendar.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/moment-with-locales.min.js"></script>

 
  <script src="<?php echo base_url()?>assets/js/anchrome.js"></script>
  <script src="<?php echo base_url()?>assets/js/bootstrap-datetimepicker.min.js"></script>
  
  <style type="text/css">
    #hidediv{
      display: block;
    }

        iframe {
    display: block;       /* iframes are inline by default */
    background: #fff;
    border: none;         /* Reset default border */
    width: 100%;
    height: 700px;
}
body .fc {

    font-size: 1em;
    background: url("https://stefanik.house.gov/sites/stefanik.house.gov/files/styles/congress_featured_image/public/featured_image/issues/Education-OpportunitySmall.jpg?itok=BgzAqDM6");
    background-color: rgba(0, 0, 0, 0);
    color: black;
    padding-bottom: 125px;
    background-color: rgba(255,255,255,0.6);
    background-blend-mode: lighten;
    background-position: cover;
    background-repeat: no-repeat;

}
.modal-footer {
    padding: 15px;
    text-align: center;
    border-top: 1px solid #e5e5e5;
    position: relative;
    overflow: hidden;
}
.classb
{
  min-height:400px ;
  border:1px solid black;
}
ul{
  list-style: none;
  margin-bottom: 70px
}
ul button
{
	margin-right: 10px;

}
li{
  display: inline-block;
  
}
.modal-backdrop {
    position: fixed;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    z-index: 1040;
    background-color: #0009;
}
.myCalendar {
    cursor: pointer;
}
.fc-event{
    cursor: pointer;
}
textarea {
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    outline: none;
    width: 450px;
    height: 170px
}
  </style>
  <script>
   
  function reply_click(clicked_id) {
    document.getElementById("title").innerHTML=""+clicked_id+"";
    
    $.ajax({
       url:"<?php echo base_url();?>ClassroomCalendar/set",
       type:"POST",
       data:{"room_id":clicked_id},
       success:function()
       {
        $('#calendar').fullCalendar('refetchEvents');
        $('#calendar1').fullCalendar('refetchEvents');
        $('#calendar2').fullCalendar('refetchEvents');
        $('#calendar3').fullCalendar('refetchEvents');
        
       }
       
      })


   var calendar = $('#calendar').fullCalendar({
    editable:false,
    height:600,
    firstDay:1,
    header:{
     left:'prev,next today',
     center:'title',
     right: 'year,month'
    },
    events: '<?php echo base_url();?>ClassroomCalendar/load',
    selectable:false,
    selectOverlap:false,
    selectHelper:false,
    timeFormat: 'HH:mm',
    showNonCurrentDates: false,
   


        eventClick:function(event)
    {
      
    var startyear = $.fullCalendar.formatDate(event.start, "DD-MM-Y");
    var endyear = $.fullCalendar.formatDate(event.end, "DD-MM-Y");
    var starttime=$.fullCalendar.formatDate(event.start, "HH:mm");
    var endtime=$.fullCalendar.formatDate(event.end, "HH:mm");
    start=startyear+' at '+starttime;
    end=endyear+' at '+endtime;
    
    var id= event.id;
     var title = event.title; 
    $('#myviewModal').modal();
     $('#edeventnameview').text(title);
      $('#edstartclockview').text(start);
      $('#edendclockview').text(end);

      $.ajax({
      url:"<?php echo base_url()?>ClassroomCalendar/finddescription",
      type:"POST",
      data:{id:id},
      success: function(data) {
        var a=JSON.parse(data);
        
        $('#eddescriptionview').text(a);
              
      //$('#eddescriptionview').text(a.description);
        }
     });
      

        
/*
     if(confirm("Are you sure you want to remove it?"))
     {
      var id = event.id;
      $.ajax({
       url:"delete.php",
       type:"POST",
       data:{id:id},
       success:function()
       {
        calendar.fullCalendar('refetchEvents');
        alert("Event Removed");
       }
      })
     }
     */
    },








   });

      var calendar1 = $('#calendar1').fullCalendar({
    editable:false,
    height:600,
    firstDay:1,
    header:{
     left:'prev,next today',
     center:'title',
     right: 'year,month'
    },
    events: '<?php echo base_url();?>ClassroomCalendar/load',
    selectable:false,
    selectOverlap:false,
    selectHelper:false,
    timeFormat: 'HH:mm',
    showNonCurrentDates: false,
    defaultDate: moment().add(1, "months"),

   


        eventClick:function(event)
    {
      var startyear = $.fullCalendar.formatDate(event.start, "DD-MM-Y");
    var endyear = $.fullCalendar.formatDate(event.end, "DD-MM-Y");
    var starttime=$.fullCalendar.formatDate(event.start, "HH:mm");
    var endtime=$.fullCalendar.formatDate(event.end, "HH:mm");
    start=startyear+' at '+starttime;
    end=endyear+' at '+endtime;
    var id= event.id;
     var title = event.title; 
    $('#myviewModal').modal();
     $('#edeventnameview').text(title);
      $('#edstartclockview').text(start);
      $('#edendclockview').text(end);

      $.ajax({
      url:"<?php echo base_url()?>ClassroomCalendar/finddescription",
      type:"POST",
      data:{id:id},
      success: function(data) {
        var a=JSON.parse(data);
        $('#eddescriptionview').html(anchorme(a));
              
      //$('#eddescriptionview').text(a.description);
        }
     });
      

        
/*
     if(confirm("Are you sure you want to remove it?"))
     {
      var id = event.id;
      $.ajax({
       url:"delete.php",
       type:"POST",
       data:{id:id},
       success:function()
       {
        calendar.fullCalendar('refetchEvents');
        alert("Event Removed");
       }
      })
     }
     */
    },








   });

            var calendar2 = $('#calendar2').fullCalendar({
    editable:false,
    height:600,
    firstDay:1,
    header:{
     left:'prev,next today',
     center:'title',
     right: 'year,month'
    },
    events: '<?php echo base_url();?>ClassroomCalendar/load',
    selectable:false,
    selectOverlap:false,
    selectHelper:false,
    timeFormat: 'HH:mm',
    showNonCurrentDates: false,
    defaultDate: moment().add(2, "months"),

   


        eventClick:function(event)
    {
      

     var startyear = $.fullCalendar.formatDate(event.start, "DD-MM-Y");
    var endyear = $.fullCalendar.formatDate(event.end, "DD-MM-Y");
    var starttime=$.fullCalendar.formatDate(event.start, "HH:mm");
    var endtime=$.fullCalendar.formatDate(event.end, "HH:mm");
    start=startyear+' at '+starttime;
    end=endyear+' at '+endtime;
    var id= event.id;
     var title = event.title; 
    $('#myviewModal').modal();
     $('#edeventnameview').text(title);
      $('#edstartclockview').text(start);
      $('#edendclockview').text(end);

      $.ajax({
      url:"<?php echo base_url()?>ClassroomCalendar/finddescription",
      type:"POST",
      data:{id:id},
      success: function(data) {
        var a=JSON.parse(data);
        $('#eddescriptionview').html(anchorme(a));
              
      //$('#eddescriptionview').text(a.description);
        }
     });
      

        
/*
     if(confirm("Are you sure you want to remove it?"))
     {
      var id = event.id;
      $.ajax({
       url:"delete.php",
       type:"POST",
       data:{id:id},
       success:function()
       {
        calendar.fullCalendar('refetchEvents');
        alert("Event Removed");
       }
      })
     }
     */
    },


});

     var calendar3 = $('#calendar3').fullCalendar({
    editable:false,
    height:600,
    firstDay:1,
    header:{
     left:'prev,next today',
     center:'title',
     right: 'year,month'
    },
    events: '<?php echo base_url();?>ClassroomCalendar/load',
    selectable:false,
    selectOverlap:false,
    selectHelper:false,
    timeFormat: 'HH:mm',
    showNonCurrentDates: false,
    defaultDate: moment().add(3, "months"),

   


        eventClick:function(event)
    {
      

    var startyear = $.fullCalendar.formatDate(event.start, "DD-MM-Y");
    var endyear = $.fullCalendar.formatDate(event.end, "DD-MM-Y");
    var starttime=$.fullCalendar.formatDate(event.start, "HH:mm");
    var endtime=$.fullCalendar.formatDate(event.end, "HH:mm");
    start=startyear+' at '+starttime;
    end=endyear+' at '+endtime;
    var id= event.id;
     var title = event.title; 
    $('#myviewModal').modal();
     $('#edeventnameview').text(title);
      $('#edstartclockview').text(start);
      $('#edendclockview').text(end);

      $.ajax({
      url:"<?php echo base_url()?>ClassroomCalendar/finddescription",
      type:"POST",
      data:{id:id},
      success: function(data) {
        var a=JSON.parse(data);
        $('#eddescriptionview').html(anchorme(a));
              
      //$('#eddescriptionview').text(a.description);
        }
     });
      

        
/*
     if(confirm("Are you sure you want to remove it?"))
     {
      var id = event.id;
      $.ajax({
       url:"delete.php",
       type:"POST",
       data:{id:id},
       success:function()
       {
        calendar.fullCalendar('refetchEvents');
        alert("Event Removed");
       }
      })
     }
     */
    },








   });


  };
   
  </script>


 </head>
 <body class="text-center">
<?php 






// $date = date('Y-m-d', strtotime('next thursday'));
// $date = strtotime($date);
// echo date('Y-m-d', $date);
// $date = strtotime("+7 day", $date);
// echo date('Y-m-d', $date);
// $date = strtotime("+7 day", $date);
// echo date('Y-m-d', $date);
// $date = strtotime("+7 day", $date);
// echo date('Y-m-d', $date);
// $date = strtotime("+7 day", $date);
// echo date('Y-m-d', $date);



?>

<a href="<?php echo base_url();?>pages/login">LOGIN</a>

  <h1 class="text-center col-md-12" id="title"></h1>
  <br>
  <br>
  <div class="container">
    <div class="col-md-12 text-center">
      <ul>
        <?php
      foreach ($cal as $key) {
      

      echo "<button class='btn btn-success' id='".$key["numbers"]."' onclick='reply_click(this.id)'>".$key['numbers']."</button>";
      }
      ?>
        <!-- <li><button class="btn btn-success" id="101" onclick="reply_click(this.id)">ROOM 101</button></li>
         <li><button class="btn btn-success" id="102" onclick="reply_click(this.id)">ROOM 102</button></li>
         <li><button class="btn btn-success" id="103" onclick="reply_click(this.id)">ROOM 103</button></li>
         <li><button class="btn btn-success" id="104" onclick="reply_click(this.id)">ROOM 104</button></li>
         <li><button class="btn btn-success" id="105" onclick="reply_click(this.id)">ROOM 105</button></li> -->
      </ul>
    </div>

   <div id="calendar" class="col-md-12"></div>
   <div id="calendar1" class="col-md-12"></div>
   <div id="calendar2" class="col-md-12"></div>
   <div id="calendar3" class="col-md-12"></div>
  </div>

  <!-- ****************view event -->
    <div class="modal" id="myviewModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">View Event</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
                      

            

                    
                    <div class="table-responsive">
                    <table class="table" style="width: auto;">
                      
                      <tbody>
                        <tr>
                          <td>Event Name</td>
                          <td><p id="edeventnameview" name="name" value=""></p></td>
                          
                        </tr>
                        <tr>
                          <td>Description</td>
                          <td>
                            <textarea id="eddescriptionview" name="description" value="" readonly></textarea></td>
                            
                          
                        </tr>
                        <tr>
                          <td>Start Time</td>
                          <td><p id="edstartclockview" name="start_dateview"></p></td>
                          
                        </tr>

                        <tr>
                          <td>End Time</td>
                          <td><p id="edendclockview" name="end_dateview"></p></td>
                          
                        </tr>
                      </tbody>
                    </table>
                    </div>
                      <!-- <label for="p-in" class="col-md-2 label-heading">Event Name</label>

                        <h4 id="edeventnameview" class="col-md-10" name="name" value=""></h4> -->

                  
                       <!-- <label for="p-in" class="col-md-2 label-heading">Description</label>

                       <h4 id="eddescriptionview" name="description" value="" class="col-md-10" style="border: 1px solid grey;padding: 10px;border-radius: 5px"></h4>

                    
                      <label for="p-in" class="col-md-2 label-heading">Start Time</label>

                        <p id="edstartclockview" name="start_dateview" class="col-md-10"></p> -->

                   <!--    <label for="p-in" class="col-md-2 label-heading">End Time</label>

                      <p id="edendclockview" name="end_dateview" class="col-md-10"></p>
 -->
                    

            
            
            
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

        </div>
        
      </div>
    </div>
  </div>
  <!-- ****************view event -->
 </body>


</html>
