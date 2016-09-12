<div class="widget widget-gray widget-body-white">
    <div class="widget-head">
        <h3 class="heading">Personal Information</h3>
    </div>
    <div class="widget-body">
        <div class="col-md-6">
            <div class="widget widget-4 row">
                <?php echo $this->Form->create('Member',array('type'=>'file'));?>
                <div class="widget-head"><h4 class="heading">First Name</h4></div>
                <div class="separator"></div>
                <?php echo $this->Form->input('PersonalProfile.first_name', array('class'=>'col-md-12 form-control','label'=>false,'placeholder'=>'Type first name here','type'=>'text')); ?>
            </div>
            <div class="widget widget-4 row">
                <div class="widget-head"><h4 class="heading">Last Name</h4></div>
                <div class="separator"></div>
                <?php echo $this->Form->input('PersonalProfile.last_name', array('class'=>'col-md-12 form-control','label'=>false,'placeholder'=>'Type your last name here',)); ?>
            </div>
            <div class="widget widget-4 row">
                <div class="widget-head"><h4 class="heading">Other Name</h4></div>
                <div class="separator"></div>
                <?php echo $this->Form->input('PersonalProfile.other_name', array('class'=>'col-md-12 form-control','label'=>false,'placeholder'=>'Type your other name here')); ?>
            </div>
            <div class="widget widget-4 row">
                <div class="widget-head"><h4 class="heading">Date Of Birth</h4></div>
                <div class="separator"></div>
                <?php echo $this->Form->input('PersonalProfile.dob', array('class'=>'col-md-12 form-control','label'=>false, 'minYear' => date('Y') - 120,
                'maxYear' => date('Y') )); ?>
            </div>
            <div class="widget widget-4 row">
                <div class="widget-head"><h4 class="heading">Sex</h4></div>
                <div class="separator"></div>
                <?php echo $this->Form->input('PersonalProfile.sex', array('class'=>'col-md-12 form-control','label'=>false,'options'=>array('M'=>'Male', 'F'=>'Female'),)); ?>
            </div>
            <div class="widget widget-4 row">
                <div class="widget-head"><h4 class="heading">Marital Status </h4></div>
                <div class="separator"></div>
                <?php echo $this->Form->input('PersonalProfile.mar_status', array('class'=>'col-md-12 form-control','label'=>false,'options'=>array('Single'=>'Single','Married'=>'Married','Divorced'=>'Divorced','Widow'=>'Widow','Widower'=>'Widower'))); ?>
            </div>
            </div>
        </div>
    </div>