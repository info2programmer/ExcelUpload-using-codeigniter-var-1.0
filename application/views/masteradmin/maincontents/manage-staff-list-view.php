<h3 class="alert alert-info">List of Staffs</h3>
<a href="<?php echo base_url(); ?>masteradmin/manage_staff/add">
<button class="btn btn-danger">Add New Staff</button>
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
      <th width="303">Staff Name</th>
      <th width="303">Staff Phone</th>
      <th width="303">Staff Email</th>
      <th width="181">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php
  if($rows) { $s=1;
  	foreach($rows as $row) {
  ?>
    <tr>
      <td><?php echo $s++; ?></td>
      <td><?php echo $row->staff_name;?></td>
      <td><?php echo $row->staff_phone;?></td>
      <td><?php echo $row->staff_email;?></td>
      <td align="center" valign="middle">
      	<a href="<?php echo base_url();?>masteradmin/manage_staff/edit/<?php echo $row->staff_id; ?>" onclick="return confirm('Do you want to edit?');">
        <button class="btn btn-primary btn-xs">Edit</button>
        </a>
        <?php if($row->published==1) { ?>
        <a href="<?php echo base_url();?>masteradmin/manage_staff/deactive/<?php echo $row->staff_id; ?>" onclick="return confirm('Do you want to deactive?');"><button class="btn btn-success btn-xs">Active</button></a>
        <?php } else { ?>
        <a href="<?php echo base_url();?>masteradmin/manage_staff/active/<?php echo $row->staff_id; ?>" onclick="return confirm('Do you want to active?');"><button class="btn btn-danger btn-xs">Deactive</button></a>
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
