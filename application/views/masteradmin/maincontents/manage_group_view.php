<h4><i class="fa fa-plus-square-o"></i> Group </h4>
<h3 class="alert alert-info">List Of Group</h3>
<a href="<?php echo base_url(); ?>masteradmin/group/create">
<button class="btn btn-danger">Add New Group</button>
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
      <th width="303">Group Name</th>
      <th width="303">Created At</th>
      <th width="303">Modified At</th>
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
      <td><?php echo $row->group_name;?></td>
      <td><?php echo $row->create_at;?></td>
      <td><?php echo $row->modify_at;?></td>
      <td align="center" valign="middle">
      	<a href="<?php echo base_url();?>masteradmin/group/edit/<?php echo $row->group_id; ?>" onclick="return confirm('Do you want to edit?');">
        <button class="btn btn-primary btn-xs">Edit</button>
        </a>
        <?php if($row->status==1) { ?>
        <a href="<?php echo base_url();?>masteradmin/group/changestatus/<?php echo $row->group_id; ?>/0" onclick="return confirm('Do you want to deactive?');"><button class="btn btn-success btn-xs">Active</button></a>
        <?php } else { ?>
        <a href="<?php echo base_url();?>masteradmin/group/changestatus/<?php echo $row->group_id; ?>/1" onclick="return confirm('Do you want to active?');"><button class="btn btn-danger btn-xs">Deactive</button></a>
        <?php } ?>
      </td>
    </tr>
  <?php } } else { ?>
  	<tr>
    	<td colspan="5" align="center">No Group found</td>
    </tr>
  <?php } ?>  
  </tbody>
</table>

