<?php

use yii\db\Migration;

class m161225_140545_product_detail_fk extends Migration
{
    public function up()
    {
        $this->addForeignKey(
            'fk-product_detail-product_id',
            'product_detail',
            'product_id',
            'product',
            'id',
            'CASCADE'
        );
    }

    public function down()
    {
        $this->dropForeignKey('fk-product_detail-product_id', 'product_detail');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
