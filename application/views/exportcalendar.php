<!DOCTYPE html>
<html>
<head>
	<title>Export Calendar</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
</head>
<body>
    <form class="col-md-12" action="<?php echo base_url();?>Exportcalendar/exportdates" method="POST">
    	
    	
    			<?php
      foreach ($cal as $key) {
      

      echo "<input type='checkbox' name='checkboxvar[]' value='".$key["numbers"]."' onclick='reply_click(this.id)'>".$key['numbers']."<br>";
      }
      ?>
    		
    	<br><br>




    	
    	<input type="date" name="startdate">
    	<input type="date" name="enddate">
    	<input type="submit" name="submit" class="btn btn-success">
    </form>
</body>
</html>