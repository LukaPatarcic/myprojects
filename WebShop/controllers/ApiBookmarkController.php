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

        public function addBookmark($itemId) {
            $itemModel = new \App\Models\ItemModel($this->getDatabaseConnection());
            $item = $itemModel->getById($itemId);

            if (!$item) {
                $this->set('error', -1);
                return;
            }



            $items[] = $item;
            $this->getSession()->put('items', $items);

            $this->set('error', 0);
        }

        public function clear() {
            $this->getSession()->put('items', []);

            $this->set('error', 0);
        }

        public function checkout()
        {
            $datas = $_POST['items'];//filter_input(INPUT_POST,'items',FILTER_SANITIZE_STRING);
            $itemModel = new ItemModel($this->getDatabaseConnection());
            $purchaseModel = new PurchaseModel($this->getDatabaseConnection());
            foreach ($datas as $data) {
                $item = $itemModel->getByFieldName('item_name',$data);
                if(!$item){
                    return $this->set('message','invalid');
                }
                $purchaseModel->add([
                   'user_id' => $this->getSession()->get('user_id',1),
                    'item_id' => $item->item_id
                ]);

            }


            $this->set('message','success');
        }


    }
