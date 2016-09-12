<div id="menu" class="hidden-sm hidden-print" height="1020px">
    <div id="menuInner">
        <!-- Scrollable menu wrapper with Maximum height -->
        <div class="slim-scroll" data-scroll-height="1020px">
            <ul>
                <li class="heading"><span><?php echo $b_name[$bch]; ?> Branch</span></li>
            </ul>
            <ul>
                <li class="heading"><span></span></li>
            </ul>
            <ul>
                <li class="heading"><span>General</span></li>
                <li class="glyphicons home active"><span><?php echo $this->Html->link('Dashboard', array('controller'=>'users','action'=>'dashboard'));?></span></li>
            </ul>
            <ul>
                <li class="heading"><span>Members Management</span></li>
                <li class="glyphicons user"><span><?php echo $this->Html->link('Add A Member', array('controller'=>'members','action'=>'create_member'));?></span></li>
                <li class="glyphicons group"><span><?php echo $this->Html->link('View All Members', array('controller'=>'members','action'=>'list_members'));?></span></li>
                <li class="glyphicons group"><span><?php echo $this->Html->link('Birthdays this Month', array('controller'=>'members','action'=>'list_birthday_members'));?></span></li>
            </ul>
            <ul>
                <li class="heading"><span>Reports</span></li>
                <li class="glyphicons settings"><span><?php echo $this->Html->link('Committees', array('controller'=>'users','action'=>'committees'));?></span></li>
                <li class="glyphicons settings"><span><?php echo $this->Html->link('Professional Groups', array('controller'=>'users','action'=>'professional_groups'));?></span></li>
                <li class="glyphicons settings"><span><?php echo $this->Html->link('Membership Statuses', array('controller'=>'users','action'=>'membership_statuses'));?></span></li>
                <li class="glyphicons settings"><span><?php echo $this->Html->link('Professional Qualifications', array('controller'=>'users','action'=>'qualifications'));?></span></li>
                <li class="glyphicons settings"><span><?php echo $this->Html->link('Gender Grouping', array('controller'=>'users','action'=>'genders'));?></span></li>
            </ul>
            <ul>
                <li class="heading"><span>Profile</span></li>
                <li class="glyphicons settings"><span><?php echo $this->Html->link('Change Password', array('controller'=>'users','action'=>'change_password'));?></span></li>
                <li class="glyphicons settings"><span><?php echo $this->Html->link('Logout', array('controller'=>'users','action'=>'logout'));?></span></li>
            </ul>
        </div>
    </div>
    <!-- // Nice Scroll Wrapper END -->

</div>
