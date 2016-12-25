<?php

use yii\db\Migration;

/**
 * Handles the creation of table `product`.
 */
class m161225_124535_create_product_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%product}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull()->comment('标题'),
            'price' => $this->decimal(2)->notNull()->comment('售价'),
            'price_original' => $this->decimal(2)->comment('原价'),
            'stock' => $this->integer()->notNull()->defaultValue(100)->comment('库存数量'),
            'thumbnail_path' => $this->string(1024)->comment('缩略图路径'),
            'created_at' => $this->integer()->comment('创建时间'),
            'updated_at' => $this->integer()->comment('更新时间'),
        ], $tableOptions);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%product}}');
    }
}
