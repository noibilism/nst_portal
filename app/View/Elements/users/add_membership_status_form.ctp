<div class="widget widget-gray widget-body-white">
    <div class="widget-head">
        <h3 class="heading">Add Membership Status</h3>
    </div>
    <div class="widget-body">
        <div class="col-md-6">
            <div class="widget widget-4 row">
                <?php echo $this->Form->create('User');?>
                <div class="widget-head"><h4 class="heading">Membership Status</h4></div>
                <div class="separator"></div>
                <?php echo $this->Form->input('MembershipStatus.name', array('class'=>'col-md-12 form-control','label'=>false,'placeholder'=>'Type your username here','type'=>'text')); ?>
            </div>

            <div class="widget widget-4 row">
                <?php echo $this->Form->submit(__('Add Membership Status'), array('class' => 'btn btn-large btn-primary'));?>
            </div>
        </div>
    </div>
    </div>