<div class="widget widget-gray widget-body-white">
    <div class="widget-head">
        <h3 class="heading">Professional Profile</h3>
    </div>
    <div class="widget-body">
        <div class="col-md-6">
            <div class="widget widget-4 row">
                <div class="widget-head"><h4 class="heading">highest Qualification</h4></div>
                <div class="separator"></div>
                <?php echo $this->Form->input('PersonalProfile.qual_id', array('class'=>'col-md-12 form-control','label'=>false,'options'=>$quals)); ?>
            </div>
            <div class="widget widget-4 row">
                <div class="widget-head"><h4 class="heading">Occupation</h4></div>
                <div class="separator"></div>
                <?php echo $this->Form->input('PersonalProfile.prof_id', array('class'=>'col-md-12 form-control','label'=>false,'options'=>$profs,)); ?>
            </div>
            <div class="widget widget-4 row">
                <div class="widget-head"><h4 class="heading">Employer</h4></div>
                <div class="separator"></div>
                <?php echo $this->Form->input('PersonalProfile.employer', array('class'=>'col-md-12 form-control','label'=>false,)); ?>
            </div>
            <div class="widget widget-4 row">
                <div class="widget-head"><h4 class="heading">Employer Address</h4></div>
                <div class="separator"></div>
                <?php echo $this->Form->input('PersonalProfile.office_address', array('class'=>'col-md-12 form-control','label'=>false,'placeholder'=>'Type your Office address here','type'=>'textarea')); ?>
            </div>
            <div class="widget widget-4 row">
                <div class="widget-head"><h4 class="heading">L.G.A</h4></div>
                <div class="separator"></div>
                <?php echo $this->Form->input('PersonalProfile.office_lga', array('class'=>'col-md-12 form-control','label'=>false,'options'=>$lgas)); ?>
            </div>
            <div class="widget widget-4 row">
                <div class="widget-head"><h4 class="heading">State</h4></div>
                <div class="separator"></div>
                <?php echo $this->Form->input('PersonalProfile.office_state', array('class'=>'col-md-12 form-control','label'=>false,'options'=>$states)); ?>
            </div>
            <div class="widget widget-4 row">
                <div class="widget-head"><h4 class="heading">Phone Number</h4></div>
                <div class="separator"></div>
                <?php echo $this->Form->input('PersonalProfile.office_phone', array('class'=>'col-md-12 form-control','label'=>false,'placeholder'=>'Type your phone number here')); ?>
            </div>
    </div>
</div>
    </div>