<?php

namespace app\modules\dish\controllers;


// SELECT *,`tp`.`dish_ingredients_count`-`tp`.`equal_count` as result
// from
// (SELECT `dish_ingredients`.`dish_id`, count(`dish_ingredients`.`dish_id`) as equal_count, `t`.`dish_ingredients_count`
// FROM `dish_ingredients`
// left join (SELECT `dish_id`, count(`dish_id`) as `dish_ingredients_count` FROM `dish_ingredients` WHERE 1 group by `dish_id`) as t on `t`.`dish_id` = `dish_ingredients`.`dish_id`
// WHERE `ingredient_id` in (2,3,9) group by `dish_id`) as tp having `result` > 1


	
			
			// "
			// SELECT `name`, count(`dish_id`) as equal_count
			// FROM `dish_ingredients`
			// LEFT JOIN `dishes` on `id` = `dish_id`
			// WHERE `ingredient_id` in (".implode($ingredients_model->name, ',').")
			// GROUP BY `dish_id`
			// HAVING `equal_count` > 1
			// ORDER BY `equal_count` DESC
			// ";
			
			
			
			
			// "
			// SELECT *,`name`, `tp`.`dish_ingredients_count`-`tp`.`equal_count` as result
			// FROM
				// (SELECT `dish_ingredients`.`dish_id`, count(`dish_ingredients`.`dish_id`) as equal_count, `t`.`dish_ingredients_count`
				// FROM `dish_ingredients`
				// LEFT JOIN 
					// (SELECT `dish_id`, count(`dish_id`) as `dish_ingredients_count`
					// FROM `dish_ingredients`
					// WHERE 1
					// GROUP BY `dish_id`) as t
				// ON `t`.`dish_id` = `dish_ingredients`.`dish_id`
				// WHERE `ingredient_id` in (".implode($ingredients_model->name, ',').") GROUP BY `dish_id`
				// HAVING `equal_count` > 1
				// ORDER BY `equal_count` DESC) as tp
			// LEFT JOIN `dishes` on `id` = `dish_id`
			// ORDER BY `result` ASC

			// ";
use Yii;
use yii\helpers\Html;
use yii\helpers\Url;
use app\modules\dish\models\Dishes;
use app\modules\dish\models\Ingredients;
use app\modules\dish\models\DishIngredients;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\widgets\ActiveForm;
use yii\web\Response;

/**
 * DishController implements the CRUD actions for Dishes model.
 */
class UserController extends Controller
{
    /**
     * Lists all Dishes models.
     * @return mixed
     */
    public function actionIndex()
    {	


        $ingredients_model = new Ingredients();
        $all_ingredients = Ingredients::find()
                ->select(['name'])
                ->where("isHidden=0")
                ->orderBy('name')
                ->indexBy('id')
                ->column();

        if (Yii::$app->request->isAjax && $ingredients_model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($ingredients_model);
        }
        if ( $ingredients_model->load(Yii::$app->request->post())&& $ingredients_model->validate() ) {
			
			$query = 
			
			"
			SELECT `dishes`.`name`, count(`dish_ingredients`.`dish_id`) as equal_count, `dish_ingredients_count`
			FROM `dish_ingredients`
			LEFT JOIN `dishes` ON `id` = `dish_id`
			LEFT JOIN `ingredients` ON `ingredients`.`id` = `ingredient_id`
			LEFT JOIN 
					(SELECT `dish_ingredients`.`dish_id`, count(`dish_ingredients`.`dish_id`) as `dish_ingredients_count`
					FROM `dish_ingredients`
					WHERE 1
					GROUP BY `dish_id`) as t
			ON `t`.`dish_id` = `dish_ingredients`.`dish_id`		
			WHERE `ingredient_id` in (".implode($ingredients_model->name, ',').") AND `dish_ingredients`.`dish_id` NOT IN 
				(SELECT `dish_id` 
				FROM `dish_ingredients`
				LEFT JOIN `ingredients` ON `ingredients`.`id` = `dish_ingredients`.`ingredient_id`
				WHERE `ingredients`.`isHidden` = 1)
			GROUP BY `dish_ingredients`.`dish_id`
			HAVING `equal_count` > 1
			ORDER BY `equal_count` DESC
			";
			

			$result = DishIngredients::findBySql($query)->asArray()->all();
						
			if (count($result) == 0){
				return $this->render('index', [
					'message'=> 'Ничего не найдено',
					'all_ingredients' => $all_ingredients,
					'ingredients_model' => $ingredients_model,
				]);
			}
			
			//если есть полное совпадение,
			//то убираем из результата остальные блюда
			if ($result[0]['equal_count']==count($ingredients_model->name)&&
			$result[0]['dish_ingredients_count']==count($ingredients_model->name))
			{
				foreach($result as $key=>$dish)
				{
					if ($dish['equal_count'] !=count($ingredients_model->name))
						unset($result[$key]);
				}
			}
			
			
			
			return $this->render('index', [
					'dishes'=> $result,
					'all_ingredients' => $all_ingredients,
					'ingredients_model' => $ingredients_model,
				]);
        } else {
            return $this->render('index',[
			'all_ingredients' => $all_ingredients,
			'ingredients_model' => $ingredients_model,
		]);
        }	
			
			
			
			
			
			
        
    }

   
}
