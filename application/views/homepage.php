<!DOCTYPE html>
<html lang="en">
<head>
	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="resources/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="resources/css/bootstrap-responsive.min.css">

 	<title>MyED 2."oh"</title>

</head>
<body>

<!--Navbar-->
<div class="navbar">
   <div class="navbar-inner">
       <div class="container-fluid">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="#">MyED <small>2.0 POC</small></a>
          <div class="nav-collapse collapse">
            <form class="navbar-search pull-right">
  				<input type="text" class="search-query" placeholder="Search MyED" data-provide="typeahead" data-items="4" data-source="[&quot;Timetable&quot;,&quot;Personal Tutor&quot;,&quot;EUSA&quot;,&quot;Buses&quot;]">
			</form>
            <ul class="nav">
              <li class="active"><a href="#">Home</a></li>
              <li><a href="#about">Studies</a></li>
              <li><a href="#contact">Local</a></li>
            </ul>
          </div><!--/.nav-collapse -->
       </div>
    </div>
 </div>
<!--/Navbar-->

<!--Main Page-->
<div class="container-fluid">

  <div class="row-fluid">
    <!--Sidebar-->
    <div class="span2">
    	<div class="well">
    		<!--User Info-->
    		<p>Welcome, Connor!</p>
    		
    		<p><center><img src="holder.js/140x140" class="img-polaroid"></center><p>
    		
    		<p><small>Connor Stuart<br>S1204589<br>College of Science and Engineering<br>School of Informatics<br>Master of Informatics (MInf)<br>Year 1</small></p>

    		<!--User-Specific Tasks-->
    		<h5>Frequent Tasks:</h5>
    		<a href="http://outlook.com/ed.ac.uk" target="_blank" class="btn btn-block"><i class="icon-envelope"></i> E-Mail <small>(Office 365)</small></a>
    		<a href="mailto:s.anderson@ed.ac.uk" class="btn btn-small btn-block">Email Personal Tutor</a>
    		<a href="https://www.ease.ed.ac.uk/cosign.cgi?cosign-eucsCosign-www.learn.ed.ac.uk&https://www.learn.ed.ac.uk/cgi-bin/login.cgi" target="_blank" class="btn btn-block">Learn</a>
    		<!--Global options/tasks-->
    		<h5>Options:</h5>
    		<div class="btn btn-inverse btn-block">Logout</div>
    	</div>	
    </div>
    <!--/Sidebar-->

    <!--Main Content-->
    <div class="span10">

        <div class="well">

          <h4><a href="#notifModal" data-toggle="modal">You have 3 notifications!</a></h4>
          <p>Some common tasks are listed underneath. Above, the "me" tab takes you to a page about you, the "studies" tab takes you to all things related to your degree and the "local" tab shows you what's happening around town.</p>
        
        </div>

        <div class="row-fluid">
          
          <div class="span4">
            <h2>Timetable</h2>
            <p>View your University timetable; add tutorials and other committments, then export it to your calendar.</p>
            <p><a class="btn" href="#">Timetable &raquo;</a></p>
          </div><!--/span-->

          <div class="span4">
            <h2>Personal Tutor</h2>
            <p>Your Personal Tutor is your first contact for academic guidance and support. Here, you can send confidential messages to them or request meetings.</p>
            <p><a class="btn" href="http://www.ess.euclid.ed.ac.uk/student/index.cfm">Personal Tutor &raquo;</a></p>
          </div><!--/span-->

          <div class="span4">
            <h2>Buses</h2>
            <p>Find bus routes to common UoE destinations, view timetables, get live bus times and see more information about Edinburgh's buses.</p>
            <p><a class="btn" href="#">Buses &raquo;</a></p>
          </div><!--/span-->

        </div><!--/row-->

        <div class="row-fluid">

          <div class="span4">
            <h2>EUSA</h2>
            <p>Edinburgh University Students Association. Not just for Teviot; they manage many social events, campaigns and decisions regarding university life. They also provide a wide range of support services and ways to get involved.</p>
            <p><a class="btn" href="http://www.eusa.ed.ac.uk">EUSA &raquo;</a></p>
          </div><!--/span-->

          <div class="span4">
            <h2>Heading</h2>
            <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
            <p><a class="btn" href="#">View details &raquo;</a></p>
          </div><!--/span-->

          <div class="span4">
            <h2>Heading</h2>
            <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
            <p><a class="btn" href="#">View details &raquo;</a></p>
          </div><!--/span-->

        </div><!--/row-->
      </div><!--/span-->
    </div>
    <!--/Main Content-->
  </div>
</div>

<!--Modals-->
<div id="notifModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="notifModalLabel" aria-hidden="true">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h3 id="notifModalLabel">Notifications</h3>
            </div>

            <div class="modal-body">
              <h5>Your Personal Tutor posted a new note...</h5>
              <p><a href="#">Click here to view note.</a>
              <br>
              <small>Today at 14:27</small></p>

              <hr>
              
              <h5>A new announcement was posted in Economics 1A on Learn...</h4>
              <p><a href="#" class="btn">Go to Learn</a></p>
              <small>Yesterday at 10:19</small>

              <hr>

              <h5>Kirsten Belk sent 17,623 emails...</h5>
              <p><a href="#">Sigh. Go to Office 365 (E-Mail)</a>
              <br>
              <small>Over a week ago.</small></p>

            </div>
            <div class="modal-footer">
              <button class="btn" data-dismiss="modal">Close</button>
            </div>
          </div>
<!--/Modals-->

<!--Le Javascript-->

<script src="resources/js/jquery.min.js"></script>
<script src="resources/js/bootstrap.js"></script>
<script src="resources/js/holder.js"></script>

</body>
</html>