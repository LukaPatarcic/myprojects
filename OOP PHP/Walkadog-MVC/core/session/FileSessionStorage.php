<?php

namespace App\Core\Session;


class FileSessionStorage implements SessionStorage
{
    private $sessionPath;

    public function __construct(string $sessionPath)
    {
        $this->sessionPath = $sessionPath;
    }

    public function load(string $sessionID): string
    {
        $sessionFileName = $this->sessionPath.$sessionID.'.json';
        if(!file_exists ($sessionFileName))
        {
            return '{}';
        }

        return file_get_contents ($sessionFileName);
    }

    public function save(string $sessionID, string $sessionData)
    {
        $sessionFileName = $this->sessionPath.$sessionID.'.json';
        file_put_contents ($sessionFileName,$sessionData);
    }

    public function delete(string $sessionID)
    {
        $sessionFileName = $this->sessionPath.$sessionID.'.json';
        if(file_exists ($sessionFileName))
        {
            unlink ($sessionFileName);
        }

    }

    public function cleanUp(int $sessionAge)
    {
        //TODO: implement!
    }



}