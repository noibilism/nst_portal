<div class="widget widget-gray widget-body-white">
    <div class="widget-head">
        <h3 class="heading">Update A Zone</h3>
    </div>
    <div class="widget-body">
        <div class="col-md-6">
            <div class="widget widget-4 row">
                <?php echo $this->Form->create('Zone');?>
                <div class="widget-head"><h4 class="heading">Zone Name</h4></div>
                <div class="separator"></div>
                <?php echo $this->Form->input('name', array('class'=>'col-md-12 form-control','label'=>false,'placeholder'=>'Type the zone name here','type'=>'text')); ?>
            </div>
            <div class="widget widget-4 row">
                <div class="widget-head"><h4 class="heading">Zone Code</h4></div>
                <div class="separator"></div>
                <?php echo $this->Form->input('code', array('class'=>'col-md-12 form-control','label'=>false,'placeholder'=>'Type the zone code here','type'=>'text')); ?>
            </div>
            <div class="widget widget-4 row">
                <div class="widget-head"><h4 class="heading">Country</h4></div>
                <div class="separator"></div>
                <?php echo $this->Form->input('country_id', array('class'=>'col-md-12 form-control','label'=>false,'placeholder'=>'Type your new password here','options'=>$countries)); ?>
            </div>
            <div class="widget widget-4 row">
                <?php echo $this->Form->submit(__('Update Zone'), array('class' => 'btn btn-large btn-primary'));?>
            </div>
        </div>
    </div>
    </div>