<?php

use yii\db\Migration;

/**
 * Handles the creation of table `product_detail`.
 */
class m161225_132026_create_product_detail_table extends Migration
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

        $this->createTable('{{%product_detail}}', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer()->notNull()->unique()->comment('商品ID'),
            'introduction_html' => $this->text()->comment('图文详情'),
            'created_at' => $this->integer()->comment('创建时间'),
            'updated_at' => $this->integer()->comment('更新时间'),
        ], $tableOptions);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%product_detail}}');
    }
}
