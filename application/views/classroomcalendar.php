<!DOCTYPE html>
<html>
    <head>
        <title>Job Planner</title>
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/fullcalendar.min.css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap-datetimepicker.min.css">
        <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
           <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
            <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

           <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
       
        
        
         <script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
         <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/moment.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="<?php echo base_url() ?>assets/js/fullcalendar.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/fullcalendar-rightclick.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/js/moment-with-locales.min.js"></script>


        <script src="<?php echo base_url() ?>assets/js/anchrome.js"></script>
        <script src="<?php echo base_url() ?>assets/js/bootstrap-datetimepicker.min.js"></script>



        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-material-datetimepicker.css" />
        <link href='https://fonts.googleapis.com/css?family=Roboto:400,500' rel='stylesheet' type='text/css'>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">




        <script type="text/javascript" src="https://momentjs.com/downloads/moment-with-locales.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap-material-datetimepicker.js"></script>


        <style type="text/css">
            /*
    DEMO STYLE
*/

@import "https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700";
body {
    font-family: 'Poppins', sans-serif;
    background: #fafafa;
}

p {
    font-family: 'Poppins', sans-serif;
    font-size: 1.1em;
    font-weight: 300;
    line-height: 1.7em;
    /*color: #999;*/
}

a,
a:hover,
a:focus {
    color: inherit;
    text-decoration: none;
    /*transition: all 0.3s;*/
}

.navbar {
    padding: 15px 10px;
    background: #fff0;
    border: none;
    border-radius: 0;
    margin-bottom: 40px;
    /* box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1); */
}

.navbar-btn {
    box-shadow: none;
    outline: none !important;
    border: none;
}

.line {
    width: 100%;
    height: 1px;
    border-bottom: 1px dashed #ddd;
    margin: 40px 0;
}

/* ---------------------------------------------------
    SIDEBAR STYLE
----------------------------------------------------- */

.wrapper {
    display: flex;
    width: 100%;
    align-items: stretch;
}

#sidebar {
    min-width: 250px;
    max-width: 250px;
    background: #2fc1d3;
    color: #fff;
    transition: all 0.3s;
}

#sidebar.active {
    margin-left: -250px;
}

#sidebar .sidebar-header {
    padding: 20px;
    background: #6d7fcc;
}

#sidebar ul.components {
    padding: 20px 0;
    border-bottom: 1px solid #47748b;
}

#sidebar ul p {
    color: #fff;
    padding: 10px;
}

#sidebar ul li a {
    padding: 10px;
    font-size: 1.1em;
    display: block;
}

#sidebar ul li a:hover {
    color: #7386D5;
    background: #fff;
}

#sidebar ul li.active>a,
a[aria-expanded="true"] {
    color: #fff;
    background: #6d7fcc;
}

a[data-toggle="collapse"] {
    position: relative;
}

.dropdown-toggle::after {
    display: block;
    position: absolute;
    top: 50%;
    right: 20px;
    transform: translateY(-50%);
}

ul ul a {
    font-size: 0.9em !important;
    padding-left: 30px !important;
    background: #6d7fcc;
}

ul.CTAs {
    padding: 20px;
}

ul.CTAs a {
    text-align: center;
    font-size: 0.9em !important;
    display: block;
    border-radius: 5px;
    margin-bottom: 5px;
}

a.download {
    background: #fff;
    color: #7386D5;
}

a.article,
a.article:hover {
    background: #6d7fcc !important;
    color: #fff !important;
}

/* ---------------------------------------------------
    CONTENT STYLE
----------------------------------------------------- */

#content {
    width: 100%;
    padding: 20px;
    min-height: 100vh;
    transition: all 0.3s;
}

/* ---------------------------------------------------
    MEDIAQUERIES
----------------------------------------------------- */

