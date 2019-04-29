<!DOCTYPE html>
<html>
 <head>
  <title>Kragerø VGS - Aktivitetskalender</title>
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
    
    background-color: rgba(255,255,255,0.6);
    background-blend-mode: lighten;
    width: 1300px

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
  </style>
  <script>
   
  function reply_click(clicked_id) {

    document.getElementById("title").innerHTML=clicked_id+"";
    
    $.ajax({
       url:"<?php echo base_url();?>ClassroomCalendar/set",
       type:"POST",
       data:{"room_id":clicked_id},
       success:function()
       {
        $('#calendar').fullCalendar('refetchEvents');
        
       }
       
      })
    $('.datetime').datetimepicker({

            format: 'H:m'

        });
  $('.prev i').removeClass();
  $('.prev i').addClass("fa fa-chevron-left");

  $('.next i').removeClass();
  $('.next i').addClass("fa fa-chevron-right");


   var calendar = $('#calendar').fullCalendar({
    editable:false,
    height:500,
    firstDay:1,
    header:{
     left:'prev,next today',
     center:'title',
     right: 'year,month'
    },
    events: '<?php echo base_url();?>ClassroomCalendar/load',
    selectable:true,
    // selectOverlap:false,
    selectHelper:true,
    timeFormat: 'HH:mm',
    showNonCurrentDates: false,
    
   

    select: function(start, end, allDay)
    {

      if(start.isBefore(moment())) {
        $('#calendar').fullCalendar('unselect');
        return false;
    }
      
     
      var start = $.fullCalendar.formatDate(start, "Y-MM-DD ");
      var end = $.fullCalendar.formatDate(end.subtract(1, 'days'), "Y-MM-DD");
      $('#myModal').modal('show');
      $('#myModal').on('hidden.bs.modal', function () {
         location.reload();
        });

      $("#submit").click(function() {
        if ((document.getElementById("startclock").value!='') && (document.getElementById("endclock").value!='') && (title!='')) 
        {
          var startime= start+" "+document.getElementById("startclock").value;
        var endtime= end+" "+document.getElementById("endclock").value;
        var title = document.getElementById("eventname").value;
        var description=document.getElementById("description").value;
         if(title)
     {
     
      $.ajax({
       url:"<?php echo base_url();?>ClassroomCalendar/insert",
       type:"POST",
       data:{title:title, start:startime, end:endtime, description:description},
       success:function()
       {
        calendar.fullCalendar('refetchEvents');
        window.location.reload();
       }
      });
     }//
        }
        else
        {
          alert("Please fill all the boxes");
        }

        
   })

      // var title=prompt("Enter Event Title");
      // $.ajax({
      //  url:"<?php echo base_url();?>ClassroomCalendar/insert",
      //  type:"POST",
      //  data:{"start":JSON.stringify(start), "end":JSON.stringify(end), "title": JSON.stringify(title)},
      //  success:function()
      //  {
      //   calendar.fullCalendar('refetchEvents');
      //   alert("Added Successfully");
      //  }
      // })
     
    },







   
        eventClick:function(event)
    {
      

    var startdate = $.fullCalendar.formatDate(event.start, "Y-MM-DD ");
    var enddate = $.fullCalendar.formatDate(event.end, "Y-MM-DD ");
    var starttime = $.fullCalendar.formatDate(event.start, "HH:mm:ss");
    var endtime = $.fullCalendar.formatDate(event.end, "HH:mm:ss");
    
    var id= event.id;
     var title = event.title; 
    $('#myeditModal').modal();
     $('#edeventname').val(title);
      $('#edstartclock').val(starttime);
      $('#edendclock').val(endtime);

      $.ajax({
      url:"<?php echo base_url()?>ClassroomCalendar/finddescription",
      type:"POST",
      data:{id:id},
      success: function(data) {
        var a=JSON.parse(data);
        var ret = a.replace('<br />','');
        
        
      $('#eddescription').text(ret);

        }
     });
      

        $('#delete').click(function()
        {
          var id = event.id;
          $.ajax({
           url:'<?php echo base_url();?>ClassroomCalendar/delete',
           type:"POST",
           data:{"id":JSON.stringify(id)},
           success:function(data)
           {
            calendar.fullCalendar('refetchEvents');
            window.location.reload();
            //alert("Event Removed");
           }
          })

        });

        $('#updatesubmit').click(function()
        {
          var id= event.id;
          var start=startdate+document.getElementById("edstartclock").value;
          var end=enddate+document.getElementById("edendclock").value;
          var description= $('#eddescription').val();
          var title = $('#edeventname').val();
          
          $.ajax({
           url:'<?php echo base_url();?>ClassroomCalendar/update',
           type:"POST",
           data:{id:id,start:start,end:end,description:description,title:title},
           success:function(data)
           {
            calendar.fullCalendar('refetchEvents');
            window.location.reload();
            //alert("Event Removed");
           }
          })

        })
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
    <!-- <form style="margin-bottom: 5px" class="col-md-6" method="POST" action="<?php echo base_url();?>ClassroomCalendar/new">
      <p>Legg til klassse</p>
      <input type="text" name="calendar" placeholder="Klassens navn" required="required">
      <input type="submit" name="submit" value="Legg til">
    </form>
    <form style="margin-bottom: 5px" class="col-md-6" method="POST" action="<?php echo base_url();?>ClassroomCalendar/deletecal">
      <p>Slett klasse</p>
      <input type="text" name="calendar" placeholder="Klassens navn" required="required">
      <input type="submit" name="submit" value="Slett klassen">
    </form> -->

   <div id="calendar" class="col-md-12"></div>
   <a class="btn btn-danger" href="<?php echo base_url();?>pages/logout">Logout</a>
  </div>
   <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Lag ny aktivitet</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
                      

            <div class="form-group">

                    <label for="p-in" class="col-md-4 label-heading">Aktivitetens navn</label>

                    <div class="col-md-12 ui-front">

                        <input type="text" class="form-control" id="eventname" name="name" value="">

                    </div>

            </div>

            <div class="form-group">

                    <label for="p-in" class="col-md-4 label-heading">Beskrivelse / tillegsinformasjon</label>

                    <div class="col-md-12 ui-front">

                       <textarea class="form-control" id="description" style="min-height: 150px" name="description" ></textarea>

                    </div>

            </div>
            

            <div class="form-group">

                    <label for="p-in" class="col-md-4 label-heading">Klokkeslett start</label>

                    <div class="col-md-12">

                        <input type="text" id="startclock" class="form-control datetime" name="start_date" >

                    </div>

            </div>

            <div class="form-group">

                    <label for="p-in" class="col-md-4 label-heading">Klokkeslett slutt</label>

                    <div class="col-md-12">

                      <input type="text" id="endclock" class="form-control datetime" name="end_date">

                    </div>

            </div>

            
            
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Lukk</button>
          <button type="submit" id="submit" class="btn btn-success">Lagre</button>
          
        </div>
        
        
      </div>
    </div>
  </div>

    <!---->
  <!-- ****************Edit event -->
    <div class="modal" id="myeditModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Edit Event</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
                      

            <div class="form-group">

                    <label for="p-in" class="col-md-4 label-heading">Event Name</label>

                    <div class="col-md-12 ui-front">

                        <input type="text" class="form-control" id="edeventname" name="name" value="">

                    </div>

            </div>

            <div class="form-group">

                    <label for="p-in" class="col-md-4 label-heading">Description</label>

                    <div class="col-md-12 ui-front">

                       <textarea class="form-control" id="eddescription" style="min-height: 150px" name="description"></textarea>

                    </div>

            </div>
            

            <div class="form-group">

                    <label for="p-in" class="col-md-4 label-heading">Start Time</label>

                    <div class="col-md-12">

                        <input type="text" id="edstartclock" class="form-control datetime" name="start_date" required="required">

                    </div>

            </div>

            <div class="form-group">

                    <label for="p-in" class="col-md-4 label-heading">End Time</label>

                    <div class="col-md-12">

                      <input type="text" id="edendclock" class="form-control datetime" name="end_date" required="required">

                    </div>

            </div>
            
            
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <div class="form-group">
            <button id="delete" class="btn btn-danger" name="delete">Delete Event</button>
            
        </div>
          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
          <button type="button" id="updatesubmit" class="btn btn-success">Update Event</button>
        </div>
        
      </div>
    </div>
  </div>
  <!-- ****************Edit event -->
  <!---->

 </body>


</html>
