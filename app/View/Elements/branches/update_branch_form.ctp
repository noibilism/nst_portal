<div class="widget widget-gray widget-body-white">
    <div class="widget-head">
        <h3 class="heading">Update A Branch</h3>
    </div>
    <div class="widget-body">
        <div class="col-md-6">
            <div class="widget widget-4 row">
                <?php echo $this->Form->create('Branch');?>
                <div class="widget-head"><h4 class="heading">Branch Name</h4></div>
                <div class="separator"></div>
                <?php echo $this->Form->input('name', array('class'=>'col-md-12 form-control','label'=>false,'placeholder'=>'Type the branch name here','type'=>'text')); ?>
            </div>
            <div class="widget widget-4 row">
                <div class="widget-head"><h4 class="heading">Zone</h4></div>
                <div class="separator"></div>
                <?php echo $this->Form->input('zone_id', array('class'=>'col-md-12 form-control','label'=>false,'placeholder'=>'Type the zone here', 'options'=>$zones)); ?>
            </div>
            <div class="widget widget-4 row">
                <div class="widget-head"><h4 class="heading">State</h4></div>
                <div class="separator"></div>
                <?php echo $this->Form->input('state_id', array('class'=>'col-md-12 form-control','label'=>false,'placeholder'=>'Type your state here','options'=>$states)); ?>
            </div>
            <div class="widget widget-4 row">
                <div class="widget-head"><h4 class="heading">Code</h4></div>
                <div class="separator"></div>
                <?php echo $this->Form->input('code', array('class'=>'col-md-12 form-control','label'=>false,'placeholder'=>'Type your new password here',)); ?>
            </div>
            <div class="widget widget-4 row">
                <?php echo $this->Form->submit(__('Update Branch'), array('class' => 'btn btn-large btn-primary'));?>
            </div>
        </div>
    </div>
    </div>