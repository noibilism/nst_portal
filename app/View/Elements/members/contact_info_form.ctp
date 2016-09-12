<div class="widget widget-gray widget-body-white">
    <div class="widget-head">
        <h3 class="heading">Contact Information</h3>
    </div>
    <div class="widget-body">
        <div class="col-md-6">
            <div class="widget widget-4 row">
                <?php echo $this->Form->create('Branch');?>
                <div class="widget-head"><h4 class="heading">Home Address</h4></div>
                <div class="separator"></div>
                <?php echo $this->Form->input('PersonalProfile.address', array('class'=>'col-md-12 form-control','label'=>false,'placeholder'=>'Type your home address here','type'=>'textarea')); ?>
            </div>
            <div class="widget widget-4 row">
                <div class="widget-head"><h4 class="heading">L.G.A</h4></div>
                <div class="separator"></div>
                <?php echo $this->Form->input('PersonalProfile.lga_id', array('class'=>'col-md-12 form-control','label'=>false,'options'=>$lgas)); ?>
            </div>
            <div class="widget widget-4 row">
                <div class="widget-head"><h4 class="heading">State</h4></div>
                <div class="separator"></div>
                <?php echo $this->Form->input('PersonalProfile.state_id', array('class'=>'col-md-12 form-control','label'=>false,'placeholder'=>'Choose a state here')); ?>
            </div>
            <div class="widget widget-4 row">
                <div class="widget-head"><h4 class="heading">Country</h4></div>
                <div class="separator"></div>
                <?php echo $this->Form->input('PersonalProfile.country_id', array('class'=>'col-md-12 form-control','label'=>false,'placeholder'=>'Choose a country here',)); ?>
            </div>
            <div class="widget widget-4 row">
                <div class="widget-head"><h4 class="heading">E-Mail</h4></div>
                <div class="separator"></div>
                <?php echo $this->Form->input('PersonalProfile.email', array('class'=>'col-md-12 form-control','label'=>false,'placeholder'=>'Type your e-mail here','type'=>'email')); ?>
            </div>
            <div class="widget widget-4 row">
                <div class="widget-head"><h4 class="heading">Phone No</h4></div>
                <div class="separator"></div>
                <?php echo $this->Form->input('PersonalProfile.phone', array('class'=>'col-md-12 form-control','label'=>false,'placeholder'=>'Type your other name here')); ?>
            </div>
            <div class="widget widget-4 row">
                <div class="widget-head"><h4 class="heading">Home Town</h4></div>
                <div class="separator"></div>
                <?php echo $this->Form->input('PersonalProfile.home_town_address', array('class'=>'col-md-12 form-control','label'=>false,'placeholder'=>'Type your Home Town Address','type'=>'textarea')); ?>
            </div>
            <div class="widget widget-4 row">
                <div class="widget-head"><h4 class="heading">Home Town L.G.A</h4></div>
                <div class="separator"></div>
                <?php echo $this->Form->input('PersonalProfile.home_town_lga', array('class'=>'col-md-12 form-control','label'=>false,'options'=>$lgas)); ?>
            </div>
            <div class="widget widget-4 row">
                <div class="widget-head"><h4 class="heading">State of Origin</h4></div>
                <div class="separator"></div>
                <?php echo $this->Form->input('PersonalProfile.state_of_origin', array('class'=>'col-md-12 form-control','label'=>false,'options'=>$states)); ?>
            </div>
        </div>
    </div>
</div>