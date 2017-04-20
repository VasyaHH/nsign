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
		
		$this->execute("
		INSERT INTO `dishes` (`id`, `name`) VALUES
			(1, 'Жареная картошка'),
			(2, 'Суп солянка'),
			(3, 'Суп вермишелевый'),
			(4, 'Зелёные щи с крапивой'),
			(5, 'Винегрет '),
			(6, 'Лазанья'),
			(7, 'Жаркое в горшочках');
		");
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('dishes');
    }
}
