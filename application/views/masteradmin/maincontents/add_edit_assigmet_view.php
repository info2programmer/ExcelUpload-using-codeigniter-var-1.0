<h3 class="alert alert-info"><?php echo $action; ?> Assigment Details</h3>
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
        <label class="control-label col-sm-3" for="txtAssigmentName" >Assigment Name</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" id="txtAssigmentName"  name="txtAssigmentName" value="<?php echo $txtAssigmentName; ?>" placeholder="Enter Assigment Name" autofocus required>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-3" for="txtFromDate" >From Date</label>
        <div class="col-sm-9">
          <input type="date" class="form-control" id="txtFromDate"  name="txtFromDate" value="<?php echo $txtFromDate; ?>" autofocus required>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-3" for="txtTodate" >To Date</label>
        <div class="col-sm-9">
          <input type="date" class="form-control" id="txtTodate"  name="txtTodate" value="<?php echo $txtTodate; ?>" autofocus required>
        </div>
      </div>
  
      <div class="form-group">
        <div class="col-sm-offset-3 col-sm-9">
          <button type="submit" class="btn btn-success"><?php echo $action; ?> Assigmet</button>
        </div>
      </div>
    <?php echo form_close(); ?>
