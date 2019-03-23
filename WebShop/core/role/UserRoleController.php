<?php
    namespace App\Core\Role;

    class UserRoleController extends \App\Core\Controller {
        public function __pre() {
            if ($this->getSession()->get('user_id') === null and  $this->getSession()->get('admin_id') === null) {
                $this->redirect('/user/login');
            }
        }
    }
