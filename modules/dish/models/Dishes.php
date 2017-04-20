<?php

namespace app\modules\dish\models;

use Yii;

/**
 * This is the model class for table "dishes".
 *
 * @property integer $id
 * @property string $name
 */
class Dishes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dishes';
    }

	
	public function getIngredients()
	{
		return $this->hasMany(Ingredients::className(),['id'=>'ingredient_id'])
			->viatable('dish_ingredients', ['dish_id' => 'id']);
	}
	
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }
}
