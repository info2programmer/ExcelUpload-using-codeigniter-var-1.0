<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>DATADIGITIZATION</title>

<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="css/style.css" />
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/bootstrap-theme.min.css" />
<link rel="stylesheet" href="css/bootstrap.css" />
<link rel="stylesheet" href="css/font-awesome.min.css" />
<link href="https://fonts.googleapis.com/css?family=Pavanam" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">

<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/npm.js"></script>

<!---For Navbar -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!---For Navbar -->
</head>

<body>

<div class="container">
	<div class="row">
    	<div class="col-md-4"></div>
		
        <div class="col-md-4 wellash" style="margin-top:150px; height:270px; background-color:#999999; color:#000000; padding-top:50px;">
        <span style="color: red;padding-left: 45px;">
        <?php
		if($this->session->flashdata('error_message')){
			echo $this->session->flashdata('error_message');
		}
		?>
        </span>
                    <form class="form-signin text-center" method="post" action="<?php echo base_url();?>user/login">
                    <input type="hidden" name="mode" value="login" />
                    <label>AGENT LOGIN</label>
                    <input type="text" name="username" id="inputUsername" class="form-control" style="border-radius:0px;"  required >
                            
                    <label>PASSWORD</label>
                    <input type="password" name="password" id="inputPassword" class="form-control" style="border-radius:0px;" required><br />
            
                    <button class=" btn btn-success  btn-block" type="submit" style="background-color:#666666; color:#000000; border:none; font-weight:bold; border-radius:0px;">SUBMIT</button>
                    </form>
        </div>

		<div class="col-md-4"></div>
	</div>
</div>



</body>
</html>


