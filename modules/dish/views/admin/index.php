<?php 
	use yii\helpers\Html;
	use yii\helpers\Url;
?>
	

<div>
	<h1>Select item for edit</h1>
    <p><?= Html::a("Dishes", Url::to(['/dish/dish']))."<br>"; ?></p>
    <p><?= Html::a("Ingredients", Url::to(['/dish/ingredient']));?></p>
</div>
