<?php

namespace App\Core\Session;


use App\Core\Fingerprint\FingerprintProvider;

final class Session
{
    private $sessionStorage;
    private $sessionData;
    private $sessionID;
    private $sessionLife;
    private $fingerprintProvider;

    public function __construct(SessionStorage $sessionStorage,int $sessionLife = 1800)
    {
        $this->sessionStorage = $sessionStorage;
        $this->sessionData = (object) [];
        $this->sessionLife = $sessionLife;
        $this->fingerprintProvider = null;

        $this->sessionID = filter_input (INPUT_COOKIE,'APPSESSION',FILTER_SANITIZE_STRING);
        $this->sessionID = preg_replace ('|[^A-Za-z0-9]|','',$this->sessionID);

        if(strlen ($this->sessionID) !== 32)
        {
            $this->sessionID = $this->generateSessionID ();
            setcookie ('APPSESSION',$this->sessionID,time () + $this->sessionLife);
        }
    }

    public function setFingerprintProvider(FingerprintProvider $fp)
    {
        $this->fingerprintProvider = $fp;
    }

    private function generateSessionID(): string
    {
        $suported = "ABCDEFGHIJKLMNOPQRTSUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
        $id = '';
        for($i=0; $i<32; $i++)
        {
            $id .= $suported[rand (0,strlen ($suported)-1)];
        }

        return $id;
    }

    public function put(string $key, $value)
    {
        $this->sessionData->$key = $value;
    }

    public function get(string $key, $defaultValue = null)
    {
        return $this->sessionData->$key ?? $defaultValue;
    }

    public function clear()
    {
        $this->sessionData = (object) [];
    }

    public function exists(string $key): bool
    {
        return isset($this->sessionData->$key);
    }

    public function has(string $key): bool
    {
        if($this->exists ($key))
        {
            return false;
        }

        return boolval ($this->sessionData->$key);
    }

    public function save()
    {
        $fingerprint = $this->fingerprintProvider->provideFingerprint();
        $this->sessionData->__fingerprint = $fingerprint;

        $jsonData = json_encode ($this->sessionData);
        $this->sessionStorage->save ($this->sessionID,$jsonData);
        setcookie ('APPSESSION',$this->sessionID,time () + $this->sessionLife);
    }

    public function reload()
    {
        $jsonData =$this->sessionStorage->load ($this->sessionID);
        $restoredData = json_decode ($jsonData);

        if(!$restoredData)
        {

            $this->sessionData = (object) [];
            return;
        }
        $this->sessionData = $restoredData;

        if($this->fingerprintProvider === null)
        {

            return;
        }

        $savedFingerprint = $this->sessionData->__fingerpint ?? null;
        if($savedFingerprint === null)
        {
            return;
        }

        $currentFingerprint = $this->fingerprintProvider->provideFingerprint();

        if($currentFingerprint !== $savedFingerprint)
        {
            $this->clear ();
            $this->sessionStorage->delete ($this->sessionID);
            $this->sessionID = $this->generateSessionID ();
            $this->save ();
            setcookie ('APPSESSION',$this->sessionID,time () + $this->sessionLife);
        }

    }

    public function regenerate()
    {
        $this->reload ();
        $this->sessionStorage->delete ($this->sessionID);
        $this->sessionID = $this->generateSessionID ();
        $this->save ();
        setcookie ('APPSESSION',$this->sessionID,time () + $this->sessionLife);
    }


}