<?php

    namespace App\Controllers;

use App\Core\Controller;
use App\Core\Model;
use App\Models\UserModel;
use App\Models\AuctionModel;
use App\Models\AuctionViewModel;
use App\Models\BreedModel;
use App\Models\CategoryModel;
use App\Models\ReviewModel;


class MainController extends Controller
{
    public function home()
    {


        $breedModel = new BreedModel($this->getDatabaseConnection ());
        $breeds = $breedModel->getAll ();
        $this->set ('breeds',$breeds);

        $reviewModel = new ReviewModel($this->getDatabaseConnection ());
        $reviews = $reviewModel->getAllVerifiedReviews ();
        $this->set ('reviews',$reviews);


        /* $auctionModel = new AuctionModel($this->getDatabaseConnection ());
        $auctionModel->add ([
            'title' => 'Title of the auction',
            'description' => 'Description of the auction',
            'starting_price' => '100.4',
            'starts_at' => '2019-04-01 12:00:00',
            'ends_at' => '2019-04-05 14:00:00',
            'is_active' => 1,
            'category_id' => 1
        ]);*/

        #$this->getSession ()->put ('key',1);

        $oldValue = $this->getSession ()->get ('key',0);
        $newValue = $oldValue + 1;
        $this->getSession ()->put ('key',$newValue);
        $this->set ('session',$newValue);

        #$this->getSession ()->clear ();


        if(isset($_POST['firstName'])){

            $firstName = filter_input (INPUT_POST,'firstName',FILTER_SANITIZE_STRING);
            $lastName = filter_input (INPUT_POST,'lastName',FILTER_SANITIZE_STRING);
            $email = filter_input (INPUT_POST,'email',FILTER_SANITIZE_EMAIL);
            $address = filter_input (INPUT_POST,'address',FILTER_SANITIZE_STRING);
            $phone = filter_input (INPUT_POST,'phone',FILTER_SANITIZE_STRING);
            $typeOfWalk = filter_input (INPUT_POST,'typeOfWalk',FILTER_SANITIZE_STRING);
            $date = filter_input (INPUT_POST,'date',FILTER_SANITIZE_STRING);
            $time = filter_input (INPUT_POST,'time',FILTER_SANITIZE_STRING);
            $day = filter_input (INPUT_POST,'day',FILTER_SANITIZE_STRING);
            $numberOfDogs = filter_input (INPUT_POST,'numberOfDogs',FILTER_SANITIZE_NUMBER_INT);

            $name = $firstName." ".$lastName;
            $hashedEmail = md5 ($email);

            $userModel = new UserModel ($this->getDatabaseConnection ());
            $user = $userModel->add ([
                'name' => $name,
                'email' => $email,
                'hashed_email' => $hashedEmail,
                'address' => $address,
                'phone' => $phone,
                'review_code' => 'test',
                'verification_code' => 'test'
            ]);

            if(!$user)
            {
                $this->set('message','error');
                $this->set('user',$user);

            }else{
                $this->set('message','success');
            }
        }





    }

    public function validate()
    {

    }

}