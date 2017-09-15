<h4><i class="fa fa-plus-square-o"></i> Jobs </h4>
<h3 class="alert alert-info">List Of Jobs</h3>
<a href="<?php echo base_url(); ?>masteradmin/job/create">
<button class="btn btn-danger">Add New Jobs</button>
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
      <th width="303">Group Name</th>
      <th width="303">Agent Name</th>
      <th width="25">Assign To</th>
      <th width="25">Assign From</th>
      <th width="181">Excel File</th>
    </tr>
  </thead>
  <tbody>
  <?php
  if($postjob_data) { $s=1;
  	foreach($postjob_data as $row) {
  ?>
    <tr>
      <td><?php echo $s++; ?></td>
      <td><?php echo $row->assigment_name;?></td>
      <td><?php echo $row->group_name;?></td>
      <td><?php echo $row->agent_name;?></td>
      <td><?php echo $row->maxid;?></td>
      <td><?php echo $row->minid;?></td>
      <td align="center" valign="middle">
      	<a target="_blank" href="<?php echo base_url();?>uploads/excel/<?php echo $row->excel_file_name; ?>" onclick="return confirm('Do you Download?');">
        <button class="btn btn-success btn-md"><i class="fa fa-file-excel-o" aria-hidden="true"></i></button>
        </a>
      </td>
    </tr>
  <?php } } else { ?>
  	<tr>
    	<td colspan="7" align="center">No Job found</td>
    </tr>
  <?php } ?>  
  </tbody>
</table>
