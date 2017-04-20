<?php

use yii\db\Migration;

/**
 * Handles the creation of table `ingredients`.
 */
class m170420_151614_create_ingredients_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('ingredients', [
            'id' => $this->primaryKey(),
			'name'=>$this->string(50)->notNull(),
			'isHidden'=>$this->boolean()->defaultValue(0),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('ingredients');
    }
}
