<div id="login">
        <?php echo $this->Form->create('User', array('class'=>'form-signin')); ?>
        <div class="widget widget-4">
            <div class="widget-head">
                <h4 class="heading">Login</h4>
            </div>
        </div>
        <h2 class="glyphicons unlock form-signin-heading"><i></i> Please sign in</h2>
        <div class="uniformjs">
            <?php echo $this->Session->flash('auth'); ?>
            <?php echo $this->Form->input('username', array('class'=>'form-control input-block-level', 'placeholder'=>'Email address')); ?>
            <?php echo $this->Form->input('password', array('class'=>'form-control input-block-level', 'placeholder'=>'Password')); ?>
        </div>
        <?php echo $this->Form->submit(__('Sign in'), array('class' => 'btn btn-large btn-primary'));?>
</div>