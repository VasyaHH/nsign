<?php

namespace app\modules\dish\models;

use Yii;

/**
 * This is the model class for table "dish_ingredients".
 *
 * @property integer $dish_id
 * @property integer $ingredients_id
 */
class DishIngredients extends \yii\db\ActiveRecord
{
	
	public function getIngredientName()
	{
		return $this->hasOne(Ingredients::className(),['id' => 'ingredient_id']); 
	}
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dish_ingredients';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dish_id', 'ingredient_id'], 'required'],
            [['dish_id', 'ingredient_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'dish_id' => 'Dish ID',
            'ingredient_id' => 'Ingredient ID',
        ];
    }
}
