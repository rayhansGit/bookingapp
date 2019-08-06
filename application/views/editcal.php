<!DOCTYPE html>
    <html>
    <head>
    	<title>Edit Calendar</title>
    	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    </head>
    <body>
    	<h1 class="text-center">Add/Delete Calendar</h1>
    	<section class="container">
    		<form style="margin-bottom: 5px" class="col-md-6" method="POST" action="<?php echo base_url();?>ClassroomCalendar/new">
      <p>Legg til klassse</p>
      <input type="text" name="calendar" placeholder="Klassens navn" required="required">
      <input type="submit" class="btn btn-info" name="submit" value="Legg til">
    </form>
    <form style="margin-bottom: 5px" class="col-md-6" method="POST" action="<?php echo base_url();?>ClassroomCalendar/deletecal">
      <p>Slett klasse</p>
      <input type="text" name="calendar" placeholder="Klassens navn" required="required">
      <input type="submit" class="btn btn-success" name="submit" value="Slett klassen">
    </form>

    <form class="col-md-12" action="<?php echo base_url();?>ClassroomCalendar/exportdates" method="POST">
    	<h2>Import Data from One calendar to another</h2>
    	<label>Select Calendar from where you want to import your dates</label>
    	<select name="calfrom">
    		<option>From</option>
    			<?php
      foreach ($cal as $key) {
      

      echo "<option class='btn btn-success' id='".$key["numbers"]."' onclick='reply_click(this.id)'>".$key['numbers']."</option>";
      }
      ?>
    		
    	</select><br><br>


    	<label>Select Calendar to where you want to place your dates</label>
    	<select name="calto">
    		<option>To</option>
    			<?php
      foreach ($cal as $key) {
      

      echo "<option class='btn btn-success' id='".$key["numbers"]."' onclick='reply_click(this.id)'>".$key['numbers']."</option>";
      }
      ?>
    		
    	</select><br>
    	<input type="submit" name="submit" class="btn btn-success">
    </form>
    	</section>
    <a href="<?php echo base_url()?>pages/dashboard">Go to Dashboard</a>
    </body>
</html>