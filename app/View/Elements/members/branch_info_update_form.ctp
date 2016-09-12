<div class="widget widget-gray widget-body-white">
    <div class="widget-head">
        <h3 class="heading">Branch Information</h3>
    </div>
    <div class="widget-body">
        <div class="col-md-6">
            <div class="widget widget-4 row">
                <div class="widget-head"><h4 class="heading">Branch</h4></div>
                <div class="separator"></div>
                <?php if($role == 1 || $role == 2){ ?>
                <?php echo $this->Form->input('PersonalProfile.branch_id', array('class'=>'col-md-12 form-control','label'=>false,'options'=>$branches)); ?>
                <?php }else{ ?>
                <?php echo $this->Form->input('PersonalProfile.branch_id', array('class'=>'col-md-12 form-control','label'=>false,'value'=>$branch_id,'readonly'=>'readonly')); ?>
                <?php } ?>
            </div>
            <?php if($action == 'update_profile'){ ?>
            <div class="widget widget-4 row">
                <div class="widget-head"><h4 class="heading">Registration Number</h4></div>
                <div class="separator"></div>
                <?php echo $this->Form->input('PersonalProfile.reg_no', array('class'=>'col-md-12 form-control','label'=>false,'readonly'=>'readonly',)); ?>
            </div>
            <?php } ?>
            <div class="widget widget-4 row">
                <div class="widget-head"><h4 class="heading">Committee</h4></div>
                <div class="separator"></div>
                <?php echo $this->Form->input('PersonalProfile.committee_id', array('class'=>'col-md-12 form-control','label'=>false,'placeholder'=>'choose a committee',)); ?>
            </div>
            <div class="widget widget-4 row">
                <div class="widget-head"><h4 class="heading">Membership Status</h4></div>
                <div class="separator"></div>
                <?php echo $this->Form->input('PersonalProfile.membership_status_id', array('class'=>'col-md-12 form-control','label'=>false,'options'=>$statuses)); ?>
            </div>

        </div>
    </div>
</div>