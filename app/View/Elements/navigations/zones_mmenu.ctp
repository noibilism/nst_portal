<div id="menu" class="hidden-sm hidden-print" height="1020px">
    <div id="menuInner">
        <!-- Scrollable menu wrapper with Maximum height -->
        <div class="slim-scroll" data-scroll-height="1020px">
            <ul>
                <li class="heading"><span><?php echo $z_name[$zone]; ?></span></li>
            </ul>
            <ul>
                <li class="heading"><span></span></li>
            </ul>
            <ul>
                <li class="heading"><span>General</span></li>
                <li class="glyphicons home active"><span><?php echo $this->Html->link('Dashboard', array('controller'=>'users','action'=>'dashboard'));?></span></li>
            </ul>
            <li class="hasSubmenu">
                <a data-toggle="collapse" class="glyphicons show_thumbnails_with_lines" href="#menu_account"><span>Branches Management</span></a>
                <ul class="menuCollapse" id="menu_account">
                    <li class=""><span><?php echo $this->Html->link('View All Branches', array('controller'=>'branches','action'=>'list_branches'));?></span></li>
                </ul>
            </li>
            <ul>
                <li class="heading"><span>Members Management</span></li>
                <li class="glyphicons group"><span><?php echo $this->Html->link('View All Members', array('controller'=>'members','action'=>'list_members'));?></span></li>
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
