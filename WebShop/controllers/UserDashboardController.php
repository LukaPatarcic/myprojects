<?php
    namespace App\Controllers;

    use App\Models\UserModel;

    class UserDashboardController extends \App\Core\Role\UserRoleController {
        public function index() {

            $userModel = new UserModel($this->getDatabaseConnection());
            $user = $userModel->getById($this->getSession()->get('user_id'));
            $this->set('user',$user);
            $userPurchase = $userModel->getUserPurchase($this->getSession()->get('user_id',));
            $this->set('purchases',$userPurchase);


        }
    }
