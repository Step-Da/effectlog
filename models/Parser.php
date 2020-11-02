<?php
    namespace app\models;

    use yii\base\Model;

    class Parser extends Model
    {
        public $errorStatus = 10;

        public static function jsonParcer($url)
        {

            //$url = 'https://effect-gifts.ru/api/?action=getHappyLogs';
   
            $crequest = curl_init();
            curl_setopt($crequest, CURLOPT_HEADER, 0);
            curl_setopt($crequest, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($crequest, CURLOPT_URL, $url);
            curl_setopt($crequest, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($crequest, CURLOPT_VERBOSE, 0);
            curl_setopt($crequest, CURLOPT_SSL_VERIFYPEER, false);
            $response = curl_exec($crequest);
            curl_close($crequest);
            $data = json_decode($response);
            //var_dump($data);
            return $data;
        }
    }
?>