@media (max-width: 768px) {
    #sidebar {
        margin-left: -250px;
    }
    #sidebar.active {
        margin-left: 0;
    }
    #sidebarCollapse span {
        display: none;
    }
}

            #box{
                border: 1px solid #999;
            }
            .menu{
                /*width: 12rem;
                height: 2rem;*/
                background-color: white;
                color: black;
                font-weight: 700;
                border: 1px solid #aaa;
                box-shadow: 2px 2px 2px #999;
                border-radius: 0.2rem;
                list-style: none;
                position: fixed;
            }
            .menu.off{
                top: -200%;
                left: -200%;
            }
            .menu-item{
                /*height: 1.5rem;*/
                line-height: 1.5rem;
                font-size: 1rem;
                font-weight: 800;
                padding: 0 1rem;
                cursor: pointer;
            }
            .menu-item:hover,
            .menu-item:active{
                color: black;
                font-weight: 900;
            }
            .menu2{
                /*width: 12rem;
                height: 10rem;*/
                background-color: white;
                color: black;
                font-weight: 700;
                border: 1px solid #aaa;
                box-shadow: 2px 2px 2px #999;
                border-radius: 0.2rem;
                list-style: none;
                position: fixed;
            }
            .menu2.off{
                top: -200%;
                left: -200%;
            }
            .menu2-item{
                /*height: 1.5rem;*/
                line-height: 1.5rem;
                font-size: 1rem;
                font-weight: 800;
                padding: 0 1rem;
                cursor: pointer;
            }
            .menu2-item:hover,
            .menu2-item:active{
                color: black;
                font-weight: 900;
            }
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

            .favcolor
            {
                border:1px solid black !important;
            }
            body .fc {

                font-size: 1em;

                background-color: rgba(0, 0, 0, 0);
                color: black;
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
                margin-bottom: 70px;
                
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
                font-weight: 800
            }

            .fc-scroller,.fc-day-grid-container
            {
                overflow: visible !important;
                height: auto !important;
            }
            .fc-unthemed td.fc-today {
                background: #e9e3fc3b !important;
            }
            .top-navbar{
                margin: 0 !important;
                padding: 0 !important;
                background: #0892b7 !important;
          }
          .top-navbar>a>img
          {
            max-height: 136px;
            max-width: 50%
          }
          .top-navbar>a
          {
            background: white
          }
        </style>
        <script>

           document.addEventListener('DOMContentLoaded', function () {
                //make sure the right click menu is hidden
                menu = document.querySelector('.menu');
                menu2 = document.querySelector('.menu2');
                body = document.querySelector('.body');
                menu.classList.add('off');
                menu2.classList.add('off');


                $('.prev i').removeClass();
                $('.prev i').addClass("fa fa-chevron-left");

                $('.next i').removeClass();
                $('.next i').addClass("fa fa-chevron-right");

                $('#calendar:not(".fc-event")').on('contextmenu', function (e) {
                    e.preventDefault()
                })
                var calendar = $('#calendar').fullCalendar({
                    height: 500,
                    firstDay: 7,
                    defaultView: 'basicWeek',
                    titleRangeSeparator: ' - ',
                    editable: 'true',
                    displayEventTime: false,
                    selectable: false,
                    allDay : true,
                      // If you set a number it will hide the itens
                    eventLimitText: "More Jobs", // Default is `more` (or "more" in the lang you pick in the option)

                    eventRender: function (event, element) {
                        if (event.title) {
                            element.find(".fc-title").append("<br><b>Technician:" + event.tt + "</b>" + event.complete + event.incomplete);
                        }

                    },
                    eventDrop:function(event)
                    {
                     // var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                     // var end = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");

                     var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                     // var end = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                     var title = event.titleforeventdrop;
                     var id = event.id;


                     $.ajax({
                      url:"<?php echo base_url();?>ClassroomCalendar/updateEvent",
                      type:"POST",
                      data:{title:title, start:start, id:id},
                      success:function()
                      {
                       calendar.fullCalendar('refetchEvents');
                       
                       
                      }
                     });
                    },


                    dayRightclick: function (date, jsEvent, view) {

                        //add the right click listener to the box
                        let box = document.getElementsByClassName('fc-day');
                        for (var i = 0; i < box.length; i++) {
                            box[i].addEventListener('contextmenu', showmenu);
                        }


                        //add a listener for leaving the menu and hiding it
                        menu.addEventListener('mouseleave', hidemenu);
                        body.addEventListener('click', hidemenu);

                        //add the listeners for the menu items
                        addMenuListeners();

                        function showmenu(ev) {
                            //stop the real right click menu
                            ev.preventDefault();
                            //show the custom menu
                            console.log(ev.clientX, ev.clientY);
                            menu.style.top = `${ev.clientY - 20}px`;
                            menu.style.left = `${ev.clientX - 20}px`;
                            document.getElementById('menu').style.zIndex = '1';
                            var cal = document.getElementsByClassName('fc-day');


                            for (var i = 0; i < cal.length; i++) {
                                cal[i].style.zIndex = '0';

                            }

                            menu.classList.remove('off');
                        }
                        function hidemenu(ev) {
                            menu.classList.add('off');
                            menu.style.top = '-200%';
                            menu.style.left = '-200%';
                            document.getElementById('menu').style.zIndex = '0';
                            var cal = document.getElementsByClassName('fc-day');
                            for (var i = 0; i < cal.length; i++) {
                                cal[i].style.zIndex = '1';
                            }

                        }
                        function addMenuListeners() {
                            document.getElementById('createjob').addEventListener('click', insert);
                            // document.getElementById('checkin').addEventListener('click', setColour);
                            // document.getElementById('jobnote').addEventListener('click', setColour);
                        }
                        function setColour(ev) {
                            hidemenu();

                        }
                        function insert()
                        {
                            hidemenu();
                            var start = $.fullCalendar.formatDate(date, "Y-MM-DD HH:mm:ss");
                            var end = $.fullCalendar.formatDate(date, "Y-MM-DD HH:mm:ss");

                            $('#myModal').modal('show');
                            $('#myModal').on('hidden.bs.modal', function () {
                                location.reload();
                            });

                            $("#submit").one('click', function () {
                                if ((document.getElementById("project").value != '') && (document.getElementById("lotnumber").value != '') && (document.getElementById("phase").value != '' != '') && (document.getElementById("builder").value != ''))
                                {

                                    var project = document.getElementById("project").value;
                                    var lotnumber = document.getElementById("lotnumber").value;
                                    var phase = document.getElementById("phase").value;
                                    var techname = document.getElementById("techname").value;
                                    var builder = document.getElementById("builder").value;
                                    var jobpoint = document.getElementById("jobpoint").value;
                                    

                                    var phase = document.getElementById("phase").value;
                                    var phasecolor = "";
                                    var assigneddate="";

                                    if (phase == "Trim 1") {
                                        phasecolor = "green";
                                    } else if (phase == "Trim 2") {
                                        phasecolor = "yellow"
                                    } else if (phase == "After Carpet") {
                                        phasecolor = "pink"
                                    } else if (phase == "Stairs") {
                                        phasecolor = "#bf4d0b"
                                    } else if (phase == "Exteriors") {
                                        phasecolor = "#42f5e9"
                                    } else if (phase == "VPO") {
                                        phasecolor = "orange"
                                    }
                                    else if (phase == "Warranty") {
                                        phasecolor = "red"
                                    }
                                    else if (phase == "Punch") {
                                        phasecolor = "white"
                                    }

                                    if (techname=="Select Technician") {
                                        techname="";
                                    }
                                    else
                                    {
                                        assigneddate= start;
                                    }
                                    
                                    if (builder=="Select Builder") {
                                        builder="";
                                    }

                                    // $('.datetime').val(moment().format());

                                    if (project)
                                    {

                                        $.ajax({
                                            url: "<?php echo base_url(); ?>ClassroomCalendar/insert",
                                            type: "POST",
                                            data: {project: project, start: start, end: end, lotnumber: lotnumber, phase: phase, techname: techname, builder: builder, phasecolor: phasecolor, jobpoint:jobpoint, assigneddate: assigneddate},
                                            success: function ()
                                            {
                                                calendar.fullCalendar('refetchEvents');

                                                window.location.reload();
                                            }
                                        });
                                        $('#submit').one('click', clickHandler);
                                    }//
                                } else
                                {
                                    alert("Please fill all the required boxes");
                                }


                            })


                        }



                        // Prevent browser context menu:
                        return false;
                    },

                    eventRightclick: function (event, jsEvent, view) {
                        let box = document.getElementsByClassName('fc-content');
                        for (var i = 0; i < box.length; i++) {
                            box[i].addEventListener('contextmenu', showmenu);
                        }
                        addMenuListeners();
                        menu2.addEventListener('mouseleave', hidemenu);
                        body.addEventListener('click', hidemenu);
                        function showmenu(ev) {
                            //stop the real right click menu
                            ev.preventDefault();
                            //show the custom menu
                            console.log(ev.clientX, ev.clientY);
                            menu2.style.top = `${ev.clientY - 20}px`;
                            menu2.style.left = `${ev.clientX - 20}px`;
                            document.getElementById('menu2').style.zIndex = '1';
                            var cal = document.getElementsByClassName('fc-content');
                            for (var i = 0; i < cal.length; i++) {
                                cal[i].style.zIndex = '0';
                            }

                            menu2.classList.remove('off');
                        }

                        function hidemenu(ev) {
                            menu2.classList.add('off');
                            menu2.style.top = '-200%';
                            menu2.style.left = '-200%';
                            var cal = document.getElementsByClassName('fc-content');
                            for (var i = 0; i < cal.length; i++) {
                                cal[i].style.zIndex = '1';
                            }

                        }

                        function addMenuListeners() {
                            document.getElementById('checkin').addEventListener('click', checkin);
                            document.getElementById('jobnote').addEventListener('click', jobnote);
                            document.getElementById('complete').addEventListener('click', complete);
                            document.getElementById('incomplete').addEventListener('click', incomplete);
                            document.getElementById('delete').addEventListener('click', deleteEvent);
                            document.getElementById('jobinfo').addEventListener('click', jobinfo);
                        }

                        function checkin()
                        {


                        }
                        function jobnote()
                        {
                            $.ajax({
                                url: "<?php echo base_url(); ?>ClassroomCalendar/findjobnote",
                                type: "POST",
                                data: {id: event.id},
                                success: function (data) {
                                    var a = JSON.parse(data);
                                    var ret = a.replace('<br />', '');
                                    $('#myeditModal').modal();
                                    $('#myeditModal').on('hidden.bs.modal', function () {
                                        location.reload();
                                    });
                                    $('#eddescription').text(ret);

                                }
                            });

                            $('#updatesubmit').one('click', function () {
                                var id = event.id;

                                var description = $('#eddescription').val();


                                $.ajax({
                                    url: '<?php echo base_url(); ?>ClassroomCalendar/update',
                                    type: "POST",
                                    data: {id: id, description: description},
                                    success: function (data)
                                    {
                                        calendar.fullCalendar('refetchEvents');
                                        window.location.reload();
                                        //alert("Event Removed");
                                    }
                                })
                            });
                        }
                        function complete()
                        {

                            var jobpoint= event["miscProps"]["jobpoint"];
                            var technician= event["miscProps"]["tt"];
                            $.ajax({
                                url: "<?php echo base_url(); ?>ClassroomCalendar/insertcomplete",
                                type: "POST",
                                async: false,
                                data: {id: event.id, jobpoint:jobpoint, technician:technician},
                                success: function ()
                                {

                                    calendar.fullCalendar('refetchEvents');
                                    location.reload();
                                    

                                }
                            });
                        }
                        function incomplete()
                        {
                            var jobpoint= event["miscProps"]["jobpoint"];
                            var technician= event["miscProps"]["tt"];
                            $.ajax({
                                url: "<?php echo base_url(); ?>ClassroomCalendar/insertincomplete",
                                type: "POST",
                                data: {id: event.id, jobpoint:jobpoint, technician:technician},
                                success: function ()
                                {
                                    calendar.fullCalendar('refetchEvents');
                                    location.reload();

                                }
                            });
                        }
                        function deleteEvent()
                        {
                            $.ajax({
                                url: "<?php echo base_url(); ?>ClassroomCalendar/delete",
                                type: "POST",
                                data: {id: event.id},
                                success: function ()
                                {
                                    calendar.fullCalendar('refetchEvents');
                                    

                                }
                            });
                        }
                        function jobinfo()
                        {
                            var title= event["miscProps"]["titleforeventdrop"];
                            var lotnumber= event["miscProps"]["lotnumber"];
                            var phase = event["miscProps"]["phase"];
                            var technician= event["miscProps"]["tt"];
                            var builder= event["miscProps"]["builder"];
                            
                            var jobpoint= event["miscProps"]["jobpoint"];
                            var date= event["dateProfile"]["start"];
                            var jobnote= event["miscProps"]["jobnote"];
                            
                            
                            

                            
                             $('#myviewModal').modal();
                             $('#viewprojectname').text(title);
                             $('#viewlotnumber').text(lotnumber);
                             $('#viewphase').text(phase);
                             $('#viewtechname').text(technician);
                             $('#viewbuilder').text(builder);
                              
                              $('#viewpoint').text(jobpoint);
                              $('#viewjobnote').text(jobnote);
                              $('#viewdate').text(date);
                              
                        }
                        // Prevent browser context menu:
                        return false;
                    },

                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month,basicWeek,basicDay'
                    },

                    events: '<?php echo base_url(); ?>ClassroomCalendar/load',

                    // selectOverlap:true,
                    eventOverlap: true,
                    eventOrder: "tt",
                    // selectHelper: true,
                    timeFormat: 'hh:mm t',

                    timezone: 'local',
                    // validRange: {
                    //     start: new Date(Date.now() - 1000 * 60 * 60 * 24 * (1 * 7)), //ms+second+hour+day+numberofdays(60 means 2month)
                    //     end: new Date(Date.now() + 1000 * 60 * 60 * 24 * 60)
                    // },

                    select: function (start, end, timezone, callback)
                    {

                        if (start.isBefore(moment())) {
                            $('#calendar').fullCalendar('unselect');
                            return false;
                        }


                        var start = $.fullCalendar.formatDate(start, "Y-MM-DD");
                        var end = $.fullCalendar.formatDate(end.subtract(1, 'days'), "Y-MM-DD");
                    },

                    

                });
            });


            

            // $(function (ready) {
            //     $('#numberofweeks').change(function () {
            //         alert("now you can see upto " + $('#numberofweeks').val() + 'Weeks');
            //         $('#calendar').fullCalendar('option', 'validRange', {
            //             // Don't worry if user didn't provide *any* inputs.
            //             start: new Date(Date.now() - 1000 * 60 * 60 * 24 * (($('#numberofweeks').val()) * 7)), //ms+second+hour+day+numberofdays(60 means 2month)
            //             end: new Date(Date.now() + 1000 * 60 * 60 * 24 * 7)
            //         });
            //     });
            // });


        </script>


    </head>
    <body class="text-center body">
