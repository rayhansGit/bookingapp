<!DOCTYPE html>
		<html>
		<head>
			<title>User Registration </title>
			<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
		    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
			  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
			<link rel="icon" href="images/favicon.png" type="image/x-icon">
		  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
		  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />
		</head>

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
    color: #999;
}

a,
a:hover,
a:focus {
    color: inherit;
    text-decoration: none;
    transition: all 0.3s;
}

.navbar {
    padding: 15px 10px;
    background: #fff;
    border: none;
    border-radius: 0;
    margin-bottom: 40px;
    box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
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
			.maindiv{
				max-width: 1000px;
				border: 1px solid transparent;
			    background-color: #fff;
			    box-shadow: 0 1px 3px 0 rgba(63,63,68,0.15), 0 0 0 1px rgba(63,63,68,0.05);
			    border-radius: 3px;
			    position: relative;
			}
			img{
		    max-width: 100%
		  }
		  .navbar-header>a>img
		  {
		    width: 70px
		  }
		  .register
		  {
		    border: 2px solid beige !important;
		      border-radius: 5px !important;
		      margin-right: 5px;
		      background-color: #0f4989;
		  }
		  .btn-success {
		      color: #fff;
		      background-color: #0f4989;
		      border-color: #0f4989;
		  }
		  .nopadding
		  {
		  	padding: 0 !important 	
		  }
		  a:hover{
		  	cursor: pointer !important;
		  }
		  p{
		  	color: red;
		  	font-weight: 500
		  }
		  #passsuccess
		  {
		  	color: green !important;
		  }
		  .pills-content
		  {
		  	opacity: 0;
		  	-webkit-transition: all 0.5s ease-in-out;
			  -moz-transition: all 0.5s ease-in-out;
			  -ms-transition: all 0.5s ease-in-out;
			  -o-transition: all 0.5s ease-in-out;
			  transition: all 0.5s ease-in-out;
		  }
		  .nav-pills>li>a
		  {
		  	font-size: 25px;
		    margin-top: 34px;
		    color: white !important;


		  }
		  .nav-pills>li>a:hover
		  {
		  	background: transparent !important;
		  }

		  .nav-pills>li
		  {
		  	float: left;

			height: 120px;

			width: 200px;
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
		<body>
			<nav class="navbar navbar-expand-lg navbar-light bg-light top-navbar text-center">
               <a href="" class="pull-left"><img src="<?php echo base_url();?>assets/images/protech.png"></a>

               <img src="<?php echo base_url();?>assets/images/Logo.png"> 
            </nav>
						    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            

            <ul class="list-unstyled components text-center">
                
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

                    <!-- <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        
                    </button> -->
                   

                    
                </div>
            </nav>
						<div class="container">
			  <h2>Registered builders</h2>
			           
			  <table class="table table-striped">
			    <thead>
			      <tr>
			        <th>Firstname</th>
			        <th>Lastname</th>
			        <th>Phone Number</th>
			        <th>Address</th>
			        <th>E-mail</th>
			      </tr>
			    </thead>
			    <tbody>
			      <?php
			      foreach($builders as $builder)
			      {
			      	echo "<tr>";
			      		echo "<td>";
			      			echo $builder['firstname'];
			      		echo "</td>";
			      		echo "<td>";
			      			echo $builder['lastname'];
			      		echo "</td>";
			      		echo "<td>";
			      			echo $builder['phonenumber'];
			      		echo "</td>";
			      		echo "<td>";
			      			echo $builder['address'];
			      		echo "</td>";
			      		echo "<td>";
			      			echo $builder['email'];
			      		echo "</td>";
			      	echo "</tr>";
			      }
			      ?>
			    </tbody>
			  </table>
			</div>

            
        </div>
    </div>
		</body>