<?php

namespace app\modules\dish\controllers;

use Yii;
use app\modules\dish\models\Dishes;
use app\modules\dish\models\DishesSearch;
use app\modules\dish\models\Ingredients;
use app\modules\dish\models\DishIngredients;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DishController implements the CRUD actions for Dishes model.
 */
class DishController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

	
    /**
     * Lists all Dishes models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DishesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Dishes model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
		// $dish_ingredients_model = new DishIngredients();
		// $dish_ingredients = DishIngredients::find()->with()->select('name')->where("dish_id=$id")->column();
		$dishes_model = $this->findModel($id);
		$dish_ingredients = $dishes_model->getIngredients()->select('name')->column();//DishIngredients::find()->getIngredientName();
		// print_r($dish_ingredients);
		// exit();
        return $this->render('view', [
            'dishes_model' => $this->findModel($id),
            'dish_ingredients' => $dish_ingredients,
        ]);
    }

    /**
     * Creates a new Dishes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $dishes_model = new Dishes();
		$ingredients_model = new Ingredients();
		$all_items = Ingredients::find()
			->select(['name'])
			->indexBy('id')
			->column();
		

        if ($dishes_model->load(Yii::$app->request->post()) && $dishes_model->save()) {
			
			if ($ingredients_model->load(Yii::$app->request->post())){
				foreach ($ingredients_model->name as $ingredient)
				{
					$dishIngredient = new DishIngredients();
					$dishIngredient->dish_id = $dishes_model->id;
					$dishIngredient->ingredient_id = $ingredient;
					$dishIngredient->save();
				}
			} else {
				echo 321;
				exit();
			}
			
            return $this->redirect(['view', 'id' => $dishes_model->id]);
        } else {
            return $this->render('create', [
                'dishes_model' => $dishes_model,
                'ingredients_model' => $ingredients_model,
                'all_items' => $all_items,
            ]);
        }
    }

    /**
     * Updates an existing Dishes model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $dishes_model = $this->findModel($id);
		$ingredients_model = new Ingredients();
		$all_items = Ingredients::find()
			->select(['name'])
			->indexBy('id')
			->column();
		$selected_items = $dishes_model->getIngredients()->column();

        if ($dishes_model->load(Yii::$app->request->post()) && $dishes_model->save()) {
            
			if ($ingredients_model->load(Yii::$app->request->post())){
				DishIngredients::deleteAll(['dish_id'=>$id]);
				foreach ($ingredients_model->name as $ingredient)
				{
					$dishIngredient = new DishIngredients();
					$dishIngredient->dish_id = $dishes_model->id;
					$dishIngredient->ingredient_id = $ingredient;
					$dishIngredient->save();
				}
			} else {
				echo 2231;
				exit();
			}
			
			
			return $this->redirect(['view', 'id' => $dishes_model->id]);
        } else {
            return $this->render('update', [
                'dishes_model' => $dishes_model,
                'ingredients_model' => $ingredients_model,
                'all_items' => $all_items,
                'selected_items' => $selected_items,
            ]);
        }
    }

    /**
     * Deletes an existing Dishes model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Dishes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Dishes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Dishes::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
