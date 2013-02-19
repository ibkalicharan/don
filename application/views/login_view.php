<!DOCTYPE html>
<html lang="en">

<head>
   
     <title>Login</title>
     <link rel="stylesheet" href="/biznet/resources/bootstrap/css/bootstrap.min.css">
     <link rel="stylesheet" href="/biznet/resources/bootstrap/css/bootstrap-responsive.min.css">
     
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta name="tinfoil-site-verification" content="cd5612617dc0b100a22b03fe6d90b7543e814d14" />
     
     <style type="text/css">
        body {
          padding-top: 60px;
          padding-bottom: 40px;
        }
        .sidebar-nav {
          padding: 9px 0;
        }
      </style>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

</head>

<body>	
	
    

  <div class="container-fluid">

  <!-- Load Standard Modals -->
  <?php $this->load->view('stdcomponents/standard_modals'); ?>
  <!-- End Load Standard Modals -->

  <!-- More Info Modal -->
      <div class="modal hide fade" id="moreInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">More Info</h3>
      </div>
      <div class="modal-body">
        <p>BizNet is the best way ever invented for your company to communicate with itself.</p>
        <p>Think of it as a beehive. But with more honey.</p>
        <p>It's currently in a very early alpha though. That's probably why you do not have authentication credentials. Showing a crayon-drawn ID card to your webcam may let you through though.</p>
      </div>
      <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
      </div>
      </div>
  <!-- End More Info Modal -->

  <!-- HTTPS Modal -->
      <div class="modal hide fade" id="https" tabindex="-1" role="dialog" aria-labelledby="httpsModalLabel" aria-hidden="true">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h3 id="httpsModalLabel">Problem!</h3>
        </div>
        <div class="modal-body">
          <p>Sorry, a secure connection (HTTPS) is not yet available. Keep clicking on in hope though.</p>
        </div>
        <div class="modal-footer">
          <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
        </div>
      </div>
    <!-- End HTTPS Modal -->

  <!-- Main Page -->
    <div class="row-fluid">
    
    <!-- Sidebar -->    
    <?php $this->load->view('stdcomponents/logon_sidebar'); ?>
		<!-- End Sidebar -->


    <!-- Main Content -->
    <div class="span8"> 
     <div class="hero-unit">
      <h2>Please login</h2>
              	
	    <?php echo form_open('admin'); ?>
      <p>
        <?php 
          echo form_label('Email Address:  ', 'email_address');
          echo form_input('email_address', set_value('email_address'), 'id="email_address" autofocus');
        ?>
      </p>

      <p>
         <?php 
            echo form_label('Password:  ', 'password');
            echo form_password('password', '', 'id="password"');
         ?>
      </p>

      <p>
      	<div class="actions">
         <button type="input" class="btn btn-primary" name="submit" value="Login">Login</button> 
         <a href="#moreInfo" role="button" class="btn" data-toggle="modal">More Info</a>
        </div>
      </p>
      <?php echo form_close(); ?>

      <p>
        <?php echo validation_errors(); ?> 
      </p>
     </div>
     </div>
    <!-- End Main Content -->
  
    </div>
    </div>
  <!-- End Main Page -->

  <!-- NO CONTENT BELOW THIS LINE. JS ONLY -->
  <?php $this->load->view('stdcomponents/standard_scripts'); ?>
  
  <script> 
  $("https").popover();
  </script>

</body>

</html>	
<!-- End HTML -->