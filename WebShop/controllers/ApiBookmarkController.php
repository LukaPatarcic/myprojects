<?php
    namespace App\Controllers;

    use App\Models\ItemModel;
    use App\Models\PurchaseModel;

    class ApiBookmarkController extends \App\Core\ApiController {

        public function getBookmarks()
        {
            $items = $this->getSession()->get('items', []);
            $this->set('items', $items);
        }

        public function addBookmark() {

            $amount = filter_input (INPUT_POST,'amount',FILTER_SANITIZE_NUMBER_INT);
            $itemId = filter_input (INPUT_POST,'id',FILTER_SANITIZE_NUMBER_INT);


            $itemModel = new \App\Models\ItemModel($this->getDatabaseConnection());
            $itemValue = $itemModel->getById($itemId);

            if (!$itemValue) {
                $this->set('error', -1);
                return;
            }
            $items =$this->getSession ()->get ('items',[]);

            foreach ($items as $item) {

                if($item->item_id == $itemId) {
                    $this->set('error',-2);
                    return;
                }
            }


            $itemValue = (object) array_merge( (array)$itemValue, array( 'amount' => $amount ) );

            $items[] = $itemValue;

            $this->getSession()->put('items', $items);

            $this->set('error', 0);
        }

        public function clear() {
            $this->getSession()->put('items', []);

            $this->set('error', 0);
        }

        public function checkout()
        {
            $items = $_POST['items'];

            $itemModel = new ItemModel($this->getDatabaseConnection());
            $purchaseModel = new PurchaseModel($this->getDatabaseConnection());
            foreach ($items as $key =>$value) {
                var_dump ([
                    $key,$value
                ]);
                $item = $itemModel->getByFieldName('item_name',$value[0]);
                if(!$item){
                    return $this->set('message','invalid');
                }

                $purchaseModel->add([
                   'user_id' => $this->getSession()->get('user_id',1),
                    'item_id' => $item->item_id,
                    'amount' => $item->value
                ]);

                if(!$item){
                    return $this->set('message','invalid');
                }

            }

            $this->set('message','success');
        }


    }
