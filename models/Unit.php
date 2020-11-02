<?php
namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * @property int
 * @property string
 * @property string
 */
class Unit extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'unit';
    }

    /**
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
