<?php
    namespace app\models;
    use Yii;
    use yii\base\Model;


    class Parser extends Model
    {
        public static function jsonParcer()
        {
            $pathFile = Yii::getAlias('@app/web/unit.json');
            $jsonData = file_get_contents($pathFile);
            $data = json_decode($jsonData, true);
           
            return $data;
        }
    }
?>