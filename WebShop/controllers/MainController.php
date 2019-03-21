<?php
    namespace App\Controllers;

    class MainController extends \App\Core\Controller {
        public function home() {
            $itemModel = new \App\Models\ItemModel($this->getDatabaseConnection());
            $items = $itemModel->getAll();
            $this->set('items', $items);
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

            if ( !$validanPassword) {
                $this->set('message', 'Doslo je do greške: Lozinka nije ispravnog formata.');
                return;
            }

            $userModel = new \App\Models\UserModel($this->getDatabaseConnection());

            $user = $userModel->getByFieldName('email', $email);
            if ($user) {
                $this->set('message', 'Doslo je do greške: Već postoji korisnik sa tom adresom e-pošte.');
                return;
            }

            $user = $userModel->getByFieldName('username', $username);
            if ($user) {
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

            $userModel = new \App\Models\UserModel($this->getDatabaseConnection());

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
            if($this->getSession()->get('user_id')){
                $items = $this->getSession()->get('items', []);
                $this->set('items', $items);
            }

        }

        public function getLogout() {
            $this->getSession()->remove('user_id');
            $this->getSession()->save();
            $this->redirect(\Configuration::BASE);
        }

        public function contact()
        {
        }


    }
