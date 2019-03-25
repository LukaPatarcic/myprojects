<?php
    namespace App\Core;

    class AdminApiController extends ApiController {

        public function __pre() {
            if ($this->getSession()->get('admin_id') === null) {
                ob_clean();
                header('Content-type: application/json; charset=utf-8');
                echo json_encode([
                    'error'   => -10001,
                    'message' => 'This API call is available only to logged in users.'
                ]);

                exit;
            }
        }
    }
