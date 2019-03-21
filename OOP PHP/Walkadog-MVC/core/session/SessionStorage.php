<?php

namespace App\Core\Session;


interface SessionStorage
{
    public function save(string $sessionID,string $sessionData);

    public function load(string $sessionID): string;

    public function delete(string $sessionID);

    public function cleanUp(int $sessionAge);

}