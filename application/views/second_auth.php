<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"><html>
	<head>
		
        <title>Two-Factor Authentication</title>
	
    <link rel="stylesheet" type="text/css" href="http://localhost:8888/ilw/resources/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="http://localhost:8888/ilw/resources/css/bootstrap-responsive.min.css">

    </style>

    </head>
	<body>
	
        <div class="navbar">
          <div class="navbar-inner">
            <a class="brand" href="#">EASE - Two Factor Authentication</a>
            <ul class="nav">
              <li><a href="#">About</a></li>
            </ul>
          </div>
        </div>

    <div class="container">
    <iframe id="duo_iframe" frameborder="0" height="500" width="100%"></iframe>
    <? echo form_open('admin', array('id'=> "duo_form")); ?>
    </form>
    <script type="text/javascript" src="../resources/js/duo.js"></script> 
    <script type="text/javascript">  
      Duo.init({  
            'host':'<? echo $host; ?>',  
            'post_action':'<? echo $post_action; ?>',  
            'sig_request':'<? echo $sig_request; ?>'  
        });  
   </script>  
</div>

   </body>
</html>
