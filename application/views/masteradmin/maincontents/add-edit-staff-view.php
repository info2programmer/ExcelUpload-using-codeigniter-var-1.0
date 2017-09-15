<h3 class="alert alert-info"><?php echo $action; ?> Staff Details</h3>
<?php $attributes = array('class' => 'form-horizontal', 'id' => 'myform'); echo form_open_multipart('',$attributes); ?>  
<?php
if($row)
{
	$staff_name = $row->staff_name;
	$staff_phone = $row->staff_phone;
	$staff_email = $row->staff_email;
	$staff_address = $row->staff_address;
}
else
{
	$staff_name = '';
	$staff_phone = '';
	$staff_email = '';
	$staff_address = '';
}
?>
	<input type="hidden" name="mode" value="tab" />
      <div class="form-group">
        <label class="control-label col-sm-3" for="staff_name" >Staff Name</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" id="staff_name"  name="staff_name" value="<?php echo $staff_name; ?>" autofocus>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-3" for="staff_phone" >Staff Phone</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" id="staff_phone"  name="staff_phone" value="<?php echo $staff_phone; ?>" autofocus>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-3" for="staff_email" >Staff Email</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" id="staff_email"  name="staff_email" value="<?php echo $staff_email; ?>" autofocus>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-3" for="staff_address" >Staff Address</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" id="staff_address"  name="staff_address" value="<?php echo $staff_address; ?>" autofocus>
        </div>
      </div>
      
  
      <div class="form-group">
        <div class="col-sm-offset-3 col-sm-9">
          <button type="submit" class="btn btn-success"><?php echo $action; ?> Staff</button>
        </div>
      </div>
</form>
