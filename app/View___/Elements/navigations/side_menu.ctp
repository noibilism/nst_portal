<?php
        if($role == 1){
            echo $this->element('navigations/admin_menu');
        }elseif($role == 2){
            echo $this->element('navigations/zones_menu');
        }elseif($role == 3){
            echo $this->element('navigations/branch_menu');
        }elseif($role == 4){
            echo $this->element('navigations/member_menu');
        }

?>

