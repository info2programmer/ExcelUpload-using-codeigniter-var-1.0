<div class="container">
    <div class="row">
        <div class="col-md-3">
            <!-- column1, Vertical Dropdown Menu -->
            <div id="main-menu" class="list-group">
            	<a href="<?php echo base_url(); ?>masteradmin/user" class="list-group-item <?php if($this->uri->segment(1)=='masteradmin' && $this->uri->segment(2)=='user' && $this->uri->segment(3)=='') { ?>active<?php } ?>">Dashboard</a>
                
                <a href="#sub-menu" class="list-group-item" data-toggle="collapse" data-parent="#main-menu" <?php if($this->uri->segment(3)=='change_password') { ?>aria-expanded="true"<?php } ?>>Account Setting <span class="caret"></span></a>
                
                <div class="collapse list-group-level1 <?php if($this->uri->segment(3)=='change_password' || $this->uri->segment(3)=='company_setting') { ?>in<?php } ?>" id="sub-menu">
                    <a href="<?php echo base_url(); ?>masteradmin/user/change_password" class="list-group-item <?php if($this->uri->segment(1)=='masteradmin' && $this->uri->segment(2)=='user' && $this->uri->segment(3)=='change_password') { ?>active<?php } ?>" data-parent="#sub-menu">Change Password</a>
                    <a href="<?php echo base_url(); ?>masteradmin/user/company_setting" class="list-group-item <?php if($this->uri->segment(1)=='masteradmin' && $this->uri->segment(2)=='user' && $this->uri->segment(3)=='company_setting') { ?>active<?php } ?>" data-parent="#sub-menu">Company Setting</a>
                    <!--<a href="#sub-sub-menu" class="list-group-item" data-toggle="collapse" data-parent="#sub-menu">Sub Item 3 <span class="caret"></span></a>
                    <div class="collapse list-group-level2" id="sub-sub-menu">
                        <a href="#" class="list-group-item" data-parent="#sub-sub-menu">Sub Sub Item 1</a>
                        <a href="#" class="list-group-item" data-parent="#sub-sub-menu">Sub Sub Item 2</a>
                        <a href="#" class="list-group-item" data-parent="#sub-sub-menu">Sub Sub Item 3</a>
                    </div>-->
                </div>
                
                <a href="<?php echo base_url(); ?>masteradmin/assigment" class="list-group-item <?php if($this->uri->segment(1)=='masteradmin' && $this->uri->segment(2)=='assigment') { ?>active<?php } ?>">Assigment</a>
                <a href="<?php echo base_url(); ?>masteradmin/group" class="list-group-item <?php if($this->uri->segment(1)=='masteradmin' && $this->uri->segment(2)=='group') { ?>active<?php } ?>">Group</a>
                <a href="<?php echo base_url(); ?>masteradmin/agent" class="list-group-item <?php if($this->uri->segment(1)=='masteradmin' && $this->uri->segment(2)=='agent') { ?>active<?php } ?>">Agent</a>
                <a href="<?php echo base_url(); ?>masteradmin/job" class="list-group-item <?php if($this->uri->segment(1)=='masteradmin' && $this->uri->segment(2)=='job') { ?>active<?php } ?>">Job Assign</a>
                <a href="<?php echo base_url(); ?>masteradmin/point" class="list-group-item <?php if($this->uri->segment(1)=='masteradmin' && $this->uri->segment(2)=='point') { ?>active<?php } ?>">Points</a>

                <a href="<?php echo base_url(); ?>masteradmin/check" class="list-group-item <?php if($this->uri->segment(1)=='masteradmin' && $this->uri->segment(2)=='check') { ?>active<?php } ?>">Check Errors</a>
            </div>    
        </div>
    </div>
</div>
