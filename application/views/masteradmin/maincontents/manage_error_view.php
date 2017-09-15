<h3 class="alert alert-info">Check Errors</h3>
<form action="<?php echo base_url(); ?>masteradmin/check/index" method="post" enctype="multipart/form-data" >
<input type="hidden" name="mode" value="post">
<div class="form-group pull-center" style="padding: 2px;">
    <label class="control-label col-sm-3" for="search" style="padding-top:5px;">Search</label>
    <div class="col-sm-9">
     <select name="ddlAsigment" required class="form-control">
            <option value="" selected="selected" hidden>Select Assigment</option>
            <?php foreach($assigmentlist as $data): ?>
              <option value="<?php echo $data->assigment_id; ?>"><?php echo $data->assigment_name ?></option>
            <?php endforeach; ?> 
      </select>
    </div>
</div> 
<br/>
 <div class="form-group pull-center" style="padding: 2px;">
  <label class="control-label col-sm-3" for="search" style="padding-top:5px;">Select Group</label>
  <div class="col-sm-9">
    <select class="form-control" name="ddlGroup" id="ddlGroup" required onchange="getagentbygroupid(this.value)">
      <option value="" selected="selected" hidden>Select Group</option>
      <?php foreach($grouplist as $list): ?>
        <option value="<?php echo $list->group_id ?>"><?php echo $list->group_name ?></option>
      <?php endforeach; ?>
    </select>
  </div>
</div> 
<br/>
 <div class="form-group pull-center" style="padding: 2px;">
  <label class="control-label col-sm-3" for="search" style="padding-top:5px;">Select Agent</label>
  <div class="col-sm-9">
    <select class="form-control" name="ddlAgent" id="ddlAgent" required >
      <option value="">Select Agent</option>
    </select>
  </div>
</div> 
<br/><br/>
<p align="center"><button type="submit" class="btn btn-success btn-lg">Search</button></p>
</form>

<?php if ($rows){ 
$s=1;
  ?>

<table width="1199" class="table table-bordered">
  <thead>
    <tr>
      <th width="54">Sl #</th>
      <th width="303">Assigment</th>
      <th width="303">Group</th>
      <th width="303">Agent</th>
      <th width="181">Number Of Error</th>
      <th width="181">Date</th>
    </tr>
  </thead>
  <tbody>
  <?php  
    foreach($rows as $row) {
  ?>
    <tr>
      <td><?php echo $s++; ?></td>
      <td><?php echo $row->assigment_name;?></td>
      <td><?php echo $row->group_name;?></td>
      <td><?php echo $row->agent_name;?></td>
      <td>
      		<a href="<?php echo base_url();?>masteradmin/check/error_detail/<?php echo $row->record_id; ?>" target="_blank" style="text-decoration:none;"><span class="label label-danger"><?php echo $row->error_count;?></span></a>
      </td>
      <td><?php echo date_format(date_create($row->save_date),"d-m-Y");?></td>
    </tr>
  <?php } ?> 
  </tbody>
</table>
<?php } ?>

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
