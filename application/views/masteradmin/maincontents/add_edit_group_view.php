<h3 class="alert alert-info"><?php echo $action; ?> Assigment Details</h3>
<?php $attributes = array('class' => 'form-horizontal', 'id' => 'myform'); echo form_open_multipart('',$attributes); ?>  
<?php
if($row)
{
	$txtGroupName = $row->group_name;
}
else
{
	$txtGroupName ='';
  
}
?>
	 <input type="hidden" name="mode" value="tab" />
      <div class="form-group">
        <label class="control-label col-sm-3" for="txtGroupName" >Group Name</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" id="txtGroupName"  name="txtGroupName" value="<?php echo $txtGroupName; ?>" placeholder="Enter Group Name" autofocus required>
        </div>
      </div>
      
     
  
      <div class="form-group">
        <div class="col-sm-offset-3 col-sm-9">
          <button type="submit" class="btn btn-success"><?php echo $action; ?> Group</button>
        </div>
      </div>
    <?php echo form_close(); ?>
