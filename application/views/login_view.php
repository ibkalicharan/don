<!DOCTYPE html>

<html lang="en">
<head>
   <meta charset="utf-8">

   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" type="text/css" href="/ilw/resources/css/bootstrap.min.css">
   <link rel="stylesheet" type="text/css" href="/ilw/resources/css/bootstrap-responsive.min.css">

   <title>Login</title>

   <style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }

    </style>

</head>
<body>

<div class="container">
<?php $attributes = array('class' => 'form-signin');
echo form_open('admin', $attributes); ?>

<p><h2 class="form-signin-heading">"EASE"</h2><p>

<p>
   <input type="text" name="username" class="input-block-level" value="" id="username" placeholder="Username" autofocus /></p>

<p>
   <input type="password" name="password" class="input-block-level" value="" id="password" placeholder="Password" /></p>

<p>
   <input type="submit" class="btn btn-large btn-primary" name="submit" value="Login"  /></p>

<?php echo form_close(); ?>

<?php echo validation_errors(); ?>
</div>


</body>
</html>

