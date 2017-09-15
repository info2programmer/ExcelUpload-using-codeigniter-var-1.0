<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php echo $head; ?>
</head>
<body>
<section id="topbar">
  <?php echo $header; ?>
</section>
<!-------------------Topbar ----------------------------------------------------------------->
<section id="dashboardbody">
  <div class="container">
    <div class="row">
      <div class="col-md-3 column" style="padding-top:20px;">
        <?php echo $left_sidebar; ?>
      </div>
      <div class="col-md-9" style="padding-top:20px;">
        <?php echo $maincontent; ?>
      </div>
    </div>
  </div>
</section>
<!-------------------Dashboardbody ----------------------------------------------------------------->
<section id="footbar">
  <?php echo $footer; ?>
</section>
<!-------------------Footer ----------------------------------------------------------------->
</body>
</html>
