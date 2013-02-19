<!DOCTYPE html>
<html lang="en">

<head>
   
     <title>Login</title>
     <link rel="stylesheet" href="/ilw/resources/css/bootstrap.min.css">
     <link rel="stylesheet" href="/ilw/resources/css/bootstrap-responsive.min.css">
     
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

  <!-- Main Page -->
    <div class="row-fluid">
  
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
  <script src="resources/js/jquery.min.js"></script>
  <script src="resources/js/bootstrap.js"></script>
  <script src="resources/js/holder.js"></script>

</body>

</html>	
<!-- End HTML -->