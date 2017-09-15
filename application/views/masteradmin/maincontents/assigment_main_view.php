<h4><i class="fa fa-plus-square-o"></i> Assigment </h4>
<!-- <span style="color:#00CC00;">
<?php //if($this->session->flashdata('success_message')) { echo $this->session->flashdata('success_message'); } ?>
</span>
<form class="form-horizontal" method="post" action="<?php //echo base_url();?>masteradmin/assigment/createassigment/">
<div class="form-group">
    <label class="control-label col-sm-3">Assigment Name</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="txtAssigmentName" name="txtAssigmentName" value="" placeholder="Enter Assigment Name" required>
    </div>
</div>
<div class="form-group">
    <label class="control-label col-sm-3">From Date</label>
    <div class="col-sm-9">
      <input type="date" class="form-control" id="txtFromDate" name="txtFromDate" value="" placeholder="Enter From-Date" required>
    </div>
</div>
<div class="form-group">
    <label class="control-label col-sm-3">To Date</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="txtToDate" name="txtToDate" value="" placeholder="Enter To-Date" >
    </div>
</div>
 <div class="form-group">
    <div class="col-sm-offset-9 col-sm-3">
      <button type="submit" class="btn btn-success">Save</button>
    </div>
  </div>
</from>
<hr class="style5"> -->

<h3 class="alert alert-info">List Of Assigment</h3>
<a href="<?php echo base_url(); ?>masteradmin/assigment/createassigment">
<button class="btn btn-danger">Add New Assigment</button>
</a>
<div class="form-group pull-right">
  <label class="control-label col-sm-3" for="search" style="padding-top:5px;">Search</label>
  <div class="col-sm-9">
    <input type="text" class="form-control" id="search"  name="search">
  </div>
</div>
<?php if($this->session->userdata('success_message')) { ?>
<h5 class="alert alert-success"><?php echo $this->session->userdata('success_message'); ?></h5>
<?php } ?>
<table width="1199" class="table table-bordered">
  <thead>
    <tr>
      <th width="54">Sl #</th>
      <th width="303">Assigment Name</th>
      <th width="303">From Date</th>
      <th width="303">To Date</th>
      <th width="181">Status</th>
    </tr>
  </thead>
  <tbody>
  <?php
  if($rows) { $s=1;
  	foreach($rows as $row) {
  ?>
    <tr>
      <td><?php echo $s++; ?></td>
      <td><?php echo $row->assigment_name;?></td>
      <td><?php echo $row->from_date;?></td>
      <td><?php echo $row->to_date;?></td>
      <td align="center" valign="middle">
      	<a href="<?php echo base_url();?>masteradmin/assigment/edit/<?php echo $row->assigment_id; ?>" onclick="return confirm('Do you want to edit?');">
        <button class="btn btn-primary btn-xs">Edit</button>
        </a>
        <?php if($row->status==1) { ?>
        <a href="<?php echo base_url();?>masteradmin/assigment/changestatus/<?php echo $row->assigment_id; ?>/0" onclick="return confirm('Do you want to deactive?');"><button class="btn btn-success btn-xs">Active</button></a>
        <?php } else { ?>
        <a href="<?php echo base_url();?>masteradmin/assigment/changestatus/<?php echo $row->assigment_id; ?>/1" onclick="return confirm('Do you want to active?');"><button class="btn btn-danger btn-xs">Deactive</button></a>
        <?php } ?>
      </td>
    </tr>
  <?php } } else { ?>
  	<tr>
    	<td colspan="5" align="center">No staffs found</td>
    </tr>
  <?php } ?>  
  </tbody>
</table>

