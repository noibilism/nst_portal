<div class="widget widget-gray widget-body-white">
    <div class="widget-head">
        <h3 class="heading">Change Password</h3>
    </div>
    <div class="widget-body">
        <div class="col-md-6">
            <div class="widget widget-4 row">
                <?php echo $this->Form->create('User');?>
                <div class="widget-head"><h4 class="heading">Current Password</h4></div>
                <div class="separator"></div>
                <?php echo $this->Form->input('old_password', array('class'=>'col-md-12 form-control','label'=>false,'placeholder'=>'Type your current password here','type'=>'password')); ?>
            </div>
            <div class="widget widget-4 row">
                <div class="widget-head"><h4 class="heading">New Password</h4></div>
                <div class="separator"></div>
                <?php echo $this->Form->input('password', array('class'=>'col-md-12 form-control','label'=>false,'placeholder'=>'Type your new password here','type'=>'password')); ?>
            </div>
            <div class="widget widget-4 row">
                <div class="widget-head"><h4 class="heading">Confirm New Password</h4></div>
                <div class="separator"></div>
                <?php echo $this->Form->input('password_update', array('class'=>'col-md-12 form-control','label'=>false,'placeholder'=>'Type your new password here','type'=>'password')); ?>
            </div>
            <div class="widget widget-4 row">
                <?php echo $this->Form->submit(__('Change Password'), array('class' => 'btn btn-large btn-primary'));?>
            </div>
        </div>
    </div>
    </div>