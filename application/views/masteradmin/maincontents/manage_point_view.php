<h4><i class="fa fa-plus-square-o"></i> Points </h4>
<h3 class="alert alert-info">List Of Points</h3>
<a href="<?php echo base_url(); ?>masteradmin/point/create">
<button class="btn btn-danger">Add New Points</button>
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
      <th width="303">Assigment Name</th>
      <th width="303">Point</th>
      <th width="181">Publish On</th>
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
      <td><?php echo $row->assigment_name;?></td>
      <td><?php echo $row->point;?></td>
      <td><?php echo $row->publist_on;?></td>
    </tr>
  <?php } } else { ?>
  	<tr>
    	<td colspan="5" align="center">No Points found</td>
    </tr>
  <?php } ?>  
  </tbody>
</table>

