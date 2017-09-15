<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PLATTER - ADMIN PANEL</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="<?php echo base_url();?>material/css/style.css" />
<link rel="stylesheet" href="<?php echo base_url();?>material/css/bootstrap.min.css" />
<link rel="stylesheet" href="<?php echo base_url();?>material/css/bootstrap-theme.min.css" />
<link rel="stylesheet" href="<?php echo base_url();?>material/css/bootstrap.css" />
<link rel="stylesheet" href="<?php echo base_url();?>material/css/font-awesome.min.css" />
<link href="https://fonts.googleapis.com/css?family=Pavanam" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Crimson+Text|Merriweather|Oswald" rel="stylesheet">
<script src="<?php echo base_url();?>material/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>material/js/bootstrap.js"></script>
<script src="<?php echo base_url();?>material/js/npm.js"></script>
<!-------------------For Navbar ----------------------------------------------------------------->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-------------------For Navbar ----------------------------------------------------------------->

<script type="text/javascript" src="<?php echo base_url();?>material/jquery-ui.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>material/jquery-ui.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>material/jquery-ui.theme.css" />

<link href="<?php echo base_url();?>material/jquery.bootstrap-touchspin.css" rel="stylesheet" type="text/css" media="all">
<!--<link href="<?php echo base_url();?>material/demo.css" rel="stylesheet" type="text/css" media="all">-->
<script src="<?php echo base_url();?>material/jquery.bootstrap-touchspin.js"></script>

<link rel="stylesheet" href="<?php echo base_url();?>material/css/styles.css">
<script src="<?php echo base_url();?>material/js/script.js"></script>

<script type="text/javascript">
$(document).ready(function() {
	$( "#pincode" ).autocomplete({
	<?php
	$cust_details = $this->db->query("select DISTINCT pincode as client from td_pincode")->result();
	$cust_name = array();
	if($cust_details) { 
	foreach($cust_details as $cust_detail)
	{
		$cust_name[] = "\"".$cust_detail->client."\"";
	}
	}
	if($cust_details) { 
	?>	
  	source: [<?php echo implode(",", $cust_name); ?>],
	<?php  } ?>
	
	})
});

</script>

<script type="text/javascript">
$(document).ready(function() {
	$( "#district" ).autocomplete({
	<?php
	$cust_details = $this->db->query("select DISTINCT district_name as client from td_states")->result();
	$cust_name = array();
	if($cust_details) { 
	foreach($cust_details as $cust_detail)
	{
		$cust_name[] = "\"".$cust_detail->client."\"";
	}
	}
	if($cust_details) { 
	?>	
  	source: [<?php echo implode(",", $cust_name); ?>],
	<?php  } ?>
	
	})
});
</script>

<script type="text/javascript">
$(document).ready(function() {
	$( "#state" ).autocomplete({
	<?php
	$cust_details = $this->db->query("select DISTINCT state_name as client from td_states")->result();
	$cust_name = array();
	if($cust_details) { 
	foreach($cust_details as $cust_detail)
	{
		$cust_name[] = "\"".$cust_detail->client."\"";
	}
	}
	if($cust_details) { 
	?>	
  	source: [<?php echo implode(",", $cust_name); ?>],
	<?php  } ?>
	
	})
});
</script>

