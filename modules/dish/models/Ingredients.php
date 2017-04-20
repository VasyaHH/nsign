<?php

namespace app\modules\dish\models;

use Yii;

/**
 * This is the model class for table "ingredients".
 *
 * @property integer $id
 * @property string $name
 * @property string $idHiddent
 */
class Ingredients extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ingredients';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 50],
            [['isHidden'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название ингредиента',
            'isHidden' => 'isHidden',
        ];
    }
}
