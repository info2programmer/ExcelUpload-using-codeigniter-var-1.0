<h4><i class="fa fa-plus-square-o"></i> Agent </h4>
<h3 class="alert alert-info">List Of Agent</h3>
<a href="<?php echo base_url(); ?>masteradmin/agent/create">
<button class="btn btn-danger">Add New Agent</button>
</a>
<div class="form-agent pull-right">
  <label class="control-label col-sm-3" for="search" style="padding-top:5px;">Search</label>
  <div class="col-sm-9">
    <input type="text" class="form-control" id="search"  name="search">
  </div>
</div>
<?php if($this->session->userdata('success_message')) { ?>
<h5 class="alert alert-success"><?php echo $this->session->userdata('success_message'); ?></h5>
<?php } ?>
<br/>
<table width="1199" class="table table-bordered">
  <thead>
    <tr>
      <th width="54">Sl #</th>
      <th width="303">Agent Name</th>
      <th width="303">Date Of Birth</th>
      <th width="303">Email</th>
      <th width="181">Phone</th>
      <th width="303">Status</th>
    </tr>
  </thead>
  <tbody>
  <?php
  if($rows) { $s=1;
  	foreach($rows as $row) {
  ?>
    <tr>
      <td><?php echo $s++; ?></td>
      <td><?php echo $row->agent_name;?></td>
      <td><?php echo $row->agent_dob;?></td>
      <td><?php echo $row->agent_email;?></td>
      <td><?php echo $row->agent_phone;?></td>
      <td align="center" valign="middle">
      	<a href="<?php echo base_url();?>masteradmin/agent/edit/<?php echo $row->agent_id; ?>" onclick="return confirm('Do you want to edit?');">
        <button class="btn btn-primary btn-xs">Edit</button>
        </a>
        <?php if($row->status==1) { ?>
        <a href="<?php echo base_url();?>masteradmin/agent/changestatus/<?php echo $row->agent_id; ?>/0" onclick="return confirm('Do you want to deactive?');"><button class="btn btn-success btn-xs">Active</button></a>
        <?php } else { ?>
        <a href="<?php echo base_url();?>masteradmin/agent/changestatus/<?php echo $row->agent_id; ?>/1" onclick="return confirm('Do you want to active?');"><button class="btn btn-danger btn-xs">Deactive</button></a>
        <?php } ?>
        <?php if ($row->islogin): ?>
          <a href="<?php echo base_url();?>masteradmin/agent/loginactive/<?php echo $row->agent_id; ?>" onclick="return confirm('Do you want to active?');"><button class="btn btn-warning btn-xs">Active Credential</button></a>
        <?php endif ?>
      </td>
    </tr>
  <?php } } else { ?>
  	<tr>
    	<td colspan="6" align="center">No Agent found</td>
    </tr>
  <?php } ?>  
  </tbody>
</table>

