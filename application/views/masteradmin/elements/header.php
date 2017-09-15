<div class="container">
  <div class="row">
    <div class="col-md-9"> <img src="<?php echo base_url();?>material/images/logo4_platter.png" width="300" /> </div>
    <div class="col-md-3" style="padding-top:15px;">
      <h4 style="font-family: 'Oswald', sans-serif; text-align:right; font-size:18px;" class="spacing"><i class="fa fa-user"></i> Welcome <?php echo $this->session->userdata('username');?> | 
      <a href="<?php echo base_url();?>masteradmin/user/logout" style="color:rgb(239, 56, 55); text-decoration:none;"><i class="fa fa-sign-out"></i> Log Out</a>
      </h4>
    </div>
  </div>
</div>
