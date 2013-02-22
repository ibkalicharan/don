<!DOCTYPE html>
<html lang="en">
<head>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php $this->load->view('stdcomponents/stdhead'); ?>

 	<title>MyED 2."oh"</title>
  <script src="/ilw/resources/js/jquery.min.js"></script>
  <script src="/ilw/resources/js/rss_reader.js"></script>
  <script>
      $(document).ready(getRss("/ilw/resources/js/edinburgh-university-news.xml", "#rss", "#rssLink"));
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
            <form class="navbar-search pull-right">
  				<input type="text" class="search-query" placeholder="Search MyED" data-provide="typeahead" data-items="4" data-source="[&quot;Timetable&quot;,&quot;Personal Tutor&quot;,&quot;EUSA&quot;,&quot;Buses&quot;]">
			</form>
            <ul class="nav">
              <li><a href="#">Home</a></li>
              <li class="active"><a href="../index.php/me">Me</a></li>
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
    		<a href="/ilw/index.php/admin/logout" class="btn btn-inverse btn-block">Logout</a>
    	</div>
    </div>
    <!--/Sidebar-->
    <div class="span8">
    </div>


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

<script src="/ilw/resources/js/bootstrap.js"></script>
<script src="/ilw/resources/js/holder.js"></script>

</body>
</html>
