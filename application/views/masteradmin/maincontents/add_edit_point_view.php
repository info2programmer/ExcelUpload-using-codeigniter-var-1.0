<h3 class="alert alert-info"><?php echo $action; ?> Points Details</h3>
<?php $attributes = array('class' => 'form-horizontal', 'id' => 'myform'); echo form_open_multipart('',$attributes); ?>  
<?php
if($row)
{
	$txtAssigmentName = $row->assigment_name;
	$txtFromDate = $row->from_date;
	$txtTodate = $row->to_date;
}
else
{
	$txtAssigmentName ='';
  $txtFromDate = '';
  $txtTodate = '';
}
?>
<input type="hidden" name="mode" value="tab" />
<div class="form-group">
  <label class="control-label col-sm-3" for="ddlAsigment" >Select Assigment</label>
  <div class="col-sm-9">
    <select name="ddlAsigment" required class="form-control">
      <option value="" selected="selected" hidden>Select Assigment</option>
      <?php foreach($assigmentlist as $data): ?>
        <option value="<?php echo $data->assigment_id; ?>"><?php echo $data->assigment_name ?></option>
      <?php endforeach; ?> 
    </select>
  </div>
</div>
<div class="form-group">
  <label class="control-label col-sm-3" for="ddlGroup">Select Group</label>
  <div class="col-sm-9">
  <select class="form-control" name="ddlGroup" id="ddlGroup" required >
      <option value="" selected="selected" hidden>Select Group</option>
      <?php foreach($grouplist as $list): ?>
        <option value="<?php echo $list->group_id ?>"><?php echo $list->group_name ?></option>
      <?php endforeach; ?>
    </select>
  </div>
</div>
<div class="form-group">
  <label class="control-label col-sm-3" for="txtPoints">Enter Points</label>
  <div class="col-sm-9">
  <input type="text" name="txtPoints" class="form-control" required placeholder="Enter Points">
  </div>
</div>

<div class="form-group">
  <div class="col-sm-offset-3 col-sm-9">
    <button type="submit" class="btn btn-success"><?php echo $action; ?> Points</button>
  </div>
</div>
<?php echo form_close(); ?>
