<h3 class="alert alert-info"><?php echo $action; ?> Agent Details</h3>
<?php $attributes = array('class' => 'form-horizontal', 'id' => 'myform'); echo form_open_multipart('',$attributes); ?>  
<?php
if($row)
{
	$txtAgentName = $row->agent_name;
  $txtDateOfBirth =$row->agent_dob;
  $txtAgentEmail =$row->agent_email;
  $txtAgentPhoneNumber =$row->agent_phone;
  $txtUserName =$row->agent_username;
  $ddlGroup=$row->group_id ;
  $txtLoginTime=$row->login_time;
  $txtLogoutTime=$row->logout_time;
}
else
{
  $txtAgentName ='';
  $txtDateOfBirth ='';
  $txtAgentEmail ='';
  $txtAgentPhoneNumber ='';
	$txtUserName ='';
  $ddlGroup='';
  $txtLoginTime='';
  $txtLogoutTime='';

  
}
?>
	 <input type="hidden" name="mode" value="tab" />
      <div class="form-group">
        <label class="control-label col-sm-3" for="txtAgentName" >Agent Name</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" id="txtAgentName"  name="txtAgentName" value="<?php echo $txtAgentName; ?>" placeholder="Enter Agent Name" autofocus required>
          <span class="text-danger"><?php echo form_error('txtAgentName'); ?></span>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-3" for="txtDateOfBirth" >Agent Date of Birth</label>
        <div class="col-sm-9">
          <input type="date" class="form-control" id="txtDateOfBirth"  name="txtDateOfBirth" value="<?php echo $txtDateOfBirth; ?>" placeholder="Enter Agent Date Of Birth" autofocus required>
          <span class="text-danger"><?php echo form_error('txtDateOfBirth'); ?></span>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-3" for="txtAgentEmail" >Agent Email</label>
        <div class="col-sm-9">
          <input type="email" class="form-control" id="txtAgentEmail"  name="txtAgentEmail" value="<?php echo $txtAgentEmail; ?>" placeholder="Enter Agent Date Of Birth" autofocus required>
          <span class="text-danger"><?php echo form_error('txtAgentEmail'); ?></span>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-3" for="txtAgentPhoneNumber" >Agent Phone</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" id="txtAgentPhoneNumber"  name="txtAgentPhoneNumber" value="<?php echo $txtAgentPhoneNumber; ?>" placeholder="Enter Agent Phone Number" autofocus required>
          <span class="text-danger"><?php echo form_error('txtAgentPhoneNumber'); ?></span>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-3" for="txtLoginTime" >Login Time</label>
        <div class="col-sm-9">
          <input type="time" class="form-control" id="txtLoginTime"  name="txtLoginTime" value="<?php echo $txtLoginTime; ?>" placeholder="Enter Login Time" autofocus required>
          <span class="text-danger"><?php echo form_error('txtLoginTime'); ?></span>
        </div>

      </div>
      <div class="form-group">
        <label class="control-label col-sm-3" for="txtLogoutTime" >Logout Time</label>
        <div class="col-sm-9">
          <input type="time" class="form-control" id="txtLogoutTime"  name="txtLogoutTime" value="<?php echo $txtLogoutTime; ?>" placeholder="Enter Logout Time" autofocus required>
          <span class="text-danger"><?php echo form_error('txtLogoutTime'); ?></span>
        </div>
      </div>

      <?php if($action!="Edit"): ?>
      <div class="form-group">
        <label class="control-label col-sm-3" for="txtUserName" >Agent Username</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" id="txtUserName"  name="txtUserName" value="<?php echo $txtUserName; ?>" placeholder="Enter Agent UserName" autofocus required>
          <span class="text-danger"><?php echo form_error('txtUserName'); ?></span>
        </div>
      </div>
     <?php endif; ?>
      <div class="form-group">
        <label class="control-label col-sm-3" for="txtPassword" >Agent Password</label>
        <div class="col-sm-9">
          <input type="password" class="form-control" id="txtPassword"  name="txtPassword" value="" placeholder="Enter Password" autofocus >
          <span class="text-danger"><?php echo form_error('txtPassword'); ?></span>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-3" for="ddlGroup" >Select Group</label>
        <div class="col-sm-9">
          <select class="form-control"  name="ddlGroup" required>
            <option value="">Select Group</option>
            <?php foreach($grouplist as $list): ?>
                <option value="<?php echo $list->group_id ?>" <?php if($ddlGroup==$list->group_id){ ?> selected="selected" <?php } ?> ><?php echo $list->group_name ?></option>
            <?php endforeach; ?>
          </select>
          <span class="text-danger"><?php echo form_error('ddlGroup'); ?></span>
        </div>
      </div>
  
      <div class="form-group">
        <div class="col-sm-offset-3 col-sm-9">
          <button type="submit" class="btn btn-success"><?php echo $action; ?> Agent</button>
        </div>
      </div>
    <?php echo form_close(); ?>
