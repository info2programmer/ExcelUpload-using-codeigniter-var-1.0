<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PLATTER - MASTER ADMIN PANEL</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="<?php echo base_url();?>material/css/style.css" />
<link rel="stylesheet" href="<?php echo base_url();?>material/css/bootstrap.min.css" />
<link rel="stylesheet" href="<?php echo base_url();?>material/css/bootstrap-theme.min.css" />
<link rel="stylesheet" href="<?php echo base_url();?>material/css/bootstrap.css" />
<link rel="stylesheet" href="<?php echo base_url();?>material/css/font-awesome.min.css" />
<link href="https://fonts.googleapis.com/css?family=Pavanam" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
<script src="<?php echo base_url();?>material/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>material/js/bootstrap.js"></script>
<script src="<?php echo base_url();?>material/js/npm.js"></script>
<!-------------------For Navbar ----------------------------------------------------------------->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-------------------For Navbar ----------------------------------------------------------------->
</head>
<body style="background-color:white;
background-image: linear-gradient(90deg, rgba(200,0,0,.5) 50%, transparent 50%),
linear-gradient(rgba(200,0,0,.2) 50%, transparent 50%);
background-size:200px 200px;">
<div class="container">
  <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4 well" style="margin-top:180px; ">
      <h4 style="font-family: 'Oswald', sans-serif; font-size:25px; color:#FF0000;"><img src="<?php echo base_url();?>material/images/logo4_platter.png" width="200" /></h4>
      <form class="form-signin" method="post" action="<?php echo base_url();?>masteradmin/user/login">
      	<input type="hidden" name="mode" value="login" />
        <h6 class="form-signin-heading" style="color:#0066CC;"><i class="fa fa-lock"></i> Secured Admin Login</h6>
        <label class="sr-only">Username</label>
        <input type="text" name="username" id="inputUsername" class="form-control" placeholder="Username" required autofocus>
        <br />
        <label  class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <label></label>
        <label class="text-danger">
        <?php
		if($this->session->flashdata('error_message')) { echo $this->session->flashdata('error_message'); }
		?>
        </label>
        <button class="btn btn-lg btn-danger btn-block" type="submit">Log In</button>
      </form>
    </div>
  </div>
  <div class="col-md-4" style="height:150px;"></div>
</div>
</div>
<section id="footbar">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center"> Copyright Protected by Suvra Food & Beverages Pvt. Ltd., <?php echo date('Y'); ?>-<?php echo (date('Y')+1); ?>. All Rights Reserved. Powered by PROJUKTI. </div>
    </div>
  </div>
</section>
<!-------------------Footer ----------------------------------------------------------------->
</body>
</html>
