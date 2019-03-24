<?php
    namespace App\Controllers;

    use App\Validators\RegexValidator;

    class MainController extends \App\Core\Controller {
        public function home() {
        }

        public function getRegister() {
            
        }

        public function postRegister() {

            $email     = \filter_input(INPUT_POST, 'reg_email', FILTER_SANITIZE_EMAIL);
            $forename  = \filter_input(INPUT_POST, 'reg_forename', FILTER_SANITIZE_STRING);
            $surname   = \filter_input(INPUT_POST, 'reg_surname', FILTER_SANITIZE_STRING);
            $username  = \filter_input(INPUT_POST, 'reg_username', FILTER_SANITIZE_STRING);
            $password1 = \filter_input(INPUT_POST, 'reg_password_1', FILTER_SANITIZE_STRING);
            $password2 = \filter_input(INPUT_POST, 'reg_password_2', FILTER_SANITIZE_STRING);

            if ($password1 !== $password2) {
                $this->set('message', 'Doslo je do greške: Niste uneli dva puta istu lozinku.');
                return;
            }

            $validanPassword = (new \App\Validators\StringValidator())
                ->setMinLength(7)
                ->setMaxLength(120)
                ->isValid($password1);

            $validEmail = filter_var ($email,FILTER_VALIDATE_EMAIL);

            $validUsername = (new RegexValidator())
                ->setLettersAndNumbersOnly (2,255)
                ->isValid ($username);

            if(!$validUsername) {
                $this->set('message', 'Username is not valid');
                return;
            }

            if(!$validEmail) {
                $this->set('message', 'Email is not valid');
                return;
            }

            if (!$validanPassword) {
                $this->set('message', 'Password is not valid');
                return;
            }


            $userModel = new \App\Models\userModel($this->getDatabaseConnection());

            $user = $userModel->getByFieldName('email', $email);

            if ($user) {
                $this->set('message', 'Doslo je do greške: Već postoji korisnik sa tom adresom e-pošte.');
                return;
            }

            $admin = $userModel->getByFieldName('username', $username);
            if ($admin) {
                $this->set('message', 'Doslo je do greške: Već postoji korisnik sa tim korisničkim imenom.');
                return;
            }

            $passwordHash = \password_hash($password1, PASSWORD_DEFAULT);

            $userId = $userModel->add([
                'first_name'      => $forename,
                'last_name'       => $surname,
                'username'      => $username,
                'password' => $passwordHash,
                'email'         => $email

            ]);

            if (!$userId) {
                $this->set('message', 'Doslo je do greške: Nije bilo uspešno registrovanje naloga.');
                return;
            }

            $this->set('message', 'Napravljen je novi nalog. Sada možete da se prijavite.');
        }

        public function getLogin() {

        }

        public function postLogin() {

            $username = \filter_input(INPUT_POST, 'login_username', FILTER_SANITIZE_STRING);
            $password = \filter_input(INPUT_POST, 'login_password', FILTER_SANITIZE_STRING);

            $validanPassword = (new \App\Validators\StringValidator())
                ->setMinLength(7)
                ->setMaxLength(120)
                ->isValid($password);

            if ( !$validanPassword) {
                $this->set('message', 'Doslo je do greške: Lozinka nije ispravnog formata.');
                return;
            }

            $userModel = new \App\Models\userModel($this->getDatabaseConnection());

            $user = $userModel->getByFieldName('username', $username);
            if (!$user) {
                $this->set('message', 'Doslo je do greške: Ne postoji korisnik sa tim korisničkim imenom.');
                return;
            }

            if (!password_verify($password, $user->password)) {
                sleep(1);
                $this->set('message', 'Doslo je do greške: Lozinka nije ispravna.');
                return;
            }

            $this->getSession()->put('user_id', $user->user_id);
            $this->getSession()->save();

            $this->redirect(\Configuration::BASE . 'user/profile');
        }

        public function checkout()
        {
            if($this->getSession()->get('admin_id') or $this->getSession ()->get ('user_id')) {

                $items = $this->getSession()->get('items', []);
                $itemsPrices = $items;
                $totalPrice = 0;


                foreach ($itemsPrices as $itemPrice) {
                    $totalPrice += $itemPrice->item_price * $itemPrice->amount;
                }

                $this->set('items', $items);
                $this->set('price',$totalPrice);
            }

        }

        public function checkoutChange()
        {
            if($this->getSession()->get('admin_id') or $this->getSession ()->get ('user_id')) {

                $itemId = filter_input (INPUT_POST,'id',FILTER_SANITIZE_STRING);
                $itemAmount = filter_input (INPUT_POST,'amount',FILTER_SANITIZE_STRING);

                $items = $this->getSession()->get('items', []);

                foreach ($items as $item)
                {
                    if($item->item_id == $itemId) {

                        $item->amount = $itemAmount;
                    }
                }


                $this->getSession()->put('items',$items);
                $this->getSession ()->save ();
                $this->redirect (\Configuration::BASE.'checkout');
            }

        }

        public function getLogout() {
            $this->getSession()->remove('admin_id');
            $this->getSession()->remove('user_id');
            $this->getSession()->save();
            $this->redirect(\Configuration::BASE);
        }

        public function contact()
        {
        }

        public function getAdminLogin() {

        }

        public function postAdminLogin() {
            $username = \filter_input(INPUT_POST, 'login_username', FILTER_SANITIZE_STRING);
            $password = \filter_input(INPUT_POST, 'login_password', FILTER_SANITIZE_STRING);

            $validanPassword = (new \App\Validators\StringValidator())
                ->setMinLength(7)
                ->setMaxLength(120)
                ->isValid($password);

            if ( !$validanPassword) {
                $this->set('message', 'Doslo je do greške: Lozinka nije ispravnog formata.');
                return;
            }

            $adminModel = new \App\Models\adminModel($this->getDatabaseConnection());

            $admin = $adminModel->getByFieldName('admin_name', $username);
            if (!$admin) {
                $this->set('message', 'Doslo je do greške: Ne postoji korisnik sa tim korisničkim imenom.');
                return;
            }

            if (!password_verify($password, $admin->admin_password)) {
                sleep(1);
                $this->set('message', 'Doslo je do greške: Lozinka nije ispravna.');
                return;
            }

            $this->getSession()->put('admin_id', $admin->admin_id);
            $this->getSession()->save();

            $this->redirect(\Configuration::BASE . 'admin/profile');
        }

        public function clearBookmark($id) {

            $items = $this->getSession()->get('items', []);

            for($i =0; $i<sizeof ($items); $i++) {
                if($items[$i]->item_id == $id) {
                    unset($items[$i]);
                }
            }
            $this->getSession()->put('items', $items);
            $this->getSession ()->save ();
            $this->redirect(\Configuration::BASE.'checkout');
        }


    }
