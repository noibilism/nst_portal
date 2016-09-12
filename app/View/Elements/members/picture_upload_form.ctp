<?php if($current_action == 'update_profile'){ ?>
<div class="widget widget-4 row">
    <div class="widget-head"><h4 class="heading">Picture</h4></div>
    <div class="separator"></div>
    <?php echo $this->Html->image('pictures/'.$picture, array(),array('class'=>'btn btn-primary DTTT_button_copy'));?>
    <button class="btn btn-large btn-primary"><?php echo $this->Html->link('Update Picture', array('controller'=>'members','action'=>'update_picture',$personal_data['PersonalProfile']['id']),array('class'=>'btn btn-primary DTTT_button_copy','target'=>'blank'));?>
    </button>

    <div class="widget widget-4 row">
        <div class="widget-head"></div>
        <div class="separator"></div>
        <?php echo $this->Form->submit(__('Update Member Information'), array('class' => 'btn btn-large btn-primary'));?>
    </div>
</div>
<?php }elseif($current_action == 'update_picture'){ ?>
<?php echo $this->Form->create('Member',array('type'=>'file'));?>
<div class="widget widget-4 row">
    <div class="widget-head"><h4 class="heading">Upload Picture</h4></div>
    <div class="separator"></div>
    <?php echo $this->Html->image('pictures/'.$picture, array(),array('class'=>'btn btn-primary DTTT_button_copy'));?>
    <?php echo $this->Form->input('PersonalProfile.picture', array('class'=>'col-md-12 form-control','label'=>false,'type'=>'file',)); ?>
</div>
<div class="widget widget-4 row">
    <div class="widget-head"></div>
    <div class="separator"></div>
    <?php echo $this->Form->submit(__('Update Member Picture'), array('class' => 'btn btn-large btn-primary'));?>
</div>
<?php }else{ ?>
<div class="widget widget-4 row">
        <div class="widget-head"><h4 class="heading">Upload Picture</h4></div>
        <div class="separator"></div>
        <?php echo $this->Form->input('PersonalProfile.picture', array('class'=>'col-md-12 form-control','label'=>false,'type'=>'file',)); ?>
</div>
<div class="widget widget-4 row">
    <div class="widget-head"></div>
    <div class="separator"></div>
    <?php echo $this->Form->submit(__('Submit Member Information'), array('class' => 'btn btn-large btn-primary'));?>
</div>
<?php } ?>