<nav class="navbar navbar-expand-lg navbar-light bg-light top-navbar text-center">
               <a href="" class="pull-left"><img src="<?php echo base_url();?>assets/images/protech.png"></a>

               <img src="<?php echo base_url();?>assets/images/Logo.png"> 
            </nav>
            <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            

            <ul class="list-unstyled components">
                <li>
                    <a href="<?php echo base_url();?>Pages/dashboard"  aria-expanded="false">Job Schedules</a>
                    <a href="<?php echo base_url();?>Users/register"  aria-expanded="false">People</a>
                    <a href="<?php echo base_url();?>Employees/technicians"  aria-expanded="false"> Technicians</a>
                    <a href="<?php echo base_url();?>Employees/builders"  aria-expanded="false"> Builders</a>
                    <a href="<?php echo base_url();?>Employees/statistics"  aria-expanded="false"> Statistics</a>
                    
                </li>
                
            </ul>

            
        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <!-- <button type="button" id="sidebarCollapse" class="btn btn-info pull-left">
                        
                        <i class="fas fa-align-left"></i>
                    </button> -->
                   

                    
                </div>
            </nav>
            <h1 class="text-center col-md-12" id="title"></h1>
        <br>
        <br>
        <div class="container">
            
            
            <!-- <label for="numberofweeks">Select Number of weeks</label>
            <select name="numberofweeks" id="numberofweeks">
                <option>1</option>
                <option>4</option>
                <option>12</option>
                <option>24</option>
                <option>52</option>
            </select> -->
            <div id="calendar" class="col-md-12"></div>

            <div id="unassigned-calendar" class="col-md-12">
                <h3 class="text-center">Un-assigned Jobs</h3>
                <table class="table table-bordered">
                    <tr>
                        <th>Project name</th>
                        <th>Builder</th>
                        <th>Phase</th>
                        <th>Lot Number</th>
                        <th>Action</th>
                    </tr>
                    
                        <?php
                        foreach ($jobs as $job) {
                            echo "<tr>";
                            echo "<td style='display: none'>";echo $job['id'];echo "</td>";
                            echo "<td>";echo $job['project'];echo "</td>";
                            echo "<td>";echo $job['builder'];echo "</td>";
                            echo "<td>";echo $job['phase'];echo "</td>";
                            echo "<td>";echo $job['lotnumber'];echo "</td>";
                            echo "<td>";echo '<button class="use-address">Assign</button>';echo "</td>";
                            echo "</tr>";
                        }
                        ?>
                        
                    
                </table>
            </div>

            <script type="text/javascript">
                $(".use-address").click(function() {
                $('#techModal').modal('show');
                $('#techModal').on('hidden.bs.modal', function () {
                    location.reload();
                });

                var $item = $(this).closest("tr"); 
                $tds = $item.find("td:nth-child(1)").text();

                $("#submitTechname").click(function () {
                    var technician= document.getElementById("technamemodal").value;
                    var date= document.getElementById("assigneddate").value;


                    $.ajax({
                    url: '<?php echo base_url(); ?>ClassroomCalendar/updateunassignedjob',
                    type: "POST",
                    data: {id: $tds, techname: technician, assigneddate: date},
                    success: function (data)
                    {
                    alert("The Job is now transfered to above Assigned Jobs section");
                    window.location.reload();
                                        //alert("Event Removed");
                    }
                })

                });

                        // Retrieves the text within <td>

                     // Outputs the answer

                
            });
            </script>

            <ul class="menu text-center list-group" id="menu">
                <li class="menu-item list-group-item" id="createjob">Create Job</li>

            </ul>
            <ul class="menu2 text-center list-group" id="menu2">

                <li class="menu2-item list-group-item" id="checkin">Check In</li>
                <li class="menu2-item list-group-item" id="jobnote">Job Notes</li>
                <li class="menu2-item list-group-item" id="complete">Complete</li>
                <li class="menu2-item list-group-item" id="incomplete">Incomplete</li>
                <li class="menu2-item list-group-item" id="jobinfo">Job Info</li>
                <li class="menu2-item list-group-item" id="delete">Delete</li>
            </ul>
            <a class="btn btn-danger" href="<?php echo base_url(); ?>pages/logout">Logout</a>
        </div>
        <!-- The Modal -->
        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Job Post</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">


                        <div class="form-group">

                            <label for="p-in" class="col-md-4 label-heading">Project</label>

                            <div class="col-md-12 ui-front">

                                <input type="text" class="form-control" id="project" name="project" value="">

                            </div>

                        </div>

                        <div class="form-group">

                            <label for="p-in" class="col-md-4 label-heading">Lot Number</label>

                            <div class="col-md-12 ui-front">

                                <input type="number" max="9999" class="form-control" id="lotnumber" name="lotnumber" value="" maxlength=4>

                            </div>

                        </div>


                        <div class="form-group">

                            <label for="p-in" class="col-md-4 label-heading">Phase</label>

                            <div class="col-md-12">

                                <select class="form-control" id="phase" name="phase">
                                    <option>Select Phase</option>
                                    <option>Trim 1</option>
                                    <option>Trim 2</option>
                                    <option>After Carpet</option>
                                    <option>Stairs</option>
                                    <option>Exteriors</option>
                                    <option>VPO</option>
                                    <option>Warranty</option>
                                    <option>Punch</option>
                                </select>

                            </div>

                        </div>

                        <div class="form-group">

                            <label for="p-in" class="col-md-4 label-heading">Technician Name</label>

                            <div class="col-md-12">

                                <select id="techname" class="form-control" name="techname">
                                    <option>Select Technician</option>
                                     <?php
                                    foreach ($technicians as $tech) {
                                        echo "<option>";
                                        echo $tech['firstname']." ".$tech['lastname'];
                                        echo "</option>";
                                    }
                                    ?>
                                </select>


                            </div>


                        </div>
                        <div class="form-group">

                            <label for="p-in" class="col-md-4 label-heading">Builder's Name</label>

                            <div class="col-md-12">

                                <select id="builder" class="form-control" name="builder">
                                    <option>Select Builder</option>
                                     <?php
                                    foreach ($builders as $builder) {
                                        echo "<option>";
                                        echo $builder['firstname']." ".$builder['lastname'];
                                        echo "</option>";
                                    }
                                    ?>
                                </select>

                            </div>


                        </div>


                        <div class="form-group">

                            <label for="p-in" class="col-md-4 label-heading">Job Point</label>

                            <div class="col-md-12">

                               <input type="number" max="9999" class="form-control" id="jobpoint" name="jobpoint" value="0" maxlength=4> 

                            </div>


                        </div>



                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" id="submit" class="btn btn-success">Submit</button>

                    </div>


                </div>
            </div>
        </div>

        <!--Technicians name modal-->
           <div class="modal" id="techModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Technicians</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">


                        


                        <div class="form-group">

                            <div class="col-md-12">
                                
                                <select class="form-control" id="technamemodal" name="technamemodal">
                                    <option>Select Technician</option>
                                    <?php
                                    foreach ($technicians as $tech) {
                                        echo "<option>";
                                        echo $tech['firstname']." ".$tech['lastname'];
                                        echo "</option>";
                                    }
                                    ?>
                                    
                                </select>
                                <input type="date" id="assigneddate" class="form-control" name="assigneddate">

                            </div>

                        </div>

                        



                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" id="submitTechname" class="btn btn-success">Submit</button>

                    </div>


                </div>
            </div>
        </div>

        <!---->
  <!-- ****************view event -->
    <div class="modal" id="myviewModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">View Job Details</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
                      

            

                    
                    <div class="table-responsive">
                    <table class="table" style="width: auto;">
                      
                      <tbody>
                        <tr>
                          <td>Project Name</td>
                          <td><p id="viewprojectname" name="viewprojectname" value=""></p></td>
                          
                        </tr>
                        <tr>
                          <td>Lot Number</td>
                          <td><p id="viewlotnumber" name="viewlotnumber" value=""></p></td>
                          
                        </tr>
                        <tr>
                          <td>Phase</td>
                          <td><p id="viewphase" name="viewphase" value=""></p></td>
                          
                        </tr>
                        <tr>
                          <td>Technician's Name</td>
                          <td><p id="viewtechname" name="viewtechname" value=""></p></td>
                          
                        </tr>
                        <tr>
                          <td>Builder's Name</td>
                          <td><p id="viewbuilder" name="viewbuilder" value=""></p></td>
                          
                        </tr>
                        
                        <tr>
                          <td>Jobpoint</td>
                          <td><p id="viewpoint" name="viewpoint" value=""></p></td>
                          
                        </tr>
                        <tr>
                          <td>Jobnote</td>
                          <td>
                            <textarea id="viewjobnote" name="viewjobnote" value="" readonly></textarea></td>
                            
                          
                        </tr>
                        <tr>
                          <td>Date</td>
                          <td><p id="viewdate" name="start_dateview"></p></td>
                          
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

    <!-- ****************Edit event -->
    <div class="modal" id="myeditModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Job Description</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          
                    
                   
                    
                        <div role="tabpanel" class="tab-pane active" id="uploadTab">
            

            <div class="form-group">

                    <label for="p-in" class="col-md-4 label-heading">Description</label>

                    <div class="col-md-12 ui-front">

                       <textarea class="form-control" id="eddescription" style="min-height: 150px" name="description"></textarea>

                    </div>

            </div>
            


            </div>
                        
                  
                
                      

            
            
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" id="updatesubmit" class="btn btn-success">Save</button>
          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
          
        </div>
        
      </div>
    </div>
  </div>

            
        </div>
    </div>



        
        <!-- ****************Edit event -->
        <!---->
           <!--  <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script> -->

    </body>


</html>
