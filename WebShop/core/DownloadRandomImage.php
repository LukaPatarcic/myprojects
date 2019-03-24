<?php
namespace App\Core;
use \Exception;

class DownloadRandomImage
{
    public static function getImage($width = 300,$height = 400,$location = './')
    {
        $random = random_int(1, 999);
        $url = 'https://picsum.photos/'.$width.'/'.$height.'/?image=' . $random;
        $path = $location . uniqid() . '.jpg';

        try {

            $ch = curl_init();
// Check if initialization had gone wrong*
            if ($ch === false) {
                throw new Exception('failed to initialize');
            }

            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

            $content = curl_exec($ch);

// Check the return value of curl_exec(), too
            if ($content === false) {
                throw new Exception(curl_error($ch), curl_errno($ch));
            }

            /* Process $content here */

// Close curl handle
            curl_close($ch);

            $file = fopen($path, 'w');
            fwrite($file, $content);
            fclose($file);

            return $path;

        } catch (Exception $e) {

            trigger_error(sprintf(
                'Curl failed with error #%d: %s',
                $e->getCode(), $e->getMessage()),
                E_USER_ERROR);
        }
    }

}
