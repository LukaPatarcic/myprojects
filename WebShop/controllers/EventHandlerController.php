<?php
    namespace App\Controllers;

    class EventHandlerController extends \App\Core\Controller {
        public function handle(string $type) {
            $host = \filter_input(INPUT_SERVER, 'HTTP_HOST');

            if ($host !== 'localhost') {
                return;
            }

            $eventModel = new \App\Models\EventModel($this->getDatabaseConnection());
            $events = $eventModel->getAllByTypeAndStatus($type, 'pending');

            if (!count($events)) {
                return;
            }

            if ($type === 'email') {
                $this->handleEmails($events);
            }
        }

        private function handleEmails(array $events) {
            foreach ($events as $event) {
                $this->handleEmailEvent($event);
            }
        }

        private function handleEmailEvent($event) {
            $eventModel = new \App\Models\EventModel($this->getDatabaseConnection());

            $emailEventhandler = new \App\EventHandlers\EmailEventHandler();
            $emailEventhandler->setData($event->data);

            $eventModel->editById($event->event_id, [
                'status' => 'started'
            ]);

            $newStatus = $emailEventhandler->handle();

            $eventModel->editById($event->event_id, [
                'status' => $newStatus
            ]);
        }
    }
