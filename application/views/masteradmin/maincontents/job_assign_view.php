<h3 class="alert alert-info">Assign Jobs</h3>
<?php $attributes = array('class' => 'form-horizontal', 'id' => 'myform'); echo form_open_multipart('',$attributes); ?>  
<input type="hidden" name="mode" value="tab"  />
<div class="form-group">
	<label class="control-label col-sm-3" for="ddlAssignment" >Select Assigment</label>
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
		<select class="form-control" name="ddlGroup" id="ddlGroup" required onchange="getagentbygroupid(this.value)">
			<option value="" selected="selected" hidden>Select Group</option>
			<?php foreach($grouplist as $list): ?>
				<option value="<?php echo $list->group_id ?>"><?php echo $list->group_name ?></option>
			<?php endforeach; ?>
		</select>
	</div>
</div>
<div class="form-group">
	<label class="control-label col-sm-3" for="ddlAgent" >Select Agent</label>
	<div class="col-sm-9">
		<select class="form-control" name="ddlAgent" id="ddlAgent" required >
			<option value="">Select Agent</option>
		</select>
	</div>
</div>
<div class="form-group">
	<label class="control-label col-sm-3" for="fileImage" >Select Data</label>
	<div class="col-sm-9">
		<input type="file" name="fileImage" class="form-control" required>
	</div>
</div>
<div class="form-group">
	<div class="form-group">
        <div class="col-sm-offset-3 col-sm-9">
          <button type="submit" class="btn btn-success">Post Job</button>
        </div>
      </div>
</div>
<?php form_close(); ?>
<script type="text/javascript">
	function getagentbygroupid(value){
		// var stream=value;
    // alert(stream);
    if(value!="")
    {
    	var xmlhttp = new XMLHttpRequest();
    	xmlhttp.onreadystatechange = function() {
    		if (this.readyState == 4 && this.status == 200) {
    			document.getElementById("ddlAgent").innerHTML = this.responseText;
          // alert(this.responseText);
      }
  };
  var url="<?php echo base_url();?>masteradmin/job/getagentbygroupid/"+value;
  xmlhttp.open("GET", url, true);
  xmlhttp.send();
}
}
</script>
