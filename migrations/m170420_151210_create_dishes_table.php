<?php

use yii\db\Migration;

/**
 * Handles the creation of table `dishes`.
 */
class m170420_151210_create_dishes_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('dishes', [
            'id' => $this->primaryKey(),
			'name'=>$this->string(50)->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('dishes');
    }
}
