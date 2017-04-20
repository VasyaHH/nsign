<?php

use yii\db\Migration;

/**
 * Handles the creation of table `dish_ingredients`.
 */
class m170420_151629_create_dish_ingredients_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('dish_ingredients', [
            'dish_id' => $this->integer()->notNull(),
            'ingredient_id' => $this->integer()->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('dish_ingredients');
    }
}
