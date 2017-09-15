<h3 class="alert alert-info"><?php echo $action; ?> Department Details</h3>
<?php $attributes = array('class' => 'form-horizontal', 'id' => 'myform'); echo form_open_multipart('',$attributes); ?>  
<?php
if($row)
{
	$department_name = $row->department_name;
}
else
{
	$department_name = '';
}
?>
	<input type="hidden" name="mode" value="tab" />
      <div class="form-group">
        <label class="control-label col-sm-3" for="department_name" >Name of the Department</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" id="department_name"  name="department_name" value="<?php echo $department_name; ?>" autofocus>
        </div>
      </div>
      
  
      <div class="form-group">
        <div class="col-sm-offset-3 col-sm-9">
          <button type="submit" class="btn btn-success"><?php echo $action; ?> Department</button>
        </div>
      </div>
</form>
