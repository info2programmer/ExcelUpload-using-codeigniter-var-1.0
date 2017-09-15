<h3 class="alert alert-info"> Change Password </h3>
<?php $attributes = array('class' => 'form-horizontal', 'id' => 'myform'); echo form_open_multipart('',$attributes); ?>
  <input type="hidden" name="mode" value="change_pass" />
  <div class="form-group">
    <label class="control-label col-sm-4" for="old_password">Old Password</label>
    <div class="col-sm-8">
      <input type="password" class="form-control" id="old_password"  name="old_password" autofocus>
      <span style="color:#FF0000;"><?php echo form_error('old_password'); ?></span>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-4" for="new_password">New Password</label>
    <div class="col-sm-8">
      <input type="password" class="form-control" id="new_password"  name="new_password" autofocus>
      <span style="color:#FF0000;"><?php echo form_error('new_password'); ?></span>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-4" for="confirm_password">Confirm Password</label>
    <div class="col-sm-8">
      <input type="password" class="form-control" id="confirm_password"  name="confirm_password" autofocus>
      <span style="color:#FF0000;"><?php echo form_error('confirm_password'); ?></span>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-4 col-sm-8">
      <button type="submit" class="btn btn-success">Change Password</button>
    </div>
  </div>
</form>