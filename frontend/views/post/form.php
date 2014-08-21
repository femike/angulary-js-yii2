<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Post';
$this->params['breadcrumbs']=[
	['label' => 'Посты', 'url' => ['/post']],
	$this->title
]

?>

<div class="form-post">
	<h1><?= Html::encode($this->title) ?></h1>
	<div class="row">
		<div class="col-lg-5">
			<?php $form = ActiveForm::begin(['id' => 'post-form']); ?>
			<?= $form->field($model, 'title') ?>
			<?= $form->field($model, 'content')->textarea() ?>
			<div class="form-group">
				<?= Html::submitButton(($model->isNewRecord) ? 'Создать' : 'Сохранить', ['class' => 'btn btn-primary', 'name' => 'post-button']) ?>
			</div>
			<?php ActiveForm::end(); ?>
		</div>
	</div>
</div>