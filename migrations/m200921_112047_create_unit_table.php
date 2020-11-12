<?php

use yii\db\Migration;

/**
 * Обрабатывает создание таблицы `{{%unit}}`.
 */
class m200921_112047_create_unit_table extends Migration
{
    /**
     * Функция для применения миграции.
     * 
     * {@inheritdoc}
     */
    public function up()
    {
        $tableOptions = null;

        if($this->db->driverName === 'musql'){
            $tableOptions =='CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%unit}}', [
            'id' => $this->primaryKey(),
            'name' =>$this->string(60)->notNull()->unique(),
            'pathApi' => $this->string(50)->notNull()
        ], $tableOptions);
    }

    /**
     * Функция для отмены (отката) миграции.
     * 
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropTable('{{%unit}}');
    }
}
