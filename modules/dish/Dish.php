<?php

namespace app\modules\dish;

/**
 * dish module definition class
 */
class Dish extends \yii\base\Module
{
	public $defaultRoute = 'dish';
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\dish\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
