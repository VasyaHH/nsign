<?php

namespace app\modules\dish\controllers;

use Yii;
use yii\helpers\Html;
use yii\helpers\Url;
use app\modules\dish\models\Dishes;
use app\modules\dish\models\DishesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DishController implements the CRUD actions for Dishes model.
 */
class AdminController extends Controller
{
    /**
     * Lists all Dishes models.
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

   
}
