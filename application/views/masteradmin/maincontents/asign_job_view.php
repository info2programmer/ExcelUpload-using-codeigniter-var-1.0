<h3 class="alert alert-info"><?php echo $action; ?> Assign Job Details</h3>
<?php $attributes = array('class' => 'form-horizontal', 'id' => 'myform'); echo form_open_multipart('',$attributes); ?>  
	 <input type="hidden" name="mode" value="tab" />
      <div class="form-group">
        <label class="control-label col-sm-3" for="txtAssigmentName" >Select Assigment</label>
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
        <label class="control-label col-sm-3" for="txtFromDate" >Select Agent</label>
        <div class="col-sm-9">
          <select name="ddlAsigment" required class="form-control">
          	<option value="">Select Agent</option>
          	<?php foreach($agentlist as $data): ?>
          		<option value="<?php echo $data->agent_id; ?>"><?php echo $data->agent_name ?></option>
          	<?php endforeach; ?> 
          </select>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-3" for="txtFromDate" >Select Agent</label>
        <div class="col-sm-9">
         <input type="file" name="fileData" class="form-control"> 
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-offset-3 col-sm-9">
          <button type="submit" class="btn btn-success"><?php echo $action; ?> Assigmet</button>
        </div>
      </div>
    <?php echo form_close(); ?>
