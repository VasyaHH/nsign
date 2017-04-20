<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\dish\models\Dishes */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Dishes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dishes-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $dishes_model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $dishes_model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
	<?=  print_r($dish_ingredients )?>

    <?= DetailView::widget([
        'model' => $dishes_model,
        'attributes' => [
            'id',
            'name',
            ['label'=>'Ингредиенты', 'value'=>implode($dish_ingredients, ', ')],
        ],
    ]) ?>

</div>
