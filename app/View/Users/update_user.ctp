<?php
        if($role_id == 1){
            echo $this->element('users/update_admin_form');
        }elseif($role_id == 2){
            echo $this->element('users/update_zone_admin_form');
        }elseif($role_id == 3){
            echo $this->element('users/update_branch_admin_form');
        }
?>

