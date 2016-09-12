<?php
    if($role == 1){
    echo $this->element('dashboards/admin_dashboard');
    }elseif($role == 2){
    echo $this->element('dashboards/admin_dashboard');
    }elseif($role == 3){
    echo $this->element('dashboards/admin_dashboard');
    }elseif($role == 4){
    echo $this->element('dashboards/member_dashboard');
    }
?>
