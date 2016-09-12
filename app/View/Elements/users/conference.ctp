<div id="login">
        <?php echo $this->Form->create('Member', array('class'=>'form-signin')); ?>
        <div class="widget widget-4">
            <div class="widget-head">
                <h4 class="heading">NASFAT Youth Conference 2016</h4>
            </div>
        </div>
        <h2 class="glyphicons unlock form-signin-heading"><i></i> Please fill the form below!</h2>
        <div class="uniformjs">
            <?php echo $this->Session->flash('auth'); ?>
            <?php echo $this->Form->input('YouthConference.name', array('class'=>'form-control input-block-level', 'placeholder'=>'Enter Your Full Name Here')); ?>
            <?php echo $this->Form->input('YouthConference.email', array('class'=>'form-control input-block-level', 'placeholder'=>'Enter Your Email Here')); ?>
            <?php echo $this->Form->input('YouthConference.phone', array('class'=>'form-control input-block-level', 'placeholder'=>'Enter Your Phone Here')); ?>
            <?php echo $this->Form->input('YouthConference.gender', array('class'=>'form-control input-block-level', 'options'=>array('M'=>'Male','F'=>'Female'))); ?>
            <?php echo $this->Form->input('YouthConference.zone', array('class'=>'form-control input-block-level', 'options'=>$zones)); ?>
            <?php echo $this->Form->input('YouthConference.branch', array('class'=>'form-control input-block-level', 'options'=>$branches)); ?>
            <?php echo $this->Form->textarea('YouthConference.payment_details', array('class'=>'form-control input-block-level', 'placeholder'=>'Enter Your Payment Information Here e.g. Teller No, Bank, Date Paid, Payee Name or Transfer Details')); ?>
            <?php echo $this->Form->textarea('YouthConference.next_of_kin', array('class'=>'form-control input-block-level', 'placeholder'=>'Enter Your Next of Kin Details Here')); ?>
            <?php echo $this->Form->input('YouthConference.attended_before', array('class'=>'form-control input-block-level', 'options'=>array('Yes'=>'Yes','No'=>'No'))); ?>
            <?php echo $this->Form->input('YouthConference.any_ailment', array('class'=>'form-control input-block-level', 'options'=>array('Yes'=>'Yes','No'=>'No'))); ?>
            <?php echo $this->Form->textarea('YouthConference.ailment', array('class'=>'form-control input-block-level', 'placeholder'=>'If the above is Yes, please enter the details here!')); ?>
        </div>
        <?php echo $this->Form->submit(__('Register!'), array('class' => 'btn btn-large btn-primary'));?>
</div>