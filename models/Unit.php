<?php
namespace app\models;

use yii\db\ActiveRecord;

/**
 * Модель поставщиков(компаний).
 * 
 * @property int $id
 * @property string $name
 * @property string $pathApi
 */
class Unit extends ActiveRecord
{
    /**
     * Функция для получения наименование сущности(таблицы).
     * 
     * {@inheritdoc}
     * @return string
     */
    public static function tableName()
    {
        return 'unit';
    }

    /**
     * Правила для полей модели поставщиков.
     * 
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'pathApi'], 'required'],
            [['name'], 'string', 'max' => 60],
            [['pathApi'], 'string', 'max' => 50],
            [['name'], 'unique'],
        ];
    }

    /**
     *  Русификация полей модели поставщиков.
     * 
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'pathApi' => 'Path Api',
        ];
    }
}
