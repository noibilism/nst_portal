<div class="widget widget-gray widget-body-white">
    <div class="widget-head">
        <h3 class="heading">Add Super Administrator</h3>
    </div>
    <div class="widget-body">
        <div class="col-md-6">
            <div class="widget widget-4 row">
                <?php echo $this->Form->create('User');?>
                <div class="widget-head"><h4 class="heading">Username</h4></div>
                <div class="separator"></div>
                <?php echo $this->Form->input('username', array('class'=>'col-md-12 form-control','label'=>false,'placeholder'=>'Type your username here','type'=>'text')); ?>
            </div>
            <div class="widget widget-4 row">
                <div class="widget-head"><h4 class="heading">Branch </h4></div>
                <div class="separator"></div>
                <?php echo $this->Form->input('branch_id', array('class'=>'col-md-12 form-control','label'=>false,'placeholder'=>'Type branch email here','options'=>$branches)); ?>
            </div>
            <div class="widget widget-4 row">
                <div class="widget-head"><h4 class="heading">E-Mail</h4></div>
                <div class="separator"></div>
                <?php echo $this->Form->input('email', array('class'=>'col-md-12 form-control','label'=>false,'placeholder'=>'Type your username here','type'=>'text')); ?>
            </div>
            <div class="widget widget-4 row">
                <div class="widget-head"><h4 class="heading">Password</h4></div>
                <div class="separator"></div>
                <?php echo $this->Form->input('password', array('class'=>'col-md-12 form-control','label'=>false,'placeholder'=>'Type your current password here','type'=>'password')); ?>
            </div>
            <div class="widget widget-4 row">
                <div class="widget-head"><h4 class="heading">Confirm Password</h4></div>
                <div class="separator"></div>
                <?php echo $this->Form->input('password_confirm', array('class'=>'col-md-12 form-control','label'=>false,'placeholder'=>'Type your new password here','type'=>'password')); ?>
            </div>
            <div class="widget widget-4 row">
                <?php echo $this->Form->submit(__('Update User'), array('class' => 'btn btn-large btn-primary'));?>
            </div>
        </div>
    </div>
    </div>