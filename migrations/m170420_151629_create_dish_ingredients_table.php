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
		
		
		$this->execute("
		INSERT INTO `dish_ingredients` (`dish_id`, `ingredient_id`) VALUES
			(19, 2),
			(19, 9),
			(19, 11),
			(1, 1),
			(1, 2),
			(1, 4),
			(1, 5),
			(2, 1),
			(2, 9),
			(2, 15),
			(5, 1),
			(5, 4),
			(5, 6),
			(5, 14),
			(5, 16),
			(7, 1),
			(7, 3),
			(7, 4),
			(7, 5),
			(6, 2),
			(6, 4),
			(6, 5),
			(6, 11),
			(6, 13),
			(6, 18),
			(4, 2),
			(4, 3),
			(4, 4),
			(4, 5),
			(4, 10),
			(4, 11),
			(4, 19);
		");
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('dish_ingredients');
    }
}
