<?php 
	use yii\helpers\Html;
	use yii\helpers\Url;
?>

<div>
    <h1>MASTER Branch</h1>
    <h1>Укажите ингредиенты:</h1>
	<?= $this->render('_form',[
			'all_ingredients' => $all_ingredients,
			'ingredients_model' => $ingredients_model,
	]);?>
		<?php if (isset($message)):?>
			<h3><?=$message;?></h3>
		<?php endif ?>
		
		<?php if (isset($dishes)):?>
			
			
			<h3>Список подходящих блюд:</h3>
			<ul>
			<?php foreach ($dishes as $dish):?>
				<li><?= $dish['name'] ?></li>
			<?php endforeach ?>
			<ul>
		
		<?php endif ?>
	
</div>
