<ul class="topnav pull-right">
    <li style="text-transform: uppercase"><a href="" data-toggle="dropdown" class="glyphicons cogwheel"><?php echo $username; ?><span class="caret"></span></a></li>
    <li class="dropdown visible-lg">
        <a href="" data-toggle="dropdown" class="glyphicons cogwheel">Having Issues?<span class="caret"></span></a>
        <ul class="dropdown-menu pull-right">
            <li><a href="">Call the Following</a></li>
            <li><a href="">08080764159</a></li>
            <li><a href="">07037737504</a></li>
        </ul>
    </li>
    <li class="account">
        <a data-toggle="dropdown" href="#" class="glyphicons logout lock"><span class="hidden-sm text">User Profile</span></a>
        <ul class="dropdown-menu pull-right">
            <li><a href="#" class="glyphicons camera">My Profile</a></li>
            <li class="highlight profile">
							<span>
								<span class="heading"><a href="#" class="pull-right"><?php echo $this->Html->link('Change Password', array('controller'=>'users','action'=>'change_password'));?></a></span>
							</span>
            </li>
            <li>
							<span>
								<a class="btn btn-default btn-small pull-right" style="padding: 2px 10px; background: #fff;" href="#"><?php echo $this->Html->link('Logout', array('controller'=>'users','action'=>'logout'));?></a>
							</span>
            </li>
        </ul>
    </li>
</ul>
