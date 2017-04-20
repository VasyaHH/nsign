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
		
		$this->execute("
		INSERT INTO `ingredients` (`id`, `name`, `isHidden`) VALUES
			(1, 'Картофель', 0),
			(2, 'Лук репчатый', 0),
			(3, 'Чеснок', 0),
			(4, 'Соль ', 0),
			(5, 'Перец ', 0),
			(6, 'Масло растительное ', 0),
			(7, 'Курица ', 0),
			(8, 'Шампиньоны ', 0),
			(9, 'Капуста квашеная ', 0),
			(10, 'Морковь ', 0),
			(11, 'Зелень ', 0),
			(12, 'Маслины ', 0),
			(13, 'Томатная паста ', 0),
			(14, 'Свекла', 0),
			(15, 'Огурец ', 0),
			(16, 'Зеленый горошек', 0),
			(17, 'Сливки', 0),
			(18, 'Листы лазаньи', 0),
			(19, 'Крапива', 0);
		");
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('ingredients');
    }
}
