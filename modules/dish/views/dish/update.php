<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\dish\models\Dishes */

$this->title = 'Update Dishes: ' . $dishes_model->name;
$this->params['breadcrumbs'][] = ['label' => 'Dishes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $dishes_model->name, 'url' => ['view', 'id' => $dishes_model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="dishes-update">

    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form', [
        'dishes_model' => $dishes_model,
        'ingredients_model' => $ingredients_model,
        'all_items' => $all_items,
        'selected_items' => $selected_items,
		
    ]) ?>

</div>
