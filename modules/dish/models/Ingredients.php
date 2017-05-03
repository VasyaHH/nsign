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
            [['name'], 'required', 'message'=>'Выберите более 1 ингредиента'],
//            [['name'], 'string', 'max' => 50,'message'=>'sdfsdfsdfs'],
            [['isHidden'], 'number'],
            ['name', 'gt2'],
        ];
    }
    
    public function gt2($attribute){
        if (count($this->$attribute) < 2){
            $this->addError($attribute, 'Необходимо выбрать как минимум 2 ингредиента');
        }
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
