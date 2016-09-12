<div id="menu" class="hidden-sm hidden-print" height="1020px">
    <div id="menuInner">
        <!-- Scrollable menu wrapper with Maximum height -->
        <div class="slim-scroll" data-scroll-height="1020px">

            <ul>
                <li class="heading"><span>Headquarters</span></li>
            </ul>
            <ul>
                <li class="heading"><span></span></li>
            </ul>
            <ul>
                <li class="heading"><span>General</span></li>
                <li class="glyphicons home active"><span><?php echo $this->Html->link('Dashboard', array('controller'=>'users','action'=>'dashboard'));?></span></li>
                <li class="hasSubmenu">
                    <a data-toggle="collapse" class="glyphicons settings" href="#menu_components"><span>Users Management</span></a>
                    <ul class="menuCollapse" id="menu_components">
                        <li class=""><span><?php echo $this->Html->link('View All Users', array('controller'=>'users','action'=>'index'));?></span></li>
                        <li class=""><span><?php echo $this->Html->link('Add Branch Admin', array('controller'=>'users','action'=>'add_branch_admin'));?></span></li>
                        <li class=""><span><?php echo $this->Html->link('Add Zone Admin', array('controller'=>'users','action'=>'add_zone_admin'));?></span></li>
                        <li class=""><span><?php echo $this->Html->link('Add Super Admin', array('controller'=>'users','action'=>'add_super_admin'));?></span></li>
                        <li class=""><span><?php echo $this->Html->link('Change Password', array('controller'=>'users','action'=>'change_password'));?></span></li>
                    </ul>
                </li>
                <li class="hasSubmenu">
                    <a data-toggle="collapse" class="glyphicons show_thumbnails_with_lines" href="#menu_forms"><span>Zones Management</span></a>
                    <ul class="menuCollapse" id="menu_forms">
                        <li class=""><span><?php echo $this->Html->link('View All Zones', array('controller'=>'zones','action'=>'list_zones'));?></span></li>
                        <li class=""><span><?php echo $this->Html->link('Add A Zone', array('controller'=>'zones','action'=>'add_zone'));?></span></li>
                    </ul>
                </li>
                <li class="hasSubmenu">
                    <a data-toggle="collapse" class="glyphicons show_thumbnails_with_lines" href="#menu_account"><span>Branches Management</span></a>
                    <ul class="menuCollapse" id="menu_account">
                        <li class=""><span><?php echo $this->Html->link('View All Branches', array('controller'=>'branches','action'=>'list_branches'));?></span></li>
                        <li class=""><span><?php echo $this->Html->link('Add A Branch', array('controller'=>'branches','action'=>'add_branch'));?></span></li>
                    </ul>
                </li>
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
                <li class="heading"><span>Others</span></li>
                <li class="glyphicons group"><span><?php echo $this->Html->link('Youth Conference', array('controller'=>'users','action'=>'youth_conference'));?></span></li>
                <li class="glyphicons group"><span><?php echo $this->Html->link('Prayer Book Licences', array('controller'=>'members','action'=>'prayer_book_licences'));?></span></li>
            </ul>
            <ul>
                <li class="heading"><span>Parameters</span></li>
                <li class="glyphicons settings"><span><?php echo $this->Html->link('Committees', array('controller'=>'users','action'=>'committees'));?></span></li>
                <li class="glyphicons settings"><span><?php echo $this->Html->link('Professional Groups', array('controller'=>'users','action'=>'professional_groups'));?></span></li>
                <li class="glyphicons settings"><span><?php echo $this->Html->link('Membership Statuses', array('controller'=>'users','action'=>'membership_statuses'));?></span></li>
                <li class="glyphicons settings"><span><?php echo $this->Html->link('Professional Qualifications', array('controller'=>'users','action'=>'qualifications'));?></span></li>
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
