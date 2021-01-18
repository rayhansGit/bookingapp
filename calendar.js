$(document).ready(function () {
  var calendar = $('#calendar').fullCalendar({
    editable: true,
    header: {
      left: 'prev,next today',
      center: 'title',
      right: 'month,agendaWeek,agendaDay'
    },
    events: 'load.php',
    selectable: true,
    selectHelper: true,
    select: function (start, end, allDay) {
      var start = $.fullCalendar.formatDate(start, "Y-MM-DD");
      var end = $.fullCalendar.formatDate(end.subtract(1, 'days'), "Y-MM-DD");
      //var end = $.fullCalendar.formatDate(end, "Y-MM-DD");
      $('#mymodal').modal();

      $('#all_week').on('click', function () {
        createRecurrentEvent(7);
      });
      $('#other_week').on('click', function () {
        createRecurrentEvent(14);
      });
      $('#single_event').on('click', function () {
        createSingleEvent(start, end);
      });
    },
    editable: true,
    eventResize: function (event) {
      var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
      var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
      var title = event.title;
      var id = event.id;
      $.ajax({
        url: "update.php",
        type: "POST",
        data: { title: title, start: start, end: end, id: id },
        success: function () {
          calendar.fullCalendar('refetchEvents');
          alert('Event Update');
        }
      })
    },

    eventDrop: function (event) {
      var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
      var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
      var title = event.title;
      var id = event.id;
      $.ajax({
        url: "update.php",
        type: "POST",
        data: { title: title, start: start, end: end, id: id },
        success: function () {
          calendar.fullCalendar('refetchEvents');
          alert("Event Updated");
        }
      });
    },

    eventClick: function (event) {

      $.ajax({
        url: "events.php?type=deleteEventCheck",
        type: "POST",
        data: { 'event_id': event.id },
        success: function (data) {
          var data = JSON.parse(data);
          $('#event_id').val(data.event_id);
          if (data.parent == 0) {
            $('#all_event').hide();
          } else {
            $('#all_event').show();
          }
          $('#delete_modal').modal('show');
        }
      })
    },

  });
  $('#one_event').on('click', function () {
    $.ajax({
      url: "delete.php",
      type: "POST",
      data: { id: $('#event_id').val() },
      success: function () {
        calendar.fullCalendar('refetchEvents');
        alert("Event Removed");
        window.location.reload();
      }
    });
  });
  $('#all_event').on('click', function () {
    $.ajax({
      url: "events.php?type=deleteRecurrentEvent",
      type: "POST",
      data: { id: $('#event_id').val() },
      success: function () {
        //calendar.fullCalendar('refetchEvents');
        alert("Deleted Successfully");
        window.location.reload();
      }
    })
  });

});




/*
* creates recurrent events
* @param week_type int [type of recurrence (every week or every other week)]
* 
*/
function createRecurrentEvent(week_type) {
  var x = $("[name='r_event']:checked");
  var start_time = $('#startclock').val();
  var end_time = $('#endclock').val();
  var title = $('#eventname').val();
  var recurrance = $('#rectime').val();


  var days = "";
  for (i = 0; i < x.length; i++) {
    if (x[i].checked) {
      days = days + x[i].value + ' ';
      //alert(x[i].value);
    }
  }

  // var start_time = start+" "+start_time+":00";
  // var end_time = end+" "+end_time+":00";


  $.ajax({
    url: "events.php?type=recurrentEvent",
    type: "POST",
    data: { 'title': title, 'start': start_time, 'end': end_time, 'days': days, 'week_type': week_type, 'recurrence': recurrance },
    success: function () {
      //calendar.fullCalendar('refetchEvents');
      alert("Added Successfully");
      window.location.reload();
    }
  })
}

function createSingleEvent(start, end) {
  var start_time = $('#startclock').val();
  var end_time = $('#endclock').val();
  var title = $('#eventname').val();

  var start_time = start + " " + start_time + ":00";
  var end_time = end + " " + end_time + ":00";

  $.ajax({
    url: "events.php?type=singleEvent",
    type: "POST",
    data: { 'title': title, 'start': start_time, 'end': end_time },
    success: function () {
      //calendar.fullCalendar('refetchEvents');
      alert("Added Successfully");
      window.location.reload();
    }
  })
}