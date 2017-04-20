<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $dishes_model app\modules\dish\models\Dishes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dishes-form">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($dishes_model, 'name')->textInput(['maxlength' => true]) ?>
	
	 <?php if (isset($selected_items)) $ingredients_model->name = $selected_items; ?>
	
	<?= $form->field($ingredients_model, 'name')->checkboxList($all_items)->label('Список ингредиентов:');  ?>

    <div class="form-group">
        <?= Html::submitButton($dishes_model->isNewRecord ? 'Create' : 'Update', ['class' => $dishes_model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
