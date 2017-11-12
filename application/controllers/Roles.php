<?php

/**
 * Used to control the change of roles
 *
 * @author Michael Chen
 */
class Roles extends Application
{

        public function actor($role = ROLE_GUEST)
        {
            $this->session->set_userdata('userrole',$role);
            redirect($_SERVER['HTTP_REFERER']); // back where we came from
        }

}
