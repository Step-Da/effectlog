<?php

namespace app\models;

use yii\base\Model;

/**
 * Модель для обработки полученных данных сервера.
 * 
 */
class Parser extends Model
{
    public $errorStatus = 10; // Статус ошибочных компонентов обновления остатков
    
    /**
     * Функция для получения и обработки данных с сервера.
     * 
     * @param string url
     * @return array
     */
    public static function jsonParcer($url)
    {   
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
        return $data;
    }
    
    /**
     * Функция для формирования статистики на основе полученных данных.
     * 
     * @param string json
     * @return array
     */
    public function compilingStatistics($json)
    {
        $error = 0; // Кол-во ошибочных компонентов обвновления остотков
        $success = 0; // Кол-во успешных компонентов обновления остатков
        foreach($json as $elementJson){
            $elementJson[0] ==  $this->errorStatus ? ($error++) : ($success++);
        }
        $statisitics = array(
            'error' => $error,
            'success' => $success
        );
        return $statisitics; 
    }
}