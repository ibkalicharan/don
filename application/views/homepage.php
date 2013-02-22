<!DOCTYPE html>
<html lang="en">
<head>
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php $this->load->view('stdcomponents/stdhead'); ?>

 	<title>MyED 2."oh"</title>
  <script src="http://localhost:8888/ilw/resources/js/jquery.min.js"></script>
  <script src="http://localhost:8888/ilw/resources/js/rss_reader.js"></script>
  <script>
      $(document).ready(getRss("http://localhost:8888/ilw/resources/js/edinburgh-university-news.xml", "#rss", "#rssLink"));
  </script>
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
            <form class="navbar-search pull-right" action="http://www.ed.ac.uk/search" method="get" target="_blank">
  				    <input type="text" name="q" class="search-query" placeholder="Search UoE" data-provide="typeahead" data-items="4" data-source="[&quot;Timetable&quot;,&quot;Personal Tutor&quot;,&quot;EUSA&quot;]">
			      </form>
            <ul class="nav">
              <li class="active"><a href="#">Home</a></li>
              <li><a href="../index.php/me">Me</a></li>
              <li><a href="../index.php/studies">Studies</a></li>
              <li><a href="../index.">Local</a></li>
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
    		<p>Welcome, <?php echo($fName);?></p>
    	
    		<p><center><img src="holder.js/140x140" class="img-polaroid"></center><p>
    		
    		<p><small><?php echo($fName);?> <?php echo($lName);?><br><?php echo($mNumber);?><br><?php echo($school);?><br><?php echo($degree);?></small></p>

    		<!--User-Specific Tasks-->
    		<h5>Frequent Tasks:</h5>
    		<a href="http://outlook.com/ed.ac.uk" target="_blank" class="btn btn-block"><i class="icon-envelope"></i> E-Mail <small>(Office 365)</small></a>
    		<a href="https://www.ease.ed.ac.uk/cosign.cgi?cosign-eucsCosign-www.learn.ed.ac.uk&https://www.learn.ed.ac.uk/cgi-bin/login.cgi" target="_blank" class="btn btn-block">Go to Learn</a>
        <a href=<?echo('"'); echo("mailto:"); echo($ptemail); echo('"');?> class="btn btn-block">Email Personal Tutor</a>
    		
    		<!--Global options/tasks-->
    		<h5>Options:</h5>
    		<a href="http://localhost:8888/ilw/index.php/admin/logout" class="btn btn-inverse btn-block">Logout</a>
    	</div>	
    </div>
    <!--/Sidebar-->

    <!--Main Content-->
    <div class="span8">

        <div class="well well-small">

          <h4><a href="#notifModal" data-toggle="modal">You have 3 notifications!</a></h4>
          <p>Some common tasks are listed underneath. Above, the "me" tab takes you to a page about you, the "studies" tab takes you to all things related to your degree and the "local" tab shows you what's happening around town. </p>
        
        </div>

        <div class="row-fluid">
          
          <div class="span6">
            <div class="well">
            <h2>Timetable</h2>
            <hr>
            <p>Generate your university timetable here, then export it to your favourite calendar program.</p>
            <p><a class="btn" href="#">Timetable &raquo;</a></p>
          </div>
          </div><!--/span-->

          <div class="span6">
            <div class="well">
            <h2>Personal Tutor</h2>
            <hr>
            <p>Your Personal Tutor is your first contact for academic guidance and support. Here, you can send confidential messages to them or request meetings.</p>
            <p><a class="btn" href="http://www.ess.euclid.ed.ac.uk/student/index.cfm">Personal Tutor &raquo;</a></p>
          </div><!--/well-->
        </div><!--/span-->
          </div>

          <div class="row-fluid">
          <div class="span6">
            <div class="well">
            <h2>Help & Support</h2>
            <hr>
            <p>Got a problem? Need some help or advice? Here you'll find loads of local support services outside of the University that can help you with all manner of problems.</p>
            <p><small>Provided by ALISS</small></p>
            <p><a class="btn" href="../index.php/local/support">View details &raquo;</a></p>
          </div>
          </div><!--/span-->

          <div class="span6">
            <div class="well">
            <h2>EUSA</h2>
            <hr>
            <p>Edinburgh University Students Association. Not just for Teviot; they manage many social events, campaigns and decisions regarding university life. They also provide a wide range of support services and ways to get involved.</p>
            <p><a class="btn" href="http://www.eusa.ed.ac.uk">EUSA &raquo;</a></p>
          </div>
          </div><!--/span-->
        </div><!--/row-->

          <div class="row-fluid">
          
          <div class="span6">
            <div class="well">
            <h2>Informatics</h2>
            <hr>
            <p>You are listed as an Informatics student. Go straight to your home school's webpage.</p>
            <p><a class="btn" href="http://www.inf.ed.ac.uk">View details &raquo;</a></p>
            </div>
          </div><!--/span-->

          <div class="span6">
            <div class="well">
            <h2>Nav@ED</h2>
            <hr>
            <form action="http://maps.google.co.uk/maps" method="get" target="_blank">
                Where are you now:
                <select name="saddr">
                    <option value="Appleton Tower, Informatics, 11 Crichton St, Edinburgh, Edinburgh, United Kingdom">Appleton Tower</option>
                    <option value="David Hume Tower - University of Edinburgh">David Hume Tower</option>
                    <option value="Old College, South Bridge, Edinburgh EH8 9YL, United Kingdom">Old College</option>
                    <option value="King's Buildings, W Mains Rd, Edinburgh, City of Edinburgh EH9 3JG, UK">Kings Buildings</option>
                    <option value="New College on the Mound, Edinburgh">New College</option>
                </select>
                <br>
                Where do you want to go:
                <input type="text" name="daddr"/>
                <br>
                How do you want to go there:
                    <select name="dirflg">
                        <option value="r">By bus</option>
                        <option value="h">By car</option>
                        <option value="w">By walking</option>
                    </select>
                    <br>
                <input type="submit" class="btn btn-primary" value="Get Directions" />
            </form>
          </div><!--/span-->
        </div>
        </div><!--/row-->
      </div><!--/span-->
    <!--/Main Content-->


    <!--RSS Sidebar-->
    <div class="span2">
      <div id="main-page-sidebar" class="well">
        <h4>News@ED</h4>
        <hr>
        <div id="rss">
          <ul id="rss"></ul>
        </div>
        <hr>
      </div>
    </div>
    <!--/RSS Sidebar-->

    </div>
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
              <p><a href="#" class="btn">Go to PT</a>
              <br>
              <small>Today at 14:27</small></p>

              <hr>
              
              <h5>A new announcement was posted in Economics 1A on Learn...</h4>
              <p><a href="#" class="btn">Go to Learn</a>
              <br>
              <small>Yesterday at 10:19</small></p>

              <hr>

              <h5>You have two assignments due today...</h5>
              <p><a href="#" class="btn">Go to Calendar</a>
              <br>
              <small>Over a week ago.</small></p>

            </div>
            <div class="modal-footer">
              <button class="btn" data-dismiss="modal">Close</button>
            </div>
          </div>
<!--/Modals-->

<!--Le Javascript-->

<script src="http://localhost:8888/ilw/resources/js/bootstrap.js"></script>
<script src="http://localhost:8888/ilw/resources/js/holder.js"></script>

</body>
</html>