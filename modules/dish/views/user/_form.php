<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="all-ingredients-form">
    <?php $form = ActiveForm::begin(); ?>
	
	<?= $form->field($ingredients_model, 'name')->checkboxList($all_ingredients)->label('Укажите ингредиенты:');  ?>

    <div class="form-group">
        <?= Html::submitButton('Подобрать блюда', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